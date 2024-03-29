<?php

include "../../include/connection.php";
$id = $_GET["id"];
$animal = $_GET['animal'];
$query = "SELECT * FROM product_type";
$sql = mysqli_query($conn, $query);

$query2 = "SELECT * FROM product WHERE productID = $id";
$sql2 = mysqli_query($conn, $query2);
$data2 = mysqli_fetch_array($sql2);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../images/tokoTokiLogo1.png">
    <link rel="stylesheet" href="addProduct/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
    <title>Add Product
        <?= $animal ?> - Tokotoki
    </title>
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
                            <li><a class="dropdown-item" href="../editCatalog.php">EDIT CATALOG</a></li>
                            <li><a class="dropdown-item" href="../../shipment/shipment.php">SHIPMENT</a></li>
                            <li><a class="dropdown-item" href="../../visitHistory/visitHistory.php">VISIT HISTORY</a>
                            </li>
                            <li><a class="dropdown-item" href="../../transaction/transaction.php">TRANSACTION</a></li>
                            <li style="background-color:rgba(255, 255, 255, 0);"><img src="../../images/tokoTokiLogo1.png" width="50px" height="50px"></li>
                            <div style="position: fixed;width: 100%;margin-top: -20px;margin-left: 63px;">
                                <img src="../../images/hang1.png">
                            </div>

                        </ul>
                    </li>
                </ul>
                <div class="d-flex align-items-center flex-grow-1">
                    <div class="me-5 ms-5">
                        <a href="../../index.php"><img src="../../images/logo1.png" alt="logo" height="50px"></a><img src="../../images/logo1.png" alt="logo" height="50px">
                    </div>
                    <div class="flex-grow-1 me-5 ms-5"></div>
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
        <div class="nav-bar">
            <div class="pet-type">
                <img src="../../images/<?= $animal ?> circle.png" alt="">
                <img src="../../images/<?= $animal ?> teks.png" alt="">
            </div>
        </div>

        <div class="main">
            <div class="property-name">
                <ul>
                    <li>PRODUCT NAME</li>
                    <li>PRICE</li>
                    <li>STOCK</li>
                    <li>UNIT</li>
                    <li>WEIGHT (kg)</li>
                    <li>PET TYPE</li>
                    <li>PRODUCT TYPE</li>
                    <li>DESCRIPTION</li>
                    <li>IMAGE</li>
                </ul>
            </div>
            <form action="edit.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data2['productID']; ?>">
                <div><input type="text" name="name" class="form-control" placeholder="Product name" value="<?= $data2['productName'] ?>"></div>
                <div><input type="number" name="price" class="form-control" placeholder="Price" value="<?= $data2['price'] ?>"></div>
                <div><input type="number" name="stock" class="form-control" placeholder="Stock" value="<?= $data2['stock'] ?>"></div>
                <div><input type="text" name="unit" class="form-control" placeholder="Unit" value="<?= $data2['unit'] ?>"></div>
                <div><input type="number" name="weight" class="form-control" placeholder="Weight" value="<?= $data2['weight'] ?>"></div>
                <div><input type="text" name="type" class="form-control" placeholder="Animal Type" value="<?= $data2['animalType'] ?>" readonly></div>
                <div>
                    <select name="category" class="form-control">
                        <?php while ($data = mysqli_fetch_array($sql)) { ?>
                            <option value="<?= $data['typeName'] ?>" <?= $data2['prodType'] == $data['typeName'] ? 'selected'
                                                                            : '' ?>>
                                <?= $data['typeName'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div><input type="text" name="desc" class="form-control" placeholder="Description" value="<?= $data2['description'] ?>"></div>
                <div><input type="file" name="image" class="form-control-file" accept="image/png, image/jpg, image/jpeg"></div>

                <div class="submit-button">
                    <button type="submit" class="btn btn-warning d-flex align-items-center justify-content-md-around">
                        <img src="../../images/icons8-plus.png" style="width: 20px; height: 20px;" /> ADD
                    </button>
                </div>
            </form>
        </div>

        <div class="footer">
            <div class="col">
                <p style="text-align: center;margin:0">
                    Recalls | Terms of use | Privacy Policy | Interest-Based-Ads | CA Supply Chain Act | Do Not Sell My
                    Personal Information
                </p>
            </div>
        </div>
    </div>
</body>

</html>