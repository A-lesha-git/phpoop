<?php
/**
 * Created by PhpStorm.
 * User: gala
 * Date: 17.11.17
 * Time: 15:21
 */

namespace app\controllers;


use app\base\App;
use app\models\repositories\CartRepository;
use app\services\response\JsonCartResponse;
use app\services\Session;
use app\services\shop\CartProcessor;
use app\services\RequestManager;
use app\services\renderers\Template;
use app\services\renderers\TemplateRenderer;

class CartController extends Controller
{
    /** Session */
    private $session;

    /** @var CartProcessor */
    private $cartProcessor;

    /** @var CartRepository */
    private $cartRepository;

    /** @var RequestManager */
    private $request;




    /*
     * отображение корзины товаров
     */
    public function actionView(){
        $this->session = App::call()->session;
        $userId = $this->session->getUid();

        $this->cartProcessor = App::call()->cartProcessor;
        $this->cartRepository = App::call()->cartRepository;

        $products = $this->cartRepository->getUserShopCartGoods($userId);

        $cartInfo = $this->cartProcessor->cartMainInfo($userId);

        $tpl = new Template(
            new TemplateRenderer(),
            'shop/cart',
            [
                'products' => $products,
                'user'=>App::call()->user->getCurrent(),
                'total'=>$cartInfo[0],
                'quantity'=>$cartInfo[1]
            ]
        );

        echo $tpl->render();
    }

    /*
     * ajax реакция  добавления товара в  корзину
     */
    public function actionAdd(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $this->request = App::call()->request;
            $productId = $this->request->get('post', 'product_id');
            $this->cartProcessor = App::call()->cartProcessor;
            $result = $this->cartProcessor->addProductToUserShopCart( $productId);


            header("Content-Type: application/json", true);
            echo (new JsonCartResponse($result['total'], $result['quantity'], $result['message']))->get();
        }
    }

    /*
     * ajax  удаления товара из корзины
     */
    public function actionDelete(){
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->request = App::call()->request;
            $goodId =$this->request->get('post', 'good_id');

            $this->cartProcessor = App::call()->cartProcessor;
            $result = $this->cartProcessor->deleteCartGood($goodId);

            header("Content-Type: application/json", true);
            echo (new JsonCartResponse($result['total'], $result['quantity'], $result['message']))->get();
        }

    }
    
    /*
     * ajax обновление корзины
     */
    public function actionUpdate(){
        if($_SERVER['REQUEST_METHOD'] == "POST") {

            $uid = App::call()->session->getUid();
            $this->request = App::call()->request;
            $gooId= $this->request->get('post', 'good_id');
            $quantity= $this->request->get('post', 'quantity');

            $this->cartProcessor = App::call()->cartProcessor;

            $result = $this->cartProcessor->updateUsersShopCart($gooId, $quantity);

            header("Content-Type: application/json", true);
            echo (new JsonCartResponse($result['total'],$result['quantity'], $result['message']))->get();
        }
    }



}