<?php

include "../../include/connection.php";

$id_pembelian = $_GET['id_pembelian'];

$query = "SELECT * FROM `pembelian` WHERE id_pembelian = $id_pembelian";
$sql = mysqli_query($conn, $query);
$data_pembelian = mysqli_fetch_array($sql);

$query2 = "SELECT * FROM `pembelian_produk` WHERE `id_pembelian` = $id_pembelian";
$sql2 = mysqli_query($conn, $query2);
$data_produk = mysqli_fetch_array($sql2);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Confirmation - Tokotoki</title>
    <link rel="icon" href="../../images/tokoTokiLogo1.png">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <div class="navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-4 mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="navbar-toggler-icon"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="../../aboutUs/aboutUs.php">ABOUT US</a></li>
                            <li><a class="dropdown-item" href="../../productCatalog/productCatalog.php">OUR
                                    PRODUCTS</a>
                            </li>
                            <li><a class="dropdown-item" href="../../transactionPayment/transaction.php">TRANSACTION</a>
                            </li>
                            <li><a class="dropdown-item" href="../../orderHistory/orders.php">ORDER HISTORY</a></li>
                            <li><a class="dropdown-item" href="https://drive.google.com/file/d/1v-t_LLCzYGEVRAuKNjngG3G3Fr6LXqp0/view">HOW TO USE</a></li>
                            <li style="background-color:rgba(255, 255, 255, 0);"><img src="../../images/tokoTokiLogo1.png" width="50px" height="50px"></li>
                            <div style="position: fixed;width: 100%;margin-top: -20px;margin-left: 63px;">
                                <img src="../../images/hang1.png">
                            </div>

                        </ul>
                    </li>
                </ul>
                <div class="d-flex align-items-center flex-grow-1">
                    <div class="me-5 ms-5">
                        <a href="../../index.php"><img src="../../images/logo1.png" alt="logo" height="50px"></a>
                    </div>
                    <div class="flex-grow-1 me-5 ms-5">
                        <div class="d-flex" style="max-height: 35px;">
                            <input class="form-control me-2 search-input" type="search">
                            <div class="search-button">
                                <span class="material-icons-outlined">
                                    search
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="nav-button me-1">
                            <a class="" href="#">
                                <span class="material-icons-outlined">
                                    perm_identity
                                </span>
                            </a>
                        </div>
                        <div class="nav-button me-1">
                            <a class="" href="#">
                                <span class="material-icons-outlined">
                                    mail
                                </span>
                            </a>
                        </div>
                        <div class="nav-button me-1">
                            <a class="" href="#">
                                <span class="material-icons-outlined">
                                    notifications
                                </span>
                            </a>
                        </div>
                    </div>
                    <div style="width: 20%" class="row">
                        <?php if (empty($_SESSION['email'])) { ?>
                            <div class="col-6" style="border-right: 1px solid #E3E3E3;">
                                <div class="d-flex align-items-center justify-content-center">
                                    <a class="nav-link" href="../../daftar.php" style="color: #E3E3E3;">SIGN UP</a>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center justify-content-center">
                                    <a class="nav-link" href="../../login.php" style="color: #E3E3E3;">LOG IN</a>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="col-6">
                                <div class="d-flex align-items-center justify-content-center">
                                    <a class="nav-link" href="../../include/proses/logout.php" style="color: #E3E3E3;">LOG
                                        OUT</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="main-container">
        <div class="payment-status">
            Payment Status : <b>Waiting</b> for payment
        </div>

        <form action="../../include/proses/payment.php" method="POST" enctype="multipart/form-data" class="container d-flex">
            <div class="main col-7 d-flex justify-content-end">
                <input type="hidden" name="id_pembelian" value="<?= $id_pembelian ?>">
                <div class="box" id="leftbox">
                    <div class="head">Payment Confirmation</div>
                    <div class="time-limit row d-flex align-items-center">
                        <span class="col-7">Time Limit</span>
                        <div class="date col-5">
                            <span class="fa-solid fa-clock"></span>
                            <?= date('Y-m-d') ?> 23:59:59
                        </div>
                    </div>
                    <div class="proof-box">
                        <img src="../../images/<?= $data_pembelian['metode_pembayaran'] ?>.png" alt="">
                        <div class="file-uploader">
                            <div class="input-file">
                                <input type="file" name="bukti" class="form-control-file" accept="image/*" required>
                            </div>
                        </div>
                        <div class="description">
                            Please make payment via Bank <span>
                                <?= $data_pembelian['metode_pembayaran'] ?> 1234567890 (Tokotoki).
                            </span> If you have made a
                            payment,
                            upload proof of payment and press <span>Upload.</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sidebar col-5">
                <div class="box" id="rightbox">
                    <div class="title">Payment Detail</div>
                    <!-- <div class="product-price row">
                        <div class="attribute col-5">Total Price</div>
                        <div class="value col-7">Rp 80.000</div>
                    </div>

                    <div class="product-shipping row">
                        <div class="attribute col-5">Shipping</div>
                        <div class="value col-7">Rp 12.000</div>
                    </div> -->

                    <div class="total-payment row d-flex align-items-center">
                        <div class="attribute col-5">Total Payment</div>
                        <div class="value col-7">Rp
                            <?= str_replace(",", ".", number_format($data_pembelian['total_pembelian'])) ?>
                        </div>
                    </div>

                    <button class="order d-flex justify-content-center align-items-center" type="submit">
                        Upload
                    </button>
                </div>
            </div>
        </form>

        <div class="footer">
            <div class="col">
                <p style="text-align: center;margin:0">
                    Recalls | Terms of use | Privacy Policy | Interest-Based-Ads | CA Supply Chain Act | Do Not Sell
                    My
                    Personal Information
                </p>
            </div>
        </div>
    </div>

</body>

</html>