<?php


namespace app\services\renderers;


use app\base\App;


class TemplateRenderer implements IRenderer
{

    private $template;


    public function renderChunk($template, $params=[]){

        return $this->renderContent($template,$params);
    }


//    public function render($params, $layout) {
//
//        extract($params);
//
//        include App::call()->config['templates_dir'] . $layout . '.php';
//
//    }

    public function renderContent($templateName, $params = []) {
        extract($params);

        ob_start();

        include App::call()->config['templates_dir']  . $templateName . '.php';

        $content = ob_get_clean();

        return $content;
    }

    private function generateTemplate(){

        $vars = get_object_vars($this->template);
        unset($vars['renderer']);
        unset($vars['tplData']);
        unset($vars['params']);
        unset($vars['data']);

        //сперва сгенерируем чанки с html кодом
        foreach ($vars as $var => $value){
            if(preg_match("/_l?/", $var)){
                $nameVarContent = str_replace("_l", "", $var);
                $content =  $this->renderContent($value, $this->template->params);
                $this->template->setTplData($nameVarContent, $content);
            }
        }

        //затем установим переменные
        foreach ($this->template->params as $key => $value) {
            $this->template->setTplData($key, $value);
        }

    }


    public function render(Template $tpl){
        $this->template = $tpl;

        $this->generateTemplate();

        extract($this->template->tplData);

        include App::call()->config['templates_dir'] . $this->template->layout . '.php';
    }



}