
<div class="product-box">
    <div class="product-box-img">
        <img src="/img/<?= $product->getImage() ?>" alt="<?=$product->getTitle()?>">
    </div>
    <div class="promo">
        <h3><?=$product->getTitle()?></h3>
        ЦЕНА:<span class="price">  <strong>Цена: </strong> <?=$product->getPrice()?>  ₽. </span>

        <button class="buyProduct" id="prod_<?=$product->getId()?>" > КУПИТЬ</button><br>
        <span class="message-info" style="color:green"></span>
    </div>

    <div class="product-description">
        <strong>Описание: </strong> <?=$product->getDescription()?>
    </div>
</div>
