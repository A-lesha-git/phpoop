<?php


namespace app\services\renderers;


class TwigRenderer implements IRenderer
{
    protected $templateDir;
    protected $templater;

    public function __construct()
    {
        $this->templateDir = ROOT_DIR . "/views/twig";
        $loader = new \Twig_Loader_Filesystem($this->templateDir);
        $this->templater = new \Twig_Environment($loader);
    }


    //старая реализация
//    public function render($template, $params = [])
//    {
//        $template = "{$template}.twig";
//        $template = $this->templater->loadTemplate($template);
//        return $template->render($params);
//    }

// здесь реализуется логика отображения твиг шаблона
    public function render(Template $tpl){
        return null;
    }

}