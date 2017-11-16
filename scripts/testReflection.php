<?php

class Foo{


}
class Dog{
    private $name;
    public $age;
    private $weight;

    /**
     * Dog constructor.
     * @param $name
     * @param $age
     * @param $weight
     */
    public function __construct($name, $age, $weight)
    {
        $this->name = $name;
        $this->age = $age;
        $this->weight = $weight;
    }

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }


}


$params = [
    'name' => 'Sharik',
    'age' => '3 years',
    'weight' => '5 kg',
];


$reflection =  new \ReflectionClass("Dog");
$dog =  $reflection->newInstanceArgs($params);
var_dump($dog);

var_dump($dog->__get('age'));