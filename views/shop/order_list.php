<?php if(empty($orders)) :?>
    <h3>У вас нет заказов</h3>
<?php else: ?>
    <?php foreach ($orders as $order): ?>
        <li>
            Номер заказа: <?= $order->getId() ?>
            <span class="delivery">Доставка: <?= $order->delivery?></span>
            <span class="total-price">Стоимость: <?= $order->getTotal() ?></span>
            <span class="payment">Способ оплаты: <?= $order->getPaymant() ?></span>
            <a href="/shop/orders?order_id=<?=$order->getId()?>">Посмотреть</a>
            <a id="order_<?= $order->getId() ?>" class="cancel-order" href="#">Отменить</a>
        </li>
    <?php endforeach; ?>
    </table>

    <span class="message-info"></span>
<?php endif; ?>
