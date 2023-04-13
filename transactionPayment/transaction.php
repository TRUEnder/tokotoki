<?php

include "../include/connection.php";
if (empty($_SESSION['id_users'])) {
    echo "<script>location.href='../login.php'</script>";
}
$id = $_SESSION['id_users'];
$query = "SELECT * FROM `pembelian` WHERE id_pelanggan = $id";
$sql = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction and Payment - Tokotoki</title>
    <link rel="icon" href="../images/tokoTokiLogo1.png">
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
                            <li><a class="dropdown-item" href="../aboutUs/aboutUs.php">ABOUT US</a></li>
                            <li><a class="dropdown-item" href="../productCatalog/productCatalog.php">OUR
                                    PRODUCTS</a>
                            </li>
                            <li><a class="dropdown-item" href="">TRANSACTION</a></li>
                            <li><a class="dropdown-item" href="../orderHistory/orders.php">ORDER HISTORY</a></li>
                            <li><a class="dropdown-item" href="https://drive.google.com/file/d/1v-t_LLCzYGEVRAuKNjngG3G3Fr6LXqp0/view">HOW TO USE</a></li>
                            <li style="background-color:rgba(255, 255, 255, 0);"><img src="../images/tokoTokiLogo1.png" width="50px" height="50px"></li>
                            <div style="position: fixed;width: 100%;margin-top: -20px;margin-left: 63px;">
                                <img src="../images/hang1.png">
                            </div>

                        </ul>
                    </li>
                </ul>
                <div class="d-flex align-items-center flex-grow-1">
                    <div class="me-5 ms-5">
                        <a href="../index.php"><img src="../images/logo1.png" alt="logo" height="50px"></a>
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
                                    <a class="nav-link" href="../daftar.php" style="color: #E3E3E3;">SIGN UP</a>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center justify-content-center">
                                    <a class="nav-link" href="../login.php" style="color: #E3E3E3;">LOG IN</a>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="col-6">
                                <div class="d-flex align-items-center justify-content-center">
                                    <a class="nav-link" href="../include/proses/logout.php" style="color: #E3E3E3;">LOG
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
            <img src="../images/transaction and payment.png" alt="">
            <div class="table-container">
                <table class="table border-secondary">
                    <thead>
                        <tr>
                            <th scope="col" id="short">NO</th>
                            <th scope="col">CODE</th>
                            <th scope="col" class="status-head">STATUS</th>
                            <th scope="col">DATE</th>
                            <th scope="col">METHOD</th>
                            <th scope="col" id="short">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        while ($data = mysqli_fetch_array($sql)) { ?>
                            <?php if ($data['id_status'] == 2 || $data['id_status'] == 3 || $data['id_status'] == 4) { ?>
                                <tr>
                                    <th scope="row" id="short">
                                        <?= $i++ ?>
                                    </th>
                                    <td class="code">
                                        <?= $data['id_pembelian'] ?>
                                    </td>
                                    <td id="verificated" class="status"><span>Verificated</span></td>
                                    <td>
                                        <?= $data['tanggal_pembelian'] ?>
                                    </td>
                                    <td>
                                        <?= $data['metode_pembayaran'] ?>
                                    </td>
                                    <td id="short"></td>
                                </tr>
                            <?php } else if ($data['id_status'] == 6) { ?>
                                <tr>
                                    <th scope="row" id="short">
                                        <?= $i++ ?>
                                    </th>
                                    <td class="code">
                                        <?= $data['id_pembelian'] ?>
                                    </td>
                                    <td id="wait-verification" class="status"><span>Awaiting Verification</span></td>
                                    <td>
                                        <?= $data['tanggal_pembelian'] ?>
                                    </td>
                                    <td>
                                        <?= $data['metode_pembayaran'] ?>
                                    </td>
                                    <td id="short"></td>
                                </tr>
                            <?php } else if ($data['id_status'] == 5) { ?>
                                <tr>
                                    <th scope="row" id="short">
                                        <?= $i++ ?>
                                    </th>
                                    <td class="code">
                                        <?= $data['id_pembelian'] ?>
                                    </td>
                                    <td id="denied-verification" class="status"><span>Verification Denied</span></td>
                                    <td>
                                        <?= $data['tanggal_pembelian'] ?>
                                    </td>
                                    <td>
                                        <?= $data['metode_pembayaran'] ?>
                                    </td>
                                    <td id="short"></td>
                                </tr>
                            <?php } else if ($data['id_status'] == 1) { ?>
                                <tr>
                                    <th scope="row" id="short">
                                        <?= $i++ ?>
                                    </th>
                                    <td class="code">
                                        <?= $data['id_pembelian'] ?>
                                    </td>
                                    <td id="wait-payment" class="status"><span>Awaiting Payment</span></td>
                                    <td>
                                        <?= $data['tanggal_pembelian'] ?>
                                    </td>
                                    <td>
                                        <?= $data['metode_pembayaran'] ?>
                                    </td>
                                    <td id="short">
                                        <a href="../transactionPayment/paymentConfirmation/paymentConfirmationManual.php?id_pembelian=<?= $data['id_pembelian'] ?>"><span class="fa fa-search"></span></a>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                        <!-- <tr>
                            <th scope="row" id="short">1</th>
                            <td class="code">TR2022040421</td>
                            <td id="verificated" class="status"><span>Verificated</span></td>
                            <td>23-02-2022</td>
                            <td>Manual</td>
                            <td id="short"></td>
                        </tr>
                        <tr>
                            <th scope="row" id="short">2</th>
                            <td class="code">TR2022040421</td>
                            <td id="wait-verification" class="status"><span>Awaiting Verification</span></td>
                            <td>23-02-2022</td>
                            <td>Manual</td>
                            <td id="short"></td>
                        </tr>
                        <tr>
                            <th scope="row" id="short">3</th>
                            <td class="code">TR2022040421</td>
                            <td id="denied-verification" class="status"><span>Verification Denied</span></td>
                            <td>23-02-2022</td>
                            <td>Manual</td>
                            <td id="short"></td>
                        </tr>
                        <tr>
                            <th scope="row" id="short">4</th>
                            <td class="code">TR2022040421</td>
                            <td id="wait-payment" class="status"><span>Awaiting Payment</span></td>
                            <td>23-02-2022</td>
                            <td>Manual</td>
                            <td id="short">
                                <a href="../transactionPayment/paymentConfirmation/paymentConfirmationManual.php"><span
                                        class="fa fa-search"></span></a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" id="short">5</th>
                            <td class="code">TR2022040421</td>
                            <td id="paid" class="status"><span>Paid</span></td>
                            <td>23-02-2022</td>
                            <td>e-money</td>
                            <td id="short"></td>
                        </tr>
                        <tr>
                            <th scope="row" id="short">6</th>
                            <td class="code">TR2022040421</td>
                            <td id="wait-payment" class="status"><span>Awaiting Payment</span></td>
                            <td>23-02-2022</td>
                            <td>e-money</td>
                            <td id="short">
                                <a href="../transactionPayment/paymentConfirmation/paymentConfirmationEmoney.php"><span
                                        class="fa fa-search"></span></a>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>

            <div class="back">
                <div class="back-button" onclick="location.href='../orderHistory/orders.php'">SEE STATUS ORDER</div>
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