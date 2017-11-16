<?php
/**
 * Created by PhpStorm.
 * User: gala
 * Date: 16.11.17
 * Time: 16:06
 */

namespace app\services;


class Session
{
    private $sid;
    protected $sessionKey = 'sid';


    public function getSid(){
        return $this->sid;
    }

    public function setSid($sid){
        $_SESSION[$this->sessionKey] = $sid;
        $this->sid = $sid;
    }

    public function clearUserSession(){
        $_SESSION[$this->sessionKey]  = null;
        $_SESSION = [];
    }




}