<html>
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <script src='/js/jquery-3.2.1.min.js'></script>
    <script src='/js/js.js'></script>

    <title> <?= $render->getTitle() ?> </title>
</head>
<body>
<div class="wrapper">
    <?= $render->renderChunk('authorization' , ['user' => $user])  ?>

    <?php if(!is_null($user)):?>
    <?= $render->renderChunk('shop/cart_mini' , ['total' => $total , 'quantity'=>$quantity])  ?>
    <?php endif; ?>
    <div class='navigation'>
        <?= $render->renderChunk('menu')  ?>
    </div>

    <div class="content">
        <?= $render->getContent() ?>
    </div>

</div>
</body>
</html>