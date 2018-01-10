<div class="cart">


        <table class="product-cart">
            <form id="shop_cart_order" action="javascript:void(null);" method="post">
                <?php foreach ($products as $item): ?>

                    <tr class="product-cart">
                        <input type="hidden" name="id[]" value="<?= $item->getId()?>">
                        <input type="hidden" name="product_id[]" value="<?= $item->getProductId()?>">

                       
                        <!--<td>Количество: 1</td> -->
                        <td>
                            <span ><?=$item->getTitle()?></span>
                            <input type="hidden" name="title[]" value="<?=$item->getTitle()?>">

                        </td>
                        <td>Цена: <span class="price"><?=$item->getPrice()?> руб.</span>
                            <input type="hidden" name="price[]" value="<?=$item->getPrice()?>">
                        </td>
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
                    <td>Кол-во товаров: <span class="quantity-cart"> <?= $quantity ?></span></td>
                    <td>ИТОГО: <span class="total-cart"> <?= $total ?></span> руб.</td>
                </tr>
                <tr>
                    <td><input type="text" name="email" value="any@email"></td>
                    <td>
                        <select   name="delivery">
                            <option disabled>Выберите способ доставки</option>
                            <option value="1">Курьером</option>
                            <option value="2">Самовывоз</option>
                        </select></td>
                    <td>
                        <select   name="payment">
                            <option disabled>Выберите способ оплаты</option>
                            <option value="Наличным">Наличным</option>
                            <option value="Безнал">Безнал</option>
                        </select>
                    </td>
                    <td>
                        <textarea name="address" placeholder="Ваш адрес:"></textarea><br>
                    </td>
                    <td><button class="make-order"> ОФОРМИТЬ ЗАКАЗ </button></td>
            </form>
            </tr>

        </table>
        <span class="message-info" style="color:green"></span>




</div>