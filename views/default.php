<html>
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <script src='/js/jquery-3.2.1.min.js'></script>
    <script src='/js/js.js'></script>

    <title>  </title>
</head>
<body>
<div class="wrapper">
    <?= $auth  ?>

    <?php if(!is_null($user)):?>
        <?= $cart_mini  ?>
    <?php endif; ?>
    <div class='navigation'>
        <?= $menu ?>
    </div>

    <div class="content">
        <?= $content ?>
    </div>



</div>
</body>
</html>