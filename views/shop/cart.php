<div class="cart">

        <span class="message-info"><? $message ?></span>
        <table>
            <form id="shop_cart_order" action="javascript:void(null);" method="post">
                <?php foreach ($products as $item): ?>

                    <tr class="product-cart">
                        <input type="hidden" name="id[]" value="<?= $item->getId()?>">
                        <input type="hidden" name="product_id[]" value="<?= $item->getProductId()?>">
                       
                        <!--<td>Количество: 1</td> -->
                        <td><span ><?=$item->getTitle()?></span></td>
                        <td>Цена: <span class="price"><?=$item->getPrice()?> руб.</span></td>
                        <td>кол-во:
                            <!--  <span><?=$item->getQuantity()?> </span>-->
                           <input class="update-cart" type="number" id="cart_<?=$item->getId() ?>" name="quantity[]" value="<?= $item->getQuantity()?>">
                        </td>
                        <td><a class="removeCartItem" id="item_<?=$item->getId() ?>" href="#"> Удалить </a> </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <!--   <td><input type="submit" name="cart_update" value="обновить"></td> -->
                </tr>

                <tr>
                    <td>Кол-во товаров: <span class="quantity-cart"> <?= $cart[1] ?></span></td>
                    <td>ИТОГО: <span class="total-cart"> <?= $cart[0] ?></span> руб.</td>
                </tr>
                <tr>
                    <td><input type="text" name="email" value="any@email"></td>
                    <td>
                        <select   name="delivery">
                            <option disabled>Выберите способ доставки</option>
                            <option value="Курьером">Курьером</option>
                            <option value="Самовывоз">Самовывоз</option>
                        </select></td>
                    <td>
                        <select   name="payment">
                            <option disabled>Выберите способ оплаты</option>
                            <option value="Наличным">Наличным</option>
                            <option value="Безнал">Безнал</option>
                        </select></td>
                    <td><button class="make-order"> ОФОРМИТЬ ЗАКАЗ </button></td>
            </form>
            </tr>

        </table>
        <span class="message-info" style="color:green"></span>




</div>