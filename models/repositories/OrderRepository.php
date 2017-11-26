<?php
/**
 * Created by PhpStorm.
 * User: gala
 * Date: 07.11.17
 * Time: 14:16
 */

namespace app\models\repositories;


use app\models\Order;

class OrderRepository extends Repository
{
    /**
     * OrderRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'orders';
        $this->entityClass = Order::class;
    }



    public function getOrderById($id){

        $sql = "SELECT o.*, d.name FROM orders o
                JOIN delivery d ON o.delivery_id=d.id
                WHERE o.id={$id} ";

        return $this->db->fetchObject($sql, [], $this->entityClass);
    }


    

}