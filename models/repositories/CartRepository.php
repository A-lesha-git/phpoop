<?php
/**
 * Created by PhpStorm.
 * User: gala
 * Date: 17.11.17
 * Time: 16:03
 */

namespace app\models\repositories;


use app\base\App;
use app\models\Cart;
use app\models\DataEntity;

class CartRepository extends Repository
{
    private $uid;

    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'shop_cart';
        $this->entityClass = Cart::class;
        $this->uid = App::call()->session->getUid();
    }

    public function getUserShopCartGoods($userId){

        return $this->db->fetchObjects(
            "select c.* , p.title from shop_cart c
              join products p on c.product_id = p.id          
              where c.user_id=:user_id",
            [':user_id' => $userId],
            $this->entityClass
        );
    }

    public function getProductInUsersShopCart($productId){
        $this->sql = "SELECT id from shop_cart WHERE user_id='{$this->uid}' AND product_id='$productId'";
        $result = $this->db->fetchObject($this->sql, [], $this->entityClass);
        if(!empty($result)){

            return $result;
        }else{

            return false;
        }

    }

    public function incrementGoodQuantity($goodId){
        $this->sql = "UPDATE shop_cart SET quantity = quantity+1 WHERE id={$goodId}";

        return $this->db->execute($this->sql, [],$this->entityClass);
    }

    public function addGoodToShopCart(DataEntity $product){
        $this->sql = "INSERT INTO shop_cart (product_id, user_id, price, quantity) 
              VALUES ('{$product->getId()}','{$this->uid}', '{$product->getPrice()}', '1')";

        return $this->db->execute($this->sql, []);
    }
    
    
    public function updateGoodsQuantity(Cart $good){
        $this->sql = "UPDATE shop_cart SET quantity = {$good->getQuantity()} WHERE id={$good->getId()}";
        return $this->db->execute($this->sql, []);
        
    }

}
