<?php
/**
 * Created by PhpStorm.
 * User: gala
 * Date: 16.11.17
 * Time: 17:06
 */

namespace app\models;


class Cart extends DataEntity
{
    private $id;
    private $product_id;
    private $quantity;
    private $user_id;
    private $price;
    private $title;
    private $is_in_order;
    private $order_id;

    /**
     * Cart constructor.
     * @param $id
     * @param $product_id
     * @param $quantity
     * @param $user_id
     * @param $price
     * @param $title
     * @param $is_in_order
     * @param $order_id
     */
    public function __construct($id=null, $product_id=null, $quantity=null, $user_id=null, $price=null, $title=null, $is_in_order=false, $order_id=null)
    {
        $this->id = $id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
        $this->user_id = $user_id;
        $this->price = $price;
        $this->title = $title;
        $this->is_in_order = $is_in_order;
        $this->order_id = $order_id;
    }


    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @param mixed $product_id
     */
    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }


    public function getTotal(){
        return $this->getPrice() * $this->getQuantity();
    }

    /**
     * @return boolean
     */
    public function isIsInOrder()
    {
        return $this->is_in_order;
    }

    /**
     * @param boolean $is_in_order
     */
    public function setIsInOrder($is_in_order)
    {
        $this->is_in_order = $is_in_order;
    }

    /**
     * @return null
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * @param null $order_id
     */
    public function setOrderId($order_id)
    {
        $this->order_id = $order_id;
    }
    

}