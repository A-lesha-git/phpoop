<?php
/**
 * Created by PhpStorm.
 * User: gala
 * Date: 16.11.17
 * Time: 17:18
 */

namespace app\services\shop;


use app\base\App;
use app\models\Cart;
use app\models\DataEntity;
use app\models\repositories\CartRepository;
use app\models\repositories\ProductRepository;
use app\services\notifies\ShopCartNotifier;
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
    private $validator;
    private $shopCartNotify;
    private $cartMainInfo;


    /*
     * удаление позиции из корзины покупок
     */
    public function deleteCartGood($cartId){
        $this->cartRepository = App::call()->cartRepository;
        $this->shopCartNotify = $this->getShopCartNotify();

        if($this->cartRepository->delete($cartId)){
            $mainInfo = $this->getUsersShopCartContent();
            $this->shopCartNotify->isDeleted = true;             
        }

        $mainInfo['message'] = $this->shopCartNotify->getMessageDeleted();

        return $mainInfo;
    }

    /*
     * Обновляет содержание корзины
     */
    public function updateUsersShopCart($goodId, $quantity){

        $this->cartRepository = App::call()->cartRepository;
        $good = $this->cartRepository->findOne($goodId);
        $goodsClone = clone $good;

        $goodsClone->setQuantity($quantity);

        $this->validator = $this->getValidator();
        try{
            $this->shopCartNotify =$this->getShopCartNotify();
            $this->validator->isValidQuantity($goodsClone);

            $this->shopCartNotify->isUpdated = true;
            if(!$this->cartRepository->updateGoodsQuantity($goodsClone)){
                throw new ShopCartNotMatchException('Ошибка обновления корзины');
            }else {
                $this->shopCartNotify->isDeleted = true;
                $this->cartMainInfo = $this->getUsersShopCartContent();
                $this->cartMainInfo['message'] = $this->shopCartNotify->getMessageUpdated();
            }

            return $this->cartMainInfo;
        }
        catch (ShopCartNotMatchException $e){
//            echo $e->error;
            $this->shopCartNotify->setMessage($e->error);
            $this->cartMainInfo = $this->getUsersShopCartContent($good->getUserId());
            $this->cartMainInfo['message'] = $e->error;

            return $this->cartMainInfo;
        }
    }

    /*
     * Метод определяет
     * нужно ли добавить новый товар в корзину или
     * проинкрементить имеющийся в корзине товар
     */
    public function addProductToUserShopCart($productId){

//        $this->shopCartNotify = $this->getShopCartNotify();
        $this->cartRepository =  App::call()->cartRepository;
        $cartGoods = $this->cartRepository->getProductInUsersShopCart($productId);


        if(!$cartGoods){
            $product = App::call()->productRepository->findOne($productId);
            //var_dump($product);
            $this->cartRepository->addGoodToShopCart($product);
            $this->getShopCartNotify()->isAdded = true;
        }else {
            $this->cartRepository->incrementGoodQuantity($cartGoods->getId());
            $this->getShopCartNotify()->isAdded = true;
        }

        $cartMainInfo = $this->getUsersShopCartContent();
        $cartMainInfo['message'] = $this->getShopCartNotify()->getMessageAdded();

        return $cartMainInfo;
    }



    /*
     * Получение основных данных корзины
     * количество и общая стоимость товаров
     */
    public function cartMainInfo($uid = null){
        if(!isset($uid)){
            $uid = App::call()->session->getUid();
        }
        $this->quantity = 0;
        $this->total = 0;
        $this->cartRepository = App::call()->cartRepository;

        $shopCartGoods = $this->cartRepository->getUserShopCartGoods($uid);

        foreach ($shopCartGoods as $good) {
            $this->quantity += $good->getQuantity();
            $this->total += $good->getPrice() * $good->getQuantity();
        }

        return [$this->total, $this->quantity];
    }

    public function responseUsersCartMainJsonInfo($uid = null){
        if(!isset($uid)) {
            $uid = App::call()->session->getUid();
        }
        $this->cartRepository = App::call()->cartRepository;

        $shopCartGoods = $this->cartRepository->getUserShopCartGoods($uid);

        foreach ($shopCartGoods as $good) {
            $this->quantity += $good->getQuantity();
            $this->total += $good->getPrice() * $good->getQuantity();
        }

        $this->message = $this->getMessage();
        $reflection =  new \ReflectionClass(JsonCartResponse::class);
        $response =  $reflection->newInstanceArgs([$this->total, $this->quantity, $this->message]);

        return $response->get();
    }



    protected function getUsersShopCartContent($uid = null){
        if(!isset($uid)){
            $uid = App::call()->session->getUid();
        }
        $this->quantity = 0;
        $this->total = 0;
        $this->cartRepository = App::call()->cartRepository;

        $shopCartGoods = $this->cartRepository->getUserShopCartGoods($uid);

        foreach ($shopCartGoods as $good) {
            $this->quantity += $good->getQuantity();
            $this->total += $good->getPrice() * $good->getQuantity();
        }

        return ['total' => $this->total, 'quantity' => $this->quantity];
    }



    public function getValidator(){
        if(!isset($this->validator)) {
            $this->validator = new ShopCartValidator();
        }

        return $this->validator;
    }


    private function getMessage(){
        if($this->isUpdated) {
            return "Корзина обновлена";
        }

        if($this->isDeleted)
            return "Товар удален из корзины";

        if($this->isAdded)
            return "Товар добавлен в корзину";
    }


    private function getShopCartNotify(){
        if(!isset($this->shopCartNotify)){
            $this->shopCartNotify = new ShopCartNotifier();
        }
        return $this->shopCartNotify;
    }


    
}