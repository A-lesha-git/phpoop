<?php
/**
 * Created by PhpStorm.
 * User: gala
 * Date: 18.11.17
 * Time: 15:53
 */

namespace app\controllers;


use app\base\App;
use app\models\Order;
use app\services\renderers\Template;
use app\services\renderers\TemplateRenderer;
use app\models\repositories\PurchaseRepository;
use app\services\shop\OrderProcessor;


class OrderController extends Controller
{
    private $orderModel;

    /** @var  PurchaseRepository */
    private $purchaseRep;
    
    /** @var OrderProcessor */
    private $orderProcessor;
    
    /*
     * отображения конкретного заказа
     */
    public function actionView(){
        $orderId = $this->getRequest()->getParams()['id'];
        $this->purchaseRep = App::call()->purchaseRepository;
        $purchases = $this->purchaseRep->getOrderPurchases($orderId);
        $order = App::call()->orderRepository->findOne($orderId);
        $cartInfo = $this->cartProcessor = App::call()->cartProcessor->cartMainInfo();

        $tpl = new Template(
            new TemplateRenderer(),
            "shop/view",
            [
                'order' => $order,
                'purchases' => $purchases,
                'user'=>App::call()->user->getCurrent(),
                'layout'=>'default',
                'title' => 'Список заказов',
                'total'=>$cartInfo[0],'quantity'=>$cartInfo[1]
            ]
        );

        echo $tpl->render();
    }




/*
 * Отображение списка заказов
 */
    public function actionList(){
        $id = $this->getRequest()->getParams()['id'];
        $orders = App::call()->orderRepository->findBy(['user_id' => $id]);
        $user = App::call()->user->getCurrent();
        $this->cartProcessor = App::call()->cartProcessor;
        $cartInfo = $this->cartProcessor->cartMainInfo();

        $tpl = new Template(
            new TemplateRenderer(),
            "shop/order_list",
            [
            'orders' => $orders,
            'user'=>$user,
            'layout'=>'default',
            'title' => 'Список заказов',
            'total'=>$cartInfo[0],'quantity'=>$cartInfo[1]
            ]
        );

        echo $tpl->render();
    }







    public function getOrderModel(){
        if(!isset($this->orderModel)) 
        {
            $this->orderModel = new Order();
        }
        return $this->orderModel;
    }

    /*
 * реакция на добавления заказа
 */
    public function actionCreate(){

        if($_SERVER['REQUEST_METHOD'] == "POST") {
            
            $this->orderProcessor = App::call()->orderProcessor;
            $this->orderProcessor->createUserOrder();
        }

    }


}