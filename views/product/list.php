<div class="product">
    <p class="quantity">
        Количество: <?= count($products) ?>
    </p>
    <?php foreach ($products as $product): ?>
    <div class="item">
        <div class="img-wrapper">
            <div class="product-img">
                <a href="/product/card/<?=$product->getId()?>" ><img src="/img/<?= $product->getImage() ?>" alt="<?=$product->getTitle()?>"></a>
            </div>
        </div>
        <div class="img-desc">
            <a href="/product/card/<?= $product->getId() ?>"> <p> <?=$product->getTitle()?><br> </p></a>
            <span class="price"> <?=$product->getPrice()?>  ₽ .</span>
            <p><?= mb_substr($product->getDescription(),0,44) ?></p>
        </div>
    </div>
<?php endforeach; ?>