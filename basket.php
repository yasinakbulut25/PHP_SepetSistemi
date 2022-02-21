<?php

include "db.php";
session_start();
ob_start();

// AddToCart
/**
 * urun_id al
 * basket.php dosyasına post et
 * verritabanından utunun bilgilerini al
 * SESSION daki sepete ekle
 * sepeti tekrar hesapla
 */


function addToCart($product_item){

    // SESSION
    /**
     * products
     *      ürün adı .. adet .. fiyat ..
     *      ürün adı .. adet .. fiyat ..
     *      ürün adı .. adet .. fiyat ..
     * summary
     *      toplam ürün adet ....... toplam fiyat
     */

    if (isset($_SESSION["shoppingBasket"])){
        $shoppingBasket = $_SESSION["shoppingBasket"];
        $products = $shoppingBasket["products"];
    }else{
        $products = array();
    }

    // Adet Kontrolü

    if (array_key_exists($product_item->product_id, $products)){
        $products[$product_item->product_id]->count++;
    }else{
        $products[$product_item->product_id] = $product_item;
    }

    // sepetin hesaplanması

    $total_price = 0.0;
    $total_count = 0;

    foreach ($products as $product){

        $product->total_price = $product->count * $product->product_price;

        $total_price += $product->total_price;
        $total_count += $product->count;
    }

    $summary["total_price"] = $total_price;
    $summary["total_count"] = $total_count;
    $_SESSION["shoppingBasket"]["products"] = $products;
    $_SESSION["shoppingBasket"]["summary"] = $summary;

    return $total_count;
}

function removeFromCart($product_id){

    if (isset($_SESSION["shoppingBasket"])){
        $shoppingBasket = $_SESSION["shoppingBasket"];
        $products = $shoppingBasket["products"];

        // Ürünü listeden çıkart

        if (array_key_exists($product_id, $products)){
            unset($products[$product_id]);
        }

        // tekrar sepeti hesapla

        $total_price = 0.0;
        $total_count = 0;

        foreach ($products as $product){

            $product->total_price = $product->count * $product->product_price;

            $total_price += $product->total_price;
            $total_count += $product->count;
        }

        $summary["total_price"] = $total_price;
        $summary["total_count"] = $total_count;
        $_SESSION["shoppingBasket"]["products"] = $products;
        $_SESSION["shoppingBasket"]["summary"] = $summary;

        return true;
    }

}

function inCount($product_id){

    if (isset($_SESSION["shoppingBasket"])){
        $shoppingBasket = $_SESSION["shoppingBasket"];
        $products = $shoppingBasket["products"];

        // Adet Kontrolü

        if (array_key_exists($product_id, $products)){
            $products[$product_id]->count++;
        }

        // sepetin hesaplanması

        $total_price = 0.0;
        $total_count = 0;

        foreach ($products as $product){

            $product->total_price = $product->count * $product->product_price;

            $total_price += $product->total_price;
            $total_count += $product->count;
        }

        $summary["total_price"] = $total_price;
        $summary["total_count"] = $total_count;
        $_SESSION["shoppingBasket"]["products"] = $products;
        $_SESSION["shoppingBasket"]["summary"] = $summary;

        return true;
    }
}

function deCount($product_id){

    if (isset($_SESSION["shoppingBasket"])){
        $shoppingBasket = $_SESSION["shoppingBasket"];
        $products = $shoppingBasket["products"];

        // Adet Kontrolü

        if (array_key_exists($product_id, $products)){
            $products[$product_id]->count--;

            if ($products[$product_id]->count <= 0){

                    // Ürünü listeden çıkart

                    if (array_key_exists($product_id, $products)){
                        unset($products[$product_id]);
                    }

                    // tekrar sepeti hesapla

                    $total_price = 0.0;
                    $total_count = 0;

                    foreach ($products as $product){

                        $product->total_price = $product->count * $product->product_price;

                        $total_price += $product->total_price;
                        $total_count += $product->count;
                    }

                    $summary["total_price"] = $total_price;
                    $summary["total_count"] = $total_count;
                    $_SESSION["shoppingBasket"]["products"] = $products;
                    $_SESSION["shoppingBasket"]["summary"] = $summary;

                    return true;
            }
        }

        // sepetin hesaplanması

        $total_price = 0.0;
        $total_count = 0;

        foreach ($products as $product){

            $product->total_price = $product->count * $product->product_price;

            $total_price += $product->total_price;
            $total_count += $product->count;
        }

        $summary["total_price"] = $total_price;
        $summary["total_count"] = $total_count;
        $_SESSION["shoppingBasket"]["products"] = $products;
        $_SESSION["shoppingBasket"]["summary"] = $summary;

        return true;
    }
}

if (isset($_POST['post'])){
    $islem = $_POST['post'];
    if ($islem == "addToCart"){

        $id = $_POST['product_id'];

        $product = $db->prepare("SELECT * FROM products where product_id = {$id}");
        $product->execute();
        $p = $product->fetch(PDO::FETCH_OBJ);
        $p->count = 1;

        echo addToCart($p);

    }else if($islem == "removeFromCart"){
        $id = $_POST["product_id"];

        echo removeFromCart($id);
    }
}

if (isset($_GET['post'])){
    $islem = $_GET['post'];
    if ($islem == "inCount"){

        $id = $_GET['product_id'];

        if (inCount($id)){
            header("Location:shopping-basket.php");
        }

    }else if($islem == "deCount"){
        $id = $_GET["product_id"];
        if (deCount($id)){
            header("Location:shopping-basket.php");
        }
    }
}



?>