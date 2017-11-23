<?php
/**
 * Created by PhpStorm.
 * User: gala
 * Date: 22.11.17
 * Time: 15:28
 */

namespace app\services\renderers;


class Template
{
    public $layout = 'default';
    public $content_l = "product/list";
    public $menu_l = "menu";
    public $auth_l = "authorization";
    public $cart_mini_l = "shop/cart_mini";
    public $params= [];
    private $renderer;
    private $data = ['menu', 'auth', 'content', 'title'];
    public $tplData = ['title'=>'интернет магазин'];




    public function __construct(IRenderer $renderer, $path, $params=[] )
    {
        $this->renderer = $renderer;
        $this->params = $params;
        $this->content_l = $path;
    }
    

    public function render(){

        return   $this->renderer->render($this);
    }



    public function setTplData($name, $value)
    {
        $this->tplData[$name] = $value;
    }

    public function getTplData($key)
    {
        if(isset($this->tplData[$key])) {
            return $this->tplData[$key];
        }else{
            return null;
        }
    }
    public function setData($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function getData($key)
    {
        if(isset($this->data[$key])) {
            return $this->data[$key];
        }else{
            return null;
        }
    }

}