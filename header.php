<?php
session_start();
ob_start();

if (isset($_SESSION["shoppingBasket"])){

    $shoppingBasket = $_SESSION["shoppingBasket"];

    $total_count = $shoppingBasket["summary"]["total_count"];
    $total_price = $shoppingBasket["summary"]["total_price"];
    $shoppingProducts = $shoppingBasket["products"];
}else{
    $total_count = 0;
    $total_price = 0.0;
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Sepet Sistemi</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Ürünler <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="shopping-basket.php">
                    <span class="fa fa-shopping-cart"></span>
                    <span class="badge cart-count"><?php echo $total_count; ?></span>
                </a>
            </li>
        </ul>
    </div>
</nav>
