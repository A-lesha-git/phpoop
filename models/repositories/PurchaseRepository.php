<?php
namespace app\models\repositories;


use app\models\Purchase;

class PurchaseRepository extends Repository
{
    /**
     * PurchaseRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'purchases';
        $this->entityClass = Purchase::class;
    }

    public function getOrderPurchases($orderId){
        
        return $this->db->fetchObjects("SELECT * FROM purchases WHERE order_id={$orderId}", [], $this->entityClass);

    }
}