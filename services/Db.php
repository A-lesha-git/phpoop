<?php
/**
 * Created by PhpStorm.
 * User: gala
 * Date: 29.10.17
 * Time: 12:16
 */

namespace app\services;


class Db
{

    private $conn = null;

    private $config;

    /**
     * Db constructor.
     * @param null $conn
     */
    public function __construct($driver, $host, $login, $password, $database, $charset)
    {
        $this->config['driver'] = $driver;
        $this->config['host'] = $host;
        $this->config['login'] = $login;
        $this->config['password'] = $password;
        $this->config['database'] = $database;
        $this->config['charset'] = $charset;
    }


    public function getConnection()
    {
        if (is_null($this->conn)) {
            $this->conn = new \PDO(
                $this->processDsnString(),
                $this->config['login'],
                $this->config['password']
            );

            $this->conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
            $this->conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

        return $this->conn;
    }



    private function processDsnString(){
        return sprintf('%s:host=%s;dbname=%s;charset=%s',
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
            );
    }

    private function query($sql, $params)
    {
        $PDOStatement = $this->getConnection()->prepare($sql);
        $PDOStatement->execute($params);
        return $PDOStatement;
    }

    //variant with bindParam
    private function queryBindParams($sql, $params)
        {

//        var_dump($params);
//        var_dump($sql);
        $PDOStatement = $this->getConnection()->prepare($sql);


        foreach($params as $key=>$val){

            //echo ":{$key}" . "=>" . $val . "<br>";
            if(is_numeric($val)) {
                $PDOStatement->bindParam(":{$key}", $val, \PDO::PARAM_INT);
            }else{
                $PDOStatement->bindParam(":{$key}", $val, \PDO::PARAM_STR, 12);
            }

        }
        $PDOStatement->execute($params);
        return $PDOStatement;
    }

    private function queryObj($sql, $params, $class)
    {
        $PDOStatement = $this->getConnection()->prepare($sql);
        $PDOStatement->execute($params);

        return $PDOStatement->fetchObject($class);
    }


    public function getLastInsertedId(){

        return $this->getConnection()->lastInsertId();
    }
    

    public function execute($sql, $params = [])
    {
        return $this->query($sql, $params);
//        return true;
    }
    public function executeBindParams($sql, $params = [])
    {
       return $this->queryBindParams($sql, $params);

    }

    public function executeQueryBuilder($class)
    {
        return $this->queryObj($this->sql, $this->params, $class);

    }



    public function queryOne($sql, $params = [])
    {
        return $this->queryAll($sql, $params)[0];
    }




    public function queryAll($sql, $params = [])
    {
        return $this->query($sql, $params)->fetchAll();
    }



    public function queryWithBindParams($sql,$params){

        return $this->executeBindParams($sql,$params);
    }


    /**
     * @param $sql
     * @param array $params
     * @param $class
     * @return array of objects
     */
    public function fetchObjects($sql, $params = [], $class){

        return $this->query($sql, $params)->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $class);
    }


    /**
     * @param $sql
     * @param array $params
     * @param $class
     * @return object
     */
    public function fetchObject($sql, $params = [], $class)
    {
        $smtp = $this->query($sql, $params);
        $smtp->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $class);
        return $smtp->fetch();
    }



}