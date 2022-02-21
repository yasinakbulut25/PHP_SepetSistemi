<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/ab7283eac0.js" crossorigin="anonymous"></script>
    <title>Shopping Basket</title>
    <link rel="stylesheet" href="assets/css/custom.css">
    <!-- bootstrap files -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.css">
</head>
<body>


<?php include "header.php"; ?>


<div class="container my-4">
    <?php
        if ($total_count > 0){
            ?>
            <h2 class="text-center">
                Sepetinizde <b class="color-danger"><?php echo $total_count; ?></b> adet ürün bulunmaktadır
            </h2>

            <div class="row ">
                <div class="col-12">
                    <table class="table-table-hover table-bordered table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">Ürün Resim</th>
                            <th class="text-center">Ürün Adı</th>
                            <th class="text-center">Ürün Fiyatı</th>
                            <th class="text-center">Ürün Adeti</th>
                            <th class="text-center">Ürün Toplam</th>
                            <th class="text-center">Sepetten Çıkar</th>
                        </tr>
                        </thead>

                        <tbody>

                            <?php
                                foreach ($shoppingProducts as $write){
                                    ?>
                                    <tr>
                                        <td class="text-center">
                                            <img src="<?php echo $write->product_img; ?>" width="120px" alt="">
                                        </td>
                                        <td class="text-center"><?php echo $write->product_name; ?></td>
                                        <td class="text-center"><b><?php echo $write->product_price; ?> TL</b></td>
                                        <td class="text-center">
                                            <a href="basket.php?post=inCount&product_id=<?php echo $write->product_id; ?>" class="btn btn-xs btn-success"><i class="fa fa-plus"></i></a>
<!--                                            <input type="text" readonly value="--><?php //echo $write->count; ?><!--" class="item-count-input">-->
                                            <span class="item-count-input"><?php echo $write->count; ?></span>
                                            <a href="basket.php?post=deCount&product_id=<?php echo $write->product_id; ?>" class="btn btn-xs btn-danger"><i class="fa fa-minus"></i></a>
                                        </td>
                                        <td class="text-center"><?php echo $write->total_price; ?></td>
                                        <td class="text-center">
                                            <button product-id="<?php echo $write->product_id; ?>" class="btn-danger btn-sm removeFromCartBtn">Sepetten Çıkar <i class="fa fa-times"></i></button>
                                        </td>

                                    </tr>
                                    <?php
                                }
                            ?>

                        </tbody>
                        <tfoot>
                        <tr>
                            <th colspan="3">Toplam Ürün: <span class="color-danger"><?php echo $total_count; ?> Adet</span></th>
                            <th colspan="3">Toplam Tutar: <span class="color-danger"><?php echo $total_price; ?> TL</span></th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <?php
        }else{
            ?>
            <div class="alert alert-info">
                <b>Sepetinizde Ürün Bulunmamaktadır. Eklemek için <a href="index.php">tıklayınız.</a></b>
            </div>
            <?php
        }
    ?>
</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>
<!-- bootstrap files -->
<script src="assets/bootstrap/js/bootstrap.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
<script src="assets/js/cstm.js"></script>
</body>
</html>