<?php


namespace app\models\repositories;


use app\models\Category;

class CategoryRepository extends Repository
{

    /**
     * CategoryRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'categories';
        $this->entityClass = Category::class;
    }
}