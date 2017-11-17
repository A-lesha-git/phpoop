<?php
/**
 * Created by PhpStorm.
 * User: gala
 * Date: 16.11.17
 * Time: 17:18
 */

namespace app\services\shop;


use app\base\App;
use app\models\DataEntity;
use app\models\repositories\CartRepository;
use app\models\repositories\ProductRepository;

class CartProcessor
{
    /** @var CartRepository  */
    private $cartRepository;

    /** @var ProductRepository*/
    private $productRepository;

    public function add(DataEntity $entity){

    }

    public function delete(){}

    public function clear(){}

    public function getUserShopCart($uid){
         $this->cartRepository = App::call()->cartRepository;
        return $this->cartRepository->getUserShopCartGoods($uid);

    }

    public function addProductToUserShopCart($productId){
        
        $this->cartRepository =  App::call()->cartRepository;
        $cartGoods = $this->cartRepository->checkProductInUserShopCart($productId);
        if(!$cartGoods){
            $product = App::call()->productRepository->findOne($productId);
            //var_dump($product);
            $this->cartRepository->addGoodToShopCart($product);

        }else{
            $this->cartRepository->incrementGoodQuantity($cartGoods->getId());
        }
        
//        $productsInUserShopCart = App::call()->cartRepository->getUserShopCartGoods($userId);
        
        
        

    }
}