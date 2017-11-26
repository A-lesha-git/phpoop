<?php


namespace app\models;


use app\base\App;

class Order extends DataEntity
{
    protected $id;
    protected $user_id;
    protected $status;
    protected $address;
    protected $delivery_id;
    public $delivery;
    protected $total;
    protected $date;
    protected $discount = null;
    private $payment;
    protected $email;



    /**
     * Order constructor.
     * @param $id
     * @param $user_id
     * @param $status
     * @param $address
     * @param $delivery_id

     * @param $date
     * @param $payment
     * @param $total
     * @param $email
     * @param $delivery
     */
    public function __construct($id = null, $user_id=null,   $status = null, $address = null, $delivery_id = null, $date = null, $payment = null, $total = null, $email=null, $delivery = null)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->status = $status;
        $this->address = $address;
        $this->delivery_id = $delivery_id;
        $this->total = $total;
        $this->date = $date;
        $this->payment = $payment;
        $this->email = $email;
        $this->delivery = $delivery;

    }


    /**
     * @return mixed
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * @param mixed $payment
     */
    public function setPayment($payment)
    {
        $this->payment = $payment;
    }



    public  function getAny()
    {
        return null;
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
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }


    /**
     * @return mixed
     */
    public function getDeliveryId()
    {
        return $this->delivery_id;
    }

    /**
     * @param mixed $delivery_id
     */
    public function setDeliveryId($delivery_id)
    {
        $this->delivery_id = $delivery_id;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }



    /**
     * @param mixed $delivery
     */
    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getOrder($orderId){
        App::call()->orderRepository->findOne($orderId);
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
    



}


