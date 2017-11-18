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
use app\services\response\JsonCartResponse;

class CartProcessor
{
    /** @var CartRepository  */
    private $cartRepository;

    /** @var ProductRepository*/
    private $productRepository;

    private $total;
    private $quantity;
    private $message;
    private $isDeleted = false;
    private $isAdded = false;
    private $isUpdated = false;



    public function delete($cartId){
        $this->cartRepository = App::call()->cartRepository;
        $this->cartRepository->deleteCartGood($cartId);
        $this->isDeleted = true;
    }

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
            $this->isAdded = true;

        }else {
            $this->cartRepository->incrementGoodQuantity($cartGoods->getId());
            $this->isAdded = true;
        }
    }

    public function cartMainInfo(){
        $this->quantity = 0;
        $this->total = 0;
        $uid = App::call()->session->getUid();
        $this->cartRepository = App::call()->cartRepository;

        $shopCartGoods = $this->getUserShopCart($uid);

        foreach ($shopCartGoods as $good) {
            $this->quantity += $good->getQuantity();
            $this->total += $good->getPrice() * $good->getQuantity();
        }

        return [$this->total, $this->quantity];
    }

    public function getCartMainJsonInfo(){
        $uid = App::call()->session->getUid();
        $this->cartRepository = App::call()->cartRepository;

        $shopCartGoods = $this->getUserShopCart($uid);

        foreach ($shopCartGoods as $good) {
            $this->quantity += $good->getQuantity();
            $this->total += $good->getPrice() * $good->getQuantity();
        }

        $this->message = $this->getMessage();
        $reflection =  new \ReflectionClass(JsonCartResponse::class);
        $response =  $reflection->newInstanceArgs([$this->total, $this->quantity, $this->message]);

        return $response->get();
    }

    private function getMessage(){
        if($this->isUpdated)
            return "Корзина обновлена";

        if($this->isDeleted)
            return "Товар удален из корзины";

        if($this->isAdded)
            return "Товар добавлен в корзину";
    }


    
}