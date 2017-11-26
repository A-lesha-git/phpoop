<?php

namespace app\models\repositories;


use app\base\App;
use app\models\DataEntity;

class Repository
{
    protected $tableName;
    protected $params;
    protected $sql;

    protected $db;
    protected $entityClass;

    private $conditions;

    public function __construct()
    {
        $this->db = App::call()->db;

    }


    /**
     * @param $id
     * @return  object
     */
    public function findOne($id)
    {

        return $this->db->fetchObject(
            "SELECT * FROM {$this->tableName} WHERE id = :id",
            [':id' => $id],
            $this->entityClass
        );

    }

    public function getUserBySid($sid){
        return $this->db->fetchObject(
            "SELECT user_id FROM sessions WHERE sid = ?",
            [':sid' => $sid]

        );
    }

    public function fetchOne(){
        var_dump($this->sql);
        return $this->db->execute($this->sql,$this->params);
    }


    /**
     * @return  array objects
     */
    public  function findAll(){

        return $this->db->fetchObjects("Select * from {$this->tableName}", [], $this->entityClass);
    }

    public function findBy($params = []){
        $this->sql = "Select * from {$this->tableName} WHERE %s";

        foreach ($params as $key=>$value){
            $this->conditions .= $key ."=:" . $key . " AND ";
        }

        $this->conditions = substr($this->conditions, 0, -4);
        $this->sql = sprintf($this->sql,$this->conditions);


        return $this->db->fetchObjects($this->sql, $params, $this->entityClass);
    }

    /**
     * @param Object
     * @return bool
     */
    public function add(DataEntity $entity){

        $this->params = $this->prepareParams($entity);
        $this->createInsertSql();
        var_dump($this->sql);
        return $this->db->execute($this->sql,$this->params);

    }


    /**
     * операция удаления
     * @param $id
     * @return bool
     */
    public function delete($id){

        $sql = "DELETE from {$this->tableName} WHERE id =:id";

        return $this->db->execute($sql,['id' => $id]);
    }




    /**
     * @param Object
     * @return bool
     */


    public function update($object){
        $this->params = $this->prepareParams($object);
        $this->createUpdateSql();

        return $this->db->execute($this->sql,$this->params);
    }

    /**
     * создания запроса обновления
     */
    public function createUpdateSql(){

        $this->sql ="UPDATE {$this->tableName} SET ";
        $sqlLastPart = "";
        foreach ($this->params as $key=>$val) {
            if($key!='id'){
                $this->sql .= " {$key}=:{$key},";
            }else{
                $sqlLastPart = " WHERE id=:id";
            }
        }

        $this->sql = substr($this->sql,0,-1);
        $this->sql .= $sqlLastPart;
    }

    /**
     * создание запроса добавления
     */
    private function createInsertSql(){
        $this->sql = "INSERT INTO {$this->tableName} ( ";
        foreach ($this->params as $key=>$value){
            $this->sql .= " {$key},";
        }
        $this->sql = substr($this->sql,0,-1);
        $this->sql .= ") VALUES(";
        foreach ($this->params as $key=>$val){
            $this->sql .= " :{$key},";
        }
        $this->sql = substr($this->sql,0,-1);

        $this->sql .=  ")";
    }


    /*
     * подготавливает параметры перед вставкой
     * в запрос
     */
    private function prepareParams($object){
        $objectToArray = $object->convertToArray($object);

        foreach ($objectToArray as $key=>$val) {
            if(is_null($val) || empty($val)){
                unset($objectToArray[$key]);
            }
        }

        return $objectToArray;
    }

    public function getLastInsertedId(){
        return $this->db->getLastInsertedId();
    }

    public function countItems($items){
        return count($items);
    }


}