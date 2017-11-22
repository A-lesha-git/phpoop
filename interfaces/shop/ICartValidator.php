<?php

namespace app\interfaces\shop;

use app\models\Cart;

interface ICartValidator
{
    public function isValidQuantity(Cart $good);
}