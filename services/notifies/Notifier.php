<?php
/**
 * Created by PhpStorm.
 * User: gala
 * Date: 20.11.17
 * Time: 18:26
 */

namespace app\services\notifies;


abstract class Notifier
{
    abstract public function getMessage();
}