<?php
namespace app\services\response;


class JsonCartResponse extends Response
{
    private $total;
    private $quantity;
    private $message;


    public function __construct($total=null, $quantity=null, $message=null)
    {
        $this->total = $total;
        $this->quantity = $quantity;
        $this->message = $message;
    }

    public function setMessage($msg){
        $this->message = $msg;
    }


    public function get()
    {
        return json_encode(get_object_vars($this));
    }
}