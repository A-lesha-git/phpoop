<?php
/**
 * Created by PhpStorm.
 * User: gala
 * Date: 22.11.17
 * Time: 13:48
 */

namespace app\models;


class Purchase extends DataEntity
{
    protected $id;
    protected $product_id;
    protected $order_id;
    protected $title;
    protected $quantity;
    protected $price;

    /**
     * Purchase constructor.
     * @param $id
     * @param $product_id
     * @param $order_id
     * @param $title
     * @param $quantity
     * @param $price
     */
    public function __construct($id = null, $product_id= null, $order_id = null, $title = null, $quantity = null, $price = null)
    {
        $this->id = $id;
        $this->product_id = $product_id;
        $this->order_id = $order_id;
        $this->title = $title;
        $this->quantity = $quantity;
        $this->price = $price;
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
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * @param mixed $order_id
     */
    public function setOrderId($order_id)
    {
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

    


}