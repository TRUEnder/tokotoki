<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="../images/tokoTokiLogo1.png">
  <link rel="stylesheet" href="style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet" />
  <title>Edit Catalog - Tokotoki</title>
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
              <li><a class="dropdown-item" href="">EDIT CATALOG</a></li>
              <li><a class="dropdown-item" href="../shipment/shipment.php">ORDERS</a></li>
              <li><a class="dropdown-item" href="../visitHistory/visitHistory.php">VISIT HISTORY</a></li>
              <li><a class="dropdown-item" href="../transaction/transaction.php">TRANSACTION</a></li>
              <li style="background-color: rgba(255, 255, 255, 0)"><img src="../images/tokoTokiLogo1.png" width="50px" height="50px" /></li>
              <div style="position: fixed; width: 100%; margin-top: -20px; margin-left: 63px">
                <img src="../images/hang1.png" />
              </div>
            </ul>
          </li>
        </ul>
        <div class="d-flex align-items-center flex-grow-1">
          <div class="me-5 ms-5">
            <a href="../index.php"><img src="../images/logo1.png" alt="logo" height="50px"></a>
          </div>
          <div class="flex-grow-1 me-5 ms-5"></div>
          <div class="d-flex">
            <div class="nav-button me-1">
              <a class="" href="#">
                <span class="material-icons-outlined"> perm_identity </span>
              </a>
            </div>
            <div class="nav-button me-1">
              <a class="" href="#">
                <span class="material-icons-outlined"> mail </span>
              </a>
            </div>
            <div class="nav-button me-1">
              <a class="" href="#">
                <span class="material-icons-outlined"> notifications </span>
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
    <div class="nav-bar d-flex">
      <div class="text">
        <img src="../images/type.png" style="width: 150px; height: 58px" />
      </div>

      <div class="line"></div>

      <div class="edit">
        <a class="edit-link" href="#" id="editDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="../images/pensil.png" />
        </a>
        <ul class="edit-menu dropdown-menu" aria-labelledby="editDropdown">
          <li><a class="dropdown-item" href="editcatalog/addProduct/addProduct.php">ADD PRODUCT</a></li>
          <li><a class="dropdown-item" href="editcatalog/addProductType/addProductType.php">ADD PRODUCT TYPE</a></li>
          <li><a class="dropdown-item" href="editcatalog/editProductType/editProductType.php">EDIT PRODUCT TYPE</a></li>
        </ul>
      </div>
    </div>

    <div class="slideshow-container">
      <div class="nav-btn">
        <button class="prev" onclick="plusSlides(-1)">
          <img src="../images/icons8-back-64.png" style="width: 50px; height: 60px" />
        </button>
      </div>

      <div class="slides">
        <div class="slide">
          <a href="editCatalog/editCatalog.php?animal=Cat"><img class="type-pet" src="../images/kucing kotak.png" /></a>
          <div class="edit-btn d-flex justify-content-center align-items-center" onclick="location.href='#'" style="cursor: pointer">
            <img src="../images/icons8-edit-64.png" style="width: 30px; height: 30px" />
            EDIT
          </div>
          <div class="delete-btn d-flex justify-content-center align-items-center" onclick="location.href='#'" style="cursor: pointer">
            <img src="../images/icons8-delete-64.png" style="width: 30px; height: 30px" />
            DELETE
          </div>
        </div>
        <div class="slide">
          <a href="editCatalog/editCatalog.php?animal=Dog">
            <img class="type-pet" src="../images/anjeng kotak.png" alt="" />
          </a>
          <div class="edit-btn d-flex justify-content-center align-items-center" onclick="location.href='#'" style="cursor: pointer">
            <img src="../images/icons8-edit-64.png" style="width: 26px; height: 26px" />
            EDIT
          </div>
          <div class="delete-btn d-flex justify-content-center align-items-center" onclick="location.href='#'" style="cursor: pointer">
            <img src="../images/icons8-delete-64.png" style="width: 26px; height: 26px" />
            DELETE
          </div>
        </div>
        <div class="slide">
          <a href="editCatalog/editCatalog.php?animal=Rabbit">
            <img class="type-pet" src="../images/kelinci kotak.png" alt="" />
          </a>
          <div class="edit-btn d-flex justify-content-center align-items-center" onclick="location.href='#'" style="cursor: pointer">
            <img src="../images/icons8-edit-64.png" style="width: 30px; height: 30px" />
            EDIT
          </div>
          <div class="delete-btn d-flex justify-content-center align-items-center" onclick="location.href='#'" style="cursor: pointer">
            <img src="../images/icons8-delete-64.png" style="width: 30px; height: 30px" />
            DELETE
          </div>
        </div>
        <div class="slide">
          <a href="editCatalog/editCatalog.php?animal=Fish">
            <img class="type-pet" src="../images/fish kotak.png" alt="" />
          </a>
          <div class="edit-btn d-flex justify-content-center align-items-center" onclick="location.href='#'" style="cursor: pointer">
            <img src="../images/icons8-edit-64.png" style="width: 30px; height: 30px" />
            EDIT
          </div>
          <div class="delete-btn d-flex justify-content-center align-items-center" onclick="location.href='#'" style="cursor: pointer">
            <img src="../images/icons8-delete-64.png" style="width: 30px; height: 30px" />
            DELETE
          </div>
        </div>
        <!-- <div class="slide">BLANK</div>
          <div class="slide">BLANK</div>
          <div class="slide">BLANK</div> -->
      </div>

      <div class="nav-btn">
        <button class="next" onclick="plusSlides(1)">
          <img src="../images/icons8-forward-64.png" style="width: 50px; height: 60px" />
        </button>
      </div>
    </div>

    <div class="back-button d-flex align-items-center justify-content-center" onClick="location.href='../index.php'">
      <img src="../images/icons8-exit-64.png" style="width: 20px; height: 20px; margin-right: 9px;" />
      BACK
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

  <script src="slider.js"></script>
</body>

</html>