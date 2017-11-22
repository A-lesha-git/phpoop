<?php


namespace app\models;


class Category extends DataEntity
{
    private $id;
    private $name;

    /**
     * Category constructor.
     * @param $id
     * @param $name
     */
    public function __construct($id=null, $name = null)
    {
        $this->id = $id;
        $this->name = $name;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }


}