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


class OrderController extends Controller
{
    private $orderModel;
    /*
     * отображения конкретного заказа
     */
    public function actionView(){
        $orderId = $this->getRequest()->getParams()['id'];
//        $purcheses = ;
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




    /*
     * реакция на добавления заказа
     */
    public function ActionCreate(){

    }


    public function getOrderModel(){
        if(!isset($this->orderModel)) 
        {
            $this->orderModel = new Order();
        }
        return $this->orderModel;
    }
}