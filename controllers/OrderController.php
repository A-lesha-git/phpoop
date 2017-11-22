<?php
/**
 * Created by PhpStorm.
 * User: gala
 * Date: 18.11.17
 * Time: 15:53
 */

namespace app\controllers;


use app\models\Order;

class OrderController extends Controller
{
    private $orderModel;
    /*
     * отображения конкретного заказа
     */
    public function actionView($id){
        
    }


    /*
     * Отображение списка заказов
     */
    public function actionList(){
        
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