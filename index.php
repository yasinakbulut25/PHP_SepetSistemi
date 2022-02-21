<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Sepet Sistemi</title>
    <script src="https://kit.fontawesome.com/ab7283eac0.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/custom.css">
    <!-- bootstrap files -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.css">

</head>
<body>

<?php require_once 'db.php'; ?>

<?php include "header.php"; ?>

<div class="album py-5 ">
    <div class="container">
        <div class="row">
            <?php
                $products = $db->prepare("SELECT * FROM products");
                $products->execute();
                $product = $products->fetchAll(PDO::FETCH_ASSOC);

                foreach ($product as $write){
                    ?>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="card shadow-sm">
                            <img src="<?php echo $write['product_img']; ?>"  width="100%" height="225">
                            <div class="card-body">
                                <p><?php echo $write['product_name']; ?></p>
                                <p class="card-text text-muted small"><?php echo $write['product_exp']; ?><p>
                                <div class="text-center">
                                    <div class="btn-group ">
                                        <button  product-id="<?php echo $write['product_id']; ?>" role="button" class="btn btn-sm btn-outline-secondary addToCartBtn">
                                            <span class="fa fa-shopping-cart"></span> Sepete Ekle
                                        </button>
                                    </div>
                                    <p class="mt-2 mb-1 text-muted"><?php echo $write['product_price']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }

            ?>
        </div>
    </div>
</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>
<!-- bootstrap files -->
<script src="assets/bootstrap/js/bootstrap.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
<script src="assets/js/cstm.js"></script>
</body>
</html>