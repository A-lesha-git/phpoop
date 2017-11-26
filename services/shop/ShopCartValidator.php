<?php

namespace app\services\shop;


use app\interfaces\shop\ICartValidator;
use app\models\Cart;

class ShopCartNotMatchException extends \Exception {
    public $error;

    /**
     * ShopCartNotMatchException constructor.
     * @param $error
     */
    public function __construct($error)
    {
        $this->error = $error;
    }


}

class ShopCartValidator implements ICartValidator
{
    private $notANumber = "Неверный формат данных";
    private $numberMoreThan = "нельзя выбрать более 1000";
    private $notAZero = "Число не может быть 0 ";
    private $noMoreThanZero = "Не может быть отрицательное число ";


    public function isValidQuantity(Cart $good){

        if(is_numeric($good->getQuantity())){
            if($good->getQuantity() >1000 ){
                throw new ShopCartNotMatchException($this->numberMoreThan);
            } else if($good->getQuantity() === 0){
                throw new ShopCartNotMatchException($this->notAZero);
            }else if($good->getQuantity() < 0){
                throw new ShopCartNotMatchException($this->noMoreThanZero);
            }else{
                return true;
            }
        }else{
             throw new ShopCartNotMatchException($this->notANumber);
        }
        
    }

}