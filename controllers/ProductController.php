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
use app\services\renderers\Template;
use app\services\renderers\TemplateRenderer;

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
        $this->cartProcessor = App::call()->cartProcessor;
        $cartInfo = $this->cartProcessor->cartMainInfo();


        $tpl = new Template(
            new TemplateRenderer(),
            'product/list',
            [
            'products' => $products,
            'user'=>App::call()->user->getCurrent(),
            'total'=>$cartInfo[0],
            'quantity'=>$cartInfo[1]
            ]
        );

        echo $tpl->render();
    }


    /**
     * Выводит страницу товара
     */
    public function actionCard(){

        echo json_decode('\u0422\u043e\u0432\u0430\u0440 \u0434\u043e\u0431\u0430\u0432\u043b\u0435\u043d \u0432 \u043a\u043e\u0440\u0437\u0438\u043d\u0443');
        $id = $this->getRequest()->getParams()['id'];
        $this->productRepository = App::call()->productRepository;

        $product = $this->productRepository->findOne($id);

        if(!$product){
            $this->redirectTo404();
        }

        $this->cartProcessor = App::call()->cartProcessor;
        $cartInfo = $this->cartProcessor->cartMainInfo();

        $tpl = new Template(
            new TemplateRenderer(),
            "/product/product",
            [
            'product' => $product,
            'user'=>App::call()->user->getCurrent(),
            'total'=>$cartInfo[0],'quantity'=>$cartInfo[1]
            ]
        );

        echo $tpl->render();

    }



    public function actionIndex(){
        $this->productRepository = App::call()->productRepository;
        $products = $this->productRepository->findAll();
        $this->cartProcessor = App::call()->cartProcessor;
        $cartInfo = $this->cartProcessor->cartMainInfo();


        $tpl = new Template(
            new TemplateRenderer(),
            'product/list',
            [
                'products' => $products,
                'user'=>App::call()->user->getCurrent(),
                'total'=>$cartInfo[0],
                'quantity'=>$cartInfo[1]
            ]
        );

        echo $tpl->render();
    }
    
}


