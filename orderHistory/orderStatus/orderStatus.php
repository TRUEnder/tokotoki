<?php

include "../../include/connection.php";

$id = $_GET['id_pembelian'];

$query = "SELECT * FROM pembelian WHERE id_pembelian = $id";
$sql = mysqli_query($conn, $query);

$data = mysqli_fetch_array($sql);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Status - Tokotoki</title>
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
                            <li><a class="dropdown-item" href="../../transactionPayment/transaction.php">TRACK MY
                                    ORDER</a></li>
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
        <div class="container">
            <img src="../../images/order-status.png" class="head">
            <div class="box">
                <div class="code">CODE :
                    <?= $data['id_pembelian'] ?>
                </div>
                <div class="timeline d-flex justify-content-center align-items-center">
                    <div class="<?= $data['id_status'] == 6 ? 'circle-checked' : 'circle' ?>" id="order-placed">
                        <img src="../../images/order-placed.png" alt="">
                    </div>
                    <div class="line"></div>
                    <div class="<?= $data['id_status'] == 7 ? 'circle-checked' : 'circle' ?>" id="payment-confirmed">
                        <img src="../../images/payment-verified.png" alt="">
                    </div>
                    <div class="line"></div>
                    <div class="<?= $data['id_status'] == 3 ? 'circle-checked' : 'circle' ?>" id="order-sent">
                        <img src="../../images/order-sent.png" alt="">
                    </div>
                    <div class="line"></div>
                    <div class="<?= $data['id_status'] == 4 ? 'circle-checked' : 'circle' ?>" id="accepted">
                        <img src="../../images/delivered.png" alt="">
                    </div>
                </div>
                <div class="stages d-flex justify-content-center align-items-center">
                    <div class="stage">
                        <div class="stage-name">Order Placed</div>
                        <div class="stage-date">
                            <?= $data['tanggal_pembelian'] != "0000-00-00" ? $data['tanggal_pembelian'] : '-' ?>
                        </div>
                    </div>
                    <div class="stage">
                        <div class="stage-name">Payment Confirmed</div>
                        <div class="stage-date">
                            <?= $data['tanggal_pembayaran'] != "0000-00-00" ? $data['tanggal_pembayaran'] : '-' ?>
                        </div>
                    </div>
                    <div class="stage">
                        <div class="stage-name">Order Sent</div>
                        <div class="stage-date">
                            <?= $data['tanggal_pengiriman'] != "0000-00-00" ? $data['tanggal_pengiriman'] : '-' ?>
                        </div>
                    </div>
                    <div class="stage">
                        <div class="stage-name">Accepted</div>
                        <div class="stage-date">
                            <?= $data['tanggal_selesai'] != "0000-00-00" ? $data['tanggal_selesai'] : '-' ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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