$(document).ready(function () {

    $(".addToCartBtn").click(function () {

        var url = "http://localhost/SepetSistemi/basket.php";
        var data = {
            post: "addToCart",
            product_id: $(this).attr("product-id")
        }
        $.post(url, data, function (response) {
            $(".cart-count").text(response);
        })
    })

    $(".removeFromCartBtn").click(function () {

        var url = "http://localhost/SepetSistemi/basket.php";
        var data = {
            post: "removeFromCart",
            product_id: $(this).attr("product-id")
        }
        $.post(url, data, function (response) {
            window.location.reload();
        })
    })

})