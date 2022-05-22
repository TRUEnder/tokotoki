<?php

include "../../include/connection.php";

$listCart = $_POST['listCart'];
$listJumlah = $_POST['listJumlah'];
$total = $_POST['total'];
$price = $_POST['price'];
$weight = $_POST['berat'];
$tarif = $_POST['tarif'];
$kota = $_POST['kota'];
$eks = $_POST['ekspedisi'];
$street = $_POST['street'];
$district = $_POST['district'];
$idp = $_SESSION['id_users'];
$alamat = $street . "," . $district . "," . $kota;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Payment Method - Tokotoki</title>
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
        <div class="container d-flex">

            <div class="main col-7 d-flex justify-content-end">
                <div class="box" id="leftbox">
                    <div class="head">Choose Payment Method</div>
                    <div id="bankTransfer" class="paymentOpt">
                        <a onclick="dropdownNav(1)">Bank Transfer (Manual Verification)
                            <span id="caret1" class="fa fa-caret-up" style="margin-left: 150px"></span>
                        </a>
                        <ul class="dropdown-menu" style="display: block">
                            <div class="desc">You need to upload proof of payment and we will verify it within 1x24
                                hours</div>
                            <li class="dropdown-items">
                                <div class="col-4"><img src="../../images/bni.png" alt=""></div>
                                <div class="option col-7">BNI</div>
                                <div class="form-check col-1">
                                    <input class="form-check-input" type="radio" onchange="setPembayaran('BNI')" name="flexRadioDefault" id="flexRadioDefault1">
                                </div>
                            </li>
                            <li class="dropdown-items">
                                <div class="col-4"><img src="../../images/bri.png" alt=""></div>
                                <div class="option col-7">BRI</div>
                                <div class="form-check col-1">
                                    <input class="form-check-input" type="radio" onchange="setPembayaran('BRI')" name="flexRadioDefault" id="flexRadioDefault2">
                                </div>
                            </li>
                            <li class="dropdown-items">
                                <div class="col-4"><img src="../../images/bca.png" alt=""></div>
                                <div class="option col-7">BCA</div>
                                <div class="form-check col-1">
                                    <input class="form-check-input" type="radio" onchange="setPembayaran('BCA')" name="flexRadioDefault" id="flexRadioDefault3">
                                </div>
                            </li>
                            <li class="dropdown-items">
                                <div class="col-4"><img src="../../images/mandiri.png" alt=""></div>
                                <div class="option col-7">Mandiri</div>
                                <div class="form-check col-1">
                                    <input class="form-check-input" type="radio" onchange="setPembayaran('Mandiri')" name="flexRadioDefault" id="flexRadioDefault4">
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div id="eMoney" class="paymentOpt">
                        <a onclick="dropdownNav(2)">e-Money (Automatic Verification)
                            <span id="caret2" class="fa fa-caret-down" style="margin-left: 164px"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <div class="desc">Payment via Virtual Account and will be verified automatically by the
                                system</div>
                            <li class="dropdown-items">
                                <div class="col-4"><img src="../../images/gopay.png" alt=""></div>
                                <div class="option col-7">gopay</div>
                                <div class="form-check col-1">
                                    <input class="form-check-input" type="radio" onchange="setPembayaran('GoPay')" name="flexRadioDefault" id="flexRadioDefault5">
                                </div>
                            </li>
                            <li class="dropdown-items">
                                <div class="col-4"><img src="../../images/shopeepay.png" alt=""></div>
                                <div class="option col-7">ShopeePay</div>
                                <div class="form-check col-1">
                                    <input class="form-check-input" type="radio" onchange="setPembayaran('Shopeepay')" name="flexRadioDefault" id="flexRadioDefault6">
                                </div>
                            </li>
                            <li class="dropdown-items">
                                <div class="col-4"><img src="../../images/ovo.png" alt=""></div>
                                <div class="option col-7">OVO</div>
                                <div class="form-check col-1">
                                    <input class="form-check-input" type="radio" onchange="setPembayaran('OVO')" name="flexRadioDefault" id="flexRadioDefault7">
                                </div>
                            </li>
                            <li class="dropdown-items">
                                <div class="col-4"><img src="../../images/dana.png" alt=""></div>
                                <div class="option col-7">Dana</div>
                                <div class="form-check col-1">
                                    <input class="form-check-input" type="radio" onchange="setPembayaran('Dana')" name="flexRadioDefault" id="flexRadioDefault8">
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div id="creditCard" class="paymentOpt">
                        <a onclick="dropdownNav(3)">Credit Card
                            <span id="caret3" class="fa fa-caret-down" style="margin-left: 376px"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <div class="desc">Payment with Credit Card and will be verified automatically by the system
                            </div>
                            <li class="dropdown-items">
                                <div class="col-4"><img src="../../images/paypal.png" alt=""></div>
                                <div class="option col-7">PayPal</div>
                                <div class="form-check col-1">
                                    <input class="form-check-input" type="radio" onchange="setPembayaran('PayPal')" name="flexRadioDefault" id="flexRadioDefault9">
                                </div>
                            </li>
                            <li class="dropdown-items">
                                <div class="col-4"><img src="../../images/midtrans.png" alt=""></div>
                                <div class="option col-7">midtrans</div>
                                <div class="form-check col-1">
                                    <input class="form-check-input" type="radio" onchange="setPembayaran('Midtrans')" name="flexRadioDefault" id="flexRadioDefault10">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <form action="../../include/proses/make_order.php" class="sidebar col-5" method="POST" id="form">
                <input type="hidden" name="metode" id="metode">
                <input type="hidden" name="total" value="<?= $total ?>">
                <input type="hidden" name="kota" value="<?= $kota ?>">
                <input type="hidden" name="tarif" value="<?= $tarif ?>">
                <input type="hidden" name="berat" value="<?= $weight ?>">
                <input type="hidden" name="street" value="<?= $street ?>">
                <input type="hidden" name="district" value="<?= $district ?>">
                <input type="hidden" id="listCart" name="listCart" value="<?= $listCart ?>">
                <input type="hidden" id="listJumlah" name="listJumlah" value="<?= $listJumlah ?>">
                <input type="hidden" name="ekspedisi" value="<?= $eks ?>">
                <div class="box" id="rightbox">
                    <div class="title">Payment Detail</div>
                    <div class="product-shipping row">
                        <div class="attribute col-5">Total Price</div>
                        <div class="value col-7">Rp
                            <?= str_replace(",", ".", number_format((int)$price)) ?>
                        </div>
                    </div>
                    <div class="product-price row">
                        <div class="attribute col-5">Shipping</div>
                        <div class="value col-7">Rp
                            <?= str_replace(",", ".", number_format($tarif)) ?>
                        </div>
                    </div>
                    <div class="product-price row">
                        <div class="attribute col-5">Weight (kg)</div>
                        <div class="value col-7">
                            <?= $weight ?>
                        </div>
                    </div>
                    <div class="product-shipping row">
                        <div class="attribute col-5">Total Shipment</div>
                        <div class="value col-7">Rp
                            <?= str_replace(",", ".", number_format($tarif * $weight)) ?>
                        </div>
                    </div>

                    <div class="total-payment row d-flex align-items-center">
                        <div class="attribute col-5">Total Payment</div>
                        <div class="value col-7">Rp
                            <?= str_replace(",", ".", number_format($total)) ?>
                        </div>
                    </div>


                    <button type="button" class="order d-flex justify-content-center align-items-center" onclick="checkPembayaran()">
                        Pay Now
                    </button>

                </div>
            </form>
            <!-- <div class="sidebar col-5">
                <div class="box" id="rightbox">
                    <div class="title">Payment Detail</div>
                    <div class="product-price row">
                        <div class="attribute col-5">Total Price</div>
                        <div class="value col-7">Rp 80.000</div>
                    </div>

                    <div class="product-shipping row">
                        <div class="attribute col-5">Shipping</div>
                        <div class="value col-7">Rp 12.000</div>
                    </div>

                    <div class="total-payment row d-flex align-items-center">
                        <div class="attribute col-5">Total Payment</div>
                        <div class="value col-7">Rp 92.000</div>
                    </div>

                    <div class="order d-flex justify-content-center align-items-center"
                        onclick="location.href='../../transactionPayment/paymentConfirmation/paymentConfirmationManual.php'">
                        Pay Now
                    </div>
                </div>
            </div> -->
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

    <script>
        function dropdownNav(index) {
            var dropdownShow;
            var dropdownMenu = document.getElementsByClassName("dropdown-menu");
            var display = dropdownMenu[index].style.display;
            var caret = document.getElementById("caret" + index);

            if (display == 'none' | display == '') {
                dropdownMenu[index].style.display = 'block';
                caret.className = "fa fa-caret-up";
            } else {
                dropdownMenu[index].style.display = 'none';
                caret.className = "fa fa-caret-down";
            }
            console.log(dropdownMenu[index].style.display);
        }

        function setPembayaran(name) {
            document.getElementById("metode").value = name;
        }

        function checkPembayaran() {
            var metode = document.getElementById("metode").value;
            if (metode == "") {
                alert("Pilih Metode Pembayaran Terlebih Dahulu!");
            } else {
                document.getElementById("form").submit();
            }
        }
    </script>
</body>

</html>