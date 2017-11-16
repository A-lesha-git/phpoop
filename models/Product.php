<?php

namespace app\models;
use app\interfaces\IProduct;
class Product extends DataEntity
{
    protected $id;
    protected $title;
    protected $price;
    protected $description;
    protected $category_id;
    protected $image;
    protected $published = true;


    /**
     * Product constructor.
     * @param $id
     * @param $title
     * @param $price
     * @param $description
     * @param $category_id
     * @param $image
     */
    public function __construct($id = null, $title = null, $price = null, $description = null, $category_id = null, $image = null, $published=null)
    {
        $this->id           = $id;
        $this->title        = $title;
        $this->price        = $price;
        $this->description  = $description;
        $this->category_id  = $category_id;
        $this->image        = $image;
        $this->published    = $published;
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
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
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


    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @param integer $category_id
     */
    public function setCategoryId( $category_id)
    {
        $this->category_id = $category_id;
    }

    /**
     * @return null
     */
    public function getImage()
    {
        return $this->image;
    }



}


