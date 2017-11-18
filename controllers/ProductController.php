<?php
/**
 * Created by PhpStorm.
 * User: gala
 * Date: 01.11.17
 * Time: 8:53
 */

namespace app\controllers;


use app\base\App;
use app\models\repositories\ProductRepository;
use app\models\repositories\SessionRepository;
use app\models\User;
use app\services\shop\CartProcessor;
use app\services\ShopcartProcessor;


class ProductController extends Controller
{
    /** @var ProductRepository*/
    private $productRepository;

    /** @var ShopcartProcessor*/
    private $shopcartProcessor;

    /** @var User*/
    private $user;

    /** @var  CartProcessor */
    private $cartProcessor;
    /**
     * ProductController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Выводит список товаров
     */
    public function actionList(){
        $this->productRepository = App::call()->productRepository;
        $products = $this->productRepository->findAll();


        $render = $this->getTemplateRenderer();


        $render->setTitle("Товары");
        $render->setContent($render->renderContent('product/list', ['products'=>$products]));

        $this->cartProcessor = App::call()->cartProcessor;
        $cartInfo = $this->cartProcessor->cartMainInfo();

        echo $render->render(['render' => $this->render, 'user'=>App::call()->user->getCurrent(), 'total'=>$cartInfo[0], 'quantity'=>$cartInfo[1]]);
    }


    /**
     * Выводит страницу товара
     */
    public function actionCard(){
        $id = $this->getRequest()->getParams()['id'];
        $this->productRepository = App::call()->productRepository;

        $product = $this->productRepository->findOne($id);

        if(!$product){
            $this->redirectTo404();
        }
        $render = $this->getTemplateRenderer();
        $render->setTitle($render->getTitle() . "/" . $product->getTitle());
        $render->setContent($render->renderContent('/product/product', ['product'=>$product]));

        $user = App::call()->user->getCurrent();

        $this->cartProcessor = App::call()->cartProcessor;
        $cartInfo = $this->cartProcessor->cartMainInfo();

        echo $render->render(['render' => $this->render, 'user'=>$user,'total'=>$cartInfo[0], 'quantity'=>$cartInfo[1]]);
    }



    public function actionIndex(){
        $this->productRepository = App::call()->productRepository;
        $products = $this->productRepository->findAll();
        $render = $this->getTemplateRenderer();

        $render->setTitle("Товары");
        $render->setContent($render->renderContent('product/list', ['products'=>$products]));

        echo $render->render(['render' => $this->render, 'user'=>App::call()->user->getCurrent()]);
    }
    
}


