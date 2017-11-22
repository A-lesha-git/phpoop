<?php
/**
 * Created by PhpStorm.
 * User: gala
 * Date: 20.11.17
 * Time: 18:27
 */

namespace app\services\notifies;


class ShopCartNotifier extends Notifier
{
    private $message;
    public $isUpdated = false;
    public $isAdded = false;
    public $isDeleted = false;
    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    public function getMessageUpdated(){
        if($this->isUpdated){
            return "Корзина обновлена";
        }else{
            return "Ошибка обновления корзины";
        }
    }

    public function getMessageAdded(){
        if($this->isAdded){
            return "Товар добавлен в корзину";
        }else{
            return "Ошибка добавления товара в корзину";
        }
    }

    public function getMessageDeleted(){
        if($this->isDeleted){
            return "Товар удален из корзины";
        }else{
            return "Ошибка удаления товара из корзины";
        }
    }




    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }




}