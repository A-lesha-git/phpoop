<?php
/**
 * Created by PhpStorm.
 * User: gala
 * Date: 13.11.17
 * Time: 17:31
 */

namespace app\models\repositories;
use app\models\User;

class UserRepository extends Repository
{




    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'users';
        $this->entityClass = User::class;
    }

    /**
     * @return User
     */
    public function getByLoginPass($login, $pass)
    {
        $sql = "SELECT u.* FROM {$this->tableName} u WHERE login = :login AND password = :pass";
        return $this->db->fetchObject($sql,
            [
                ":login" => $login, ":pass" => md5($pass)
            ],
            $this->entityClass
        );
    }

//    /**
//     * @return User
//     */
//    public function getById($id)
//    {
//        return $this->db->fetchObject(
//            "SELECT u.* FROM users u WHERE u.id = ?", [$id], $this->nestedClass
//        );
//    }
}