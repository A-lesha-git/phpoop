<?php


namespace app\services\renderers;


use app\base\App;

class TemplateRenderer
{
    private $layout  = 'layout';
    private $content = null;
    private $title = 'Магазин';

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }


    /**
     * @return string
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * @param string $layout
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }



    public function renderMenu(){
        return $this->renderContent($this->menu,[]);
    }

    public function renderAuth(){
        $this->renderContent($this->auth,[]);
    }


    public function renderChunk($template, $params=[]){

        return $this->renderContent($template,$params);
    }


    public function render($params) {
        //var_dump(App::call()->config['templates_dir'] );
        extract($params);
        include App::call()->config['templates_dir'] . $this->layout . '.php';

    }

    public function renderContent($templateName, $params = []) {
        extract($params);

        ob_start();

        include App::call()->config['templates_dir']  . $templateName . '.php';

        $content = ob_get_clean();

        return $content;
    }



}