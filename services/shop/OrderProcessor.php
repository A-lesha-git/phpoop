<?php
/**
 * Created by PhpStorm.
 * User: gala
 * Date: 26.11.17
 * Time: 23:14
 */

namespace app\services\shop;

use app\base\App;
use app\models\Order;
use app\models\repositories\OrderRepository;
use app\models\repositories\PurchaseRepository;
use app\services\RequestManager;
class OrderProcessor
{
    /** @var  RequestManager */
    private $request;

    private $goods;

    /** @var  OrderRepository */
    private $orderRepo;

    /** @var PurchaseRepository */
    private $purchaseRepo;





    public function createUserOrder(){
        $params =  $this->prepareOrderData();
        $reflection =  new \ReflectionClass(Order::class);
        $order =  $reflection->newInstanceArgs($params);
        $this->orderRepo = App::call()->orderRepository;
        $this->orderRepo->add($order);

    }

    public function prepareOrderData(){
        $this->request = App::call()->request;

        $params = []; //data for order constructor;
        $params['id'] = null;
        $params['user_id'] = App::call()->session->getUid();
        $params['status'] = "Новый";
        $params['address'] = $this->request->get('post', 'address');
        $params['delivery_id'] = $this->request->get('post', 'delivery');
        $params['date'] = date("Y-m-d H:i:s");
        $params['payment'] = $this->request->get('post', 'payment');



        $total = 0;
        $quantity = 0;
        for($i=0;$i<count($this->request->get('post', 'quantity')); $i++){
            $quantity += $this->request->get('post', 'quantity')[$i];
            $total += $this->request->get('post', 'quantity')[$i] * $this->request->get('post', 'price')[$i];

            $this->goods['product_id'] = $this->request->get('post', 'prod_id')[$i];

        }
        
        $params['total'] = $total;
        $params['email'] = $this->request->get('post', 'email');



        return $params;
    }
}