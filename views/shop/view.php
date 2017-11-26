
<h3>Номер заказа: <?= $order->getId() ?></h3>
<table>

    <?php foreach ($purchases as $purchase): ?>
        <tr>
            <td><?= $purchase->getTitle() ?></td>
            <td>кол-во: <?= $purchase->getQuantity() ?></td>
            <td>стоимость: <?= $purchase->getPrice() ?> Рублей</td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td>Статус: <?= $order->getStatus()?></td>
        <td>Способ доставки: <?= $order->delivery ?></td>
        <td>Способ оплаты: <?= $order->getPayment() ?></td>

    </tr>
    <tr>
        <td>Итого: <b><i> <?= number_format($order->getTotal(), 2, ',', ' '); ?><i></b></td>
    </tr>


</table>