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
        $sql = "SELECT o.*, d.name FROM {$this->tableName} o
                JOIN delivery d ON o.delivery_id=d.id
                WHERE o.id={$id}";

        return $this->db->fetchObject($sql, [], $this->entityClass);
    }

    public function getUsersNewOrders($userId){
        $sql = "SELECT * FROM {$this->tableName}  WHERE user_id=:user_id and status=:status";

        return $this->db->fetchObjects(
            $sql,
            [':user_id' => $userId, ':status' => Order::STATUS_NEW],
            $this->entityClass
        );
    }

    public function cancelOrder($orderId){
        $sql = "UPDATE {$this->tableName} SET status=:status WHERE id=:order_id";
        
        return $this->db->execute($sql,
            [':status'=>Order::STATUS_CANCELED, ':order_id'=>$orderId],
            $this->entityClass);

    }



    

}