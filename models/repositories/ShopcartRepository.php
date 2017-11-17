<?php
/**
 * Created by PhpStorm.
 * User: gala
 * Date: 16.11.17
 * Time: 17:11
 */

namespace app\models\repositories;


use app\models\Shopcart;

class ShopcartRepository extends Repository
{

    /**
     * ShopcartRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'shop_cart';
        $this->entityClass = Shopcart::class;
    }
}