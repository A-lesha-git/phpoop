<?php
/**
 * Created by PhpStorm.
 * User: gala
 * Date: 17.11.17
 * Time: 15:21
 */

namespace app\controllers;


use app\base\App;
use app\services\response\JsonCartResponse;
use app\services\Session;
use app\services\shop\CartProcessor;
use app\services\RequestManager;

class CartController extends Controller
{
    /** Session */
    private $session;

    /** @var CartProcessor */
    private $cartProcessor;

    /** @var RequestManager */
    private $request;

    /** @var  JsonCartResponse */
    private $response;


    public function actionView(){
        $this->session = App::call()->session;
        $userId = $this->session->getUid();

        $this->cartProcessor = App::call()->cartProcessor;
        $products = $this->cartProcessor->getUserShopCart($userId);
        $cartInfo = $this->cartProcessor->cartMainInfo();

        $render = $this->getTemplateRenderer();
        $render->setTitle("Товары");
        $render->setContent($render->renderContent('shop/cart', ['products'=>$products, 'cart'=>$cartInfo]));

        $user = App::call()->user->getCurrent();

        echo $render->render(['render' => $this->render, 'products'=>$products, 'user'=> $user, 'total'=>$cartInfo[0], 'quantity'=>$cartInfo[1]]);




    }

    public function actionAdd(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $this->request = App::call()->request;
            $productId = $this->request->get('post', 'product_id');
            $this->cartProcessor = App::call()->cartProcessor;
            $this->cartProcessor->addProductToUserShopCart( $productId);

            $cartJsonInfo = $this->cartProcessor->getCartMainJsonInfo();

            header("Content-Type: application/json", true);
            echo json_encode($cartJsonInfo);
        }
    }

    public function actionDelete(){
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->request = App::call()->request;
            $goodId =$this->request->get('post', 'good_id');

            $this->cartProcessor = App::call()->cartProcessor;
            $this->cartProcessor->delete($goodId);
            $cartJsonInfo = $this->cartProcessor->getCartMainJsonInfo();

            header("Content-Type: application/json", true);

            echo json_encode($cartJsonInfo);
        }

    }
}