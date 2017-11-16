<?php
/**
 * Created by PhpStorm.
 * User: gala
 * Date: 07.11.17
 * Time: 13:00
 */

namespace app\models;


use app\interfaces\IDataModel;

abstract class DataEntity extends Model implements  IDataModel
{
    public function __construct()
    {
    }
}