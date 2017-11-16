<?php

$patterns = [
    "#(?P<controller>\w+)[/]?(?P<action>\w+)?[/]$#ui",
    "#(?P<controller>\w+)[/]?(?P<action>\w+)?[/](?P<id>\d+)#ui"
];

//$url  = '/product/card/';
$url  = '/product/card/13';
$id = 0;

foreach ($patterns as $pattern) {
    if (preg_match_all($pattern, $url, $matches)) {
        var_dump($matches);
        $contr = $matches['controller'][0];
        $action = $matches['action'][0];
        if (isset($matches['id'])) {
            $id = $matches['id'][0];
        }
        break;
    }
}







//$url  = '/product/card/123';
//$regexp = "/[\/]/u";
//$parts = preg_split('[/]', $url);
//var_dump($parts);
