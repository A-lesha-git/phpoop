<html>
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" type="text/css" href="/css/style.css">

    <title> <?= $render->getTitle() ?> </title>
</head>
<body>
<div class="wrapper">
    <?= $render->renderChunk('authorization' , ['user' => $user])  ?>
    <div class='navigation'>
        <?= $render->renderChunk('menu')  ?>
    </div>

    <div class="content">
        <?= $render->getContent() ?>
    </div>

</div>
</body>
</html>