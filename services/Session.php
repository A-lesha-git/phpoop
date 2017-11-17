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
    private $uidKey = 'uid';
    private $uid;


    public function getUid(){
        return $this->uid = $_SESSION[$this->uidKey];
    }

    public function setUid($uid){
        $_SESSION[$this->uidKey] = $uid;
        $this->uid = $uid;
    }

    public function getSid(){
        return $_SESSION[$this->sessionKey];
    }

    public function setSid($sid){
        $_SESSION[$this->sessionKey] = $sid;
        $this->sid = $sid;
    }

    public function clearUserSession(){
        unset($_SESSION[$this->sessionKey]);
        unset($_SESSION[$this->uidKey]);
        $this->sid = null;
        $this->uid = null;
        $_SESSION = [];
    }

}