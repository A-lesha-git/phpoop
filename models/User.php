<?php
/**
 * Created by PhpStorm.
 * User: gala
 * Date: 13.11.17
 * Time: 17:35
 */

namespace app\models;

use app\base\App;
use app\models\repositories\SessionRepository;
use app\models\repositories\UserRepository;
use app\services\Auth;

class User extends DataEntity
{
    public $id;
    public $login;
    public $password;

    /**
     * User constructor.
     * @param $id
     * @param $login
     * @param $password
     */
    public function __construct($id = null, $login = null, $password = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
    }

    /**
     * @return null
     */
    public function getLogin()
    {
        return $this->login;
    }





    public static function getTableName()
    {
        return 'users';
    }

    public function getCurrent()
    {
        if($userId = $this->getUserId()){
            return (new UserRepository())->findOne($userId);
        }
        return null;
    }

    public function getUserId()
    {
        $sid = (new Auth())->getSessionId();
        if (!is_null($sid)) {
            $this->id = App::call()->sessionRep->getUidBySid($sid);;
            App::call()->session->setSid($sid);
            App::call()->session->setUid($this->id);

            return  $this->id;
        }

        return null;
    }
    
}