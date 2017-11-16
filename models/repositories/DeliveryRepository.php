<?php
/**
 * Created by PhpStorm.
 * User: gala
 * Date: 07.11.17
 * Time: 14:17
 */

namespace app\models\repositories;


use app\models\Delivery;

class DeliveryRepository extends Repository
{
    /**
     * DeliveryRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'delivery';
        $this->entityClass = Delivery::class;
    }

}