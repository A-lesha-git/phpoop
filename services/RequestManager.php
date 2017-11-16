<?php
/**
 * Created by PhpStorm.
 * User: gala
 * Date: 09.11.17
 * Time: 18:21
 */

namespace app\services;


class RequestNotMatchException extends \Exception{}

class RequestManager
{

    private $requestString;
    private $controllerName = "product";
    private $actionName='list';
    private $params;
    private $patterns =
        [
        "#(?P<controller>\w+)[/]?(?P<action>\w+)?[/]$#ui",// есть баг, пока не получилось исправить ссылки данного паттерна должны оканчиваться на '/'
        "#(?P<controller>\w+)[/]?(?P<action>\w+)?[/](?P<id>\d+)#ui"
        ];

    /**
     * RequestManager constructor.
     */
    public function __construct()
    {
        $this->parseRequest();
    }

    //распарсиваем Request
    public function parseRequest(){

        $this->requestString = $_SERVER['REQUEST_URI'];
        if($this->requestString !="/") {
            foreach ($this->patterns as $pattern) {
                if (preg_match_all($pattern, $this->requestString, $matches)) {
                    $this->controllerName = $matches['controller'][0];
                    $this->actionName = $matches['action'][0];
                    $this->params = $_REQUEST;
                    if (isset($matches['id'])) {
                        $this->params['id'] = $matches['id'][0];
                    }

                    return;
                }
            }
            throw new RequestNotMatchException("Неверный запрос!");
        }

    }

    public function getParams(){
        return $this->params;
    }

    public  function getControllerName(){
        return $this->controllerName;
    }

    public function getActionName(){
        return $this->actionName;
    }
}