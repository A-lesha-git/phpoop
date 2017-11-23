<div class='navigation'>
    <ul class="menu">
        <li>
            <a href="/product/list/">Главная</a>
        </li>
        <li>
            <a href="/product/list/">Продукты</a>
        </li>
        <?php
        if (isset($user)):  ?>
        <li>
            <a href="/order/list/<?= $user->id?>">Заказы</a>
        </li>
        <?php endif; ?>
    </ul>
</div>