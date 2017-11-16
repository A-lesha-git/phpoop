<?php
/**
 * Created by PhpStorm.
 * User: gala
 * Date: 13.11.17
 * Time: 17:30
 */

namespace app\services;

use app\base\App;
use app\models\repositories\UserRepository;
use app\models\repositories\SessionRepository;
use app\models\User;

class Auth
{
    protected $sessionKey = 'sid';
    private $sid;
    private $sessionRep;

    public function login($login, $pass)
    {
        if(!$user = (new UserRepository())->getByLoginPass($login, $pass)){
            return false;
        }
        $this->openSession($user);

        return true;
    }


    public function logout(){
        
        $sid = App::call()->session->getSid();
        App::call()->sessionRep->clearSession($sid);
        App::call()->session->clearUserSession();
    }

    public function getSessionId()
    {


        $this->sid = $_SESSION[$this->sessionKey];
        var_dump($this->sid);
        if(!is_null($this->sid)){
            (new SessionRepository())->updateLastTime($this->sid);
        }
        return $this->sid;
    }

    public function openSession(User $user)
    {
        $sid = $this->generateStr();
        (new SessionRepository())->createNew($user->id, $sid, date("Y-m-d H:i:s"));
//        $_SESSION[$this->sessionKey] = $sid;
        App::call()->session->setSid($sid);
    }

    private function generateStr($length = 10)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
        $code = "";
        $clen = strlen($chars) - 1;

        while (strlen($code) < $length)
            $code .= $chars[mt_rand(0, $clen)];

        return $code;
    }

}