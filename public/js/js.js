$(document).ready(function() {


    $('.update-cart').on('change', function(){
            // alert( " " + $(this).val());
            var id_good = $(this).attr("id").substr(5);
            $.ajax({
                dataType: "json",
                method: "POST",
                url: "/cart/update/",
                data: { good_id: id_good,
                    quantity: $(this).val()
                },
                success: function(answer){
                    // console.log(answer.total);
                    $('.message-info').text(answer.message);
                    $('.quantity-cart').text(answer.quantity);
                    $('.total-cart').text(answer.total);
                }
            })
        }
    );

    $('.buyProduct').on('click', function (){
        var id_good = $(this).attr("id").substr(5);
        // console.log(id + " " + $(this).val());
        $.ajax({
            dataType: "json",
            method: "POST",
            url: "/cart/add/",
            data: { product_id: id_good,
                quantity: 1
            },
            success: function(answer){
                $('.message-info').text(answer.message);
                $('.quantity-cart').text (" " +answer.quantity);
                $('.total-cart').text("Итого: " + answer.total + " руб.");
            }
        })
    });


    $('.removeCartItem').on('click', function (e){
        e.preventDefault();
        var id_good = $(this).attr("id").substr(5);

        $.ajax({
            dataType: "json",
            method: "POST",
            url: "/cart/delete/",
            data: { good_id: id_good},
            success: function(answer){
                // console.log(answer);
                $('.message-info').text(answer.message);
                $('.quantity-cart').text(answer.quantity);
                $('.total-cart').text(answer.total);
                $('tr td #item_' +id_good).parents('tr').remove();
            }
        })
    });

    //create order
    $('.make-order').on('click', function(){

            // var msg   = $('#shop_cart_order').serialize();
            // console.log(msg);
            
            $.ajax({
                dataType: "json",
                method: "POST",
                url: "/order/create/",
                data: $('#shop_cart_order').serialize(),
                success: function(response){
                    $('.message-info').text(0);
                    $('.quantity-cart').text(0);
                    $('.total-cart').text(0);
                    $('.message-info').text(response.message);
                    $('.product-cart').remove();
                }
            })
        }
    );

    //create order
    $('.cancel-order').on('click', function(){
            var id_good = $(this).attr("id").substr(6);
            $.ajax({
                dataType: "json",
                method: "POST",
                url: "/shop/orders/cansel",
                data: {
                    "order_id":id_good
                },
                success: function(response){
                    $('.message-info').text(response.message);
                    $('#order_' +id_good).parents('li').remove();
                }
            })
        }
    );

    //create order
    // $('.make-order').on('click', function(){
    //         // var msg   = $('#shop_cart_order').serialize();
    //         // console.log(msg);
    //         $.ajax({
    //             dataType: "json",
    //             method: "POST",
    //             url: "/shop/orders/create",
    //             data: $('#shop_cart_order').serialize(),
    //             success: function(response){
    //                 $('.message-info').text(0);
    //                 $('.quantity-cart').text(0);
    //                 $('.total-cart').text(0);
    //                 $('.message-info').text(response.message);
    //                 $('.product-cart').remove();
    //             }
    //         })
    //     }
    // );


    //
    $('.send-request').on('click', function(){
            // var msg   = $('#shop_cart_order').serialize();
            // console.log(msg);
            $.ajax({
                dataType: "json",
                method: "POST",
                url: "/shop/orders/send",
                data: $('#shop_cart_order').serialize(),
                success: function(response){
                    $('.message-info').text(0);
                    $('.quantity-cart').text(0);
                    $('.total-cart').text(0);
                    $('.message-info').text(response.message);
                    $('.product-cart').remove();
                }
            })
        }
    );



});

