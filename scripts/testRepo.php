<?php
use app\services\Autoload;
use app\models\Product;

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once '../vendor/autoload.php';
require_once '../config/conf.php';


spl_autoload_register([new Autoload(), 'loadClass']);



/*
 * test Repositories
 */

//$orderRep = new \app\models\repositories\OrderRepository();
//var_dump($orderRep->findAll());

//$deliveryRep = new \app\models\repositories\DeliveryRepository();
//var_dump($deliveryRep->findALl());

//$catRep = new \app\models\repositories\CategoryRepository();
//var_dump($catRep->findAll());


$repository = new \app\models\repositories\ProductRepository();
$product = new Product();
$product->setCategoryId(2);
$product->setTitle('Властелин Колец. Кольцо всевластие');
$product->setDescription('«Властелин колец» является одним из самых крупных проектов в истории кино. Его реализация заняла восемь лет; все три фильма были сняты одновременно в Новой Зеландии, родной стране Джексона. У каждого из фильмов трилогии есть специальная расширенная версия, выпущенная на DVD спустя год после выхода соответствующей театральной версии. Фильмы следуют за основной сюжетной линией книги, но опускают некоторые существенные элементы повествования, включают дополнения и отклонения от исходного материала.');
$product->setPrice(9991);



$repository->add($product);

$productId = $repository->getLastInsertedId();
$product = $repository->findOne($productId);
var_dump($product);
$product->setTitle('отредактированное наименование');
$product->setDescription('123123«Властелин колец» является одним из самых крупных проектов в истории кино. Его реализация заняла восемь лет; все три фильма были сняты одновременно в Новой Зеландии, родной стране Джексона. У каждого из фильмов трилогии есть специальная расширенная версия, выпущенная на DVD спустя год после выхода соответствующей театральной версии. Фильмы следуют за основной сюжетной линией книги, но опускают некоторые существенные элементы повествования, включают дополнения и отклонения от исходного материала.');
$product->setCategoryId(1);
$product->setPrice(888);
$repository->update($product);
$repository->delete($productId);
