<?php
/**
 * Created by PhpStorm.
 * User: gala
 * Date: 07.11.17
 * Time: 10:17
 */

namespace app\services\renderers;


interface  IRenderer
{
     
     public function render(Template $template);
}