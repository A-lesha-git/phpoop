<?php


namespace app\models;


use app\base\App;

class Order extends DataEntity
{
    protected $id;
    protected $status;
    protected $address;
    protected $delivery_id;
    public $delivery;
    protected $total;
    protected $date;
    protected $discount = null;
    private $paymant;

    /**
     * @return mixed
     */
    public function getPaymant()
    {
        return $this->paymant;
    }

    /**
     * @param mixed $paymant
     */
    public function setPaymant($paymant)
    {
        $this->paymant = $paymant;
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

    // after testing remove hardcode
    public function getOrder($orderId = 97){
        App::call()->orderRepository->findOne($orderId);

    }
    


}


