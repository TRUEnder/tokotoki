<?php 

include "../connection.php";
$listCart = $_POST['listCart'];
$listJumlah = $_POST['listJumlah'];
$total = $_POST['total'];
$kota = $_POST['kota'];
$metode = $_POST['metode'];
$eks = $_POST['ekspedisi'];
$street = $_POST['street'];
$district = $_POST['district'];
$idp = $_SESSION['id_users'];
$alamat = $street.",".$district.",".$kota;
$date = date('Y-m-d');

$query = "SELECT * FROM ekspedisi WHERE nama_ekspedisi = '$eks'";
$sql = mysqli_query($conn, $query);
$ekspedisi = mysqli_fetch_array($sql);
$ide = $ekspedisi['id_ekspedisi'];

$query = "INSERT INTO `pembelian`(`id_pelanggan`, `id_status`, `tanggal_pembelian`, `total_pembelian`, `id_ekspedisi`, `alamat_pengiriman`, `metode_pembayaran`, `bukti_transfer`, `tanggal_pembayaran`, `tanggal_pengiriman`, `tanggal_selesai`) VALUES ('$idp',1,'$date',$total,$ide,'$alamat','$metode','','','','')";
$sql = mysqli_query($conn, $query);

if($sql){
    $query = "SELECT * FROM `pembelian` ORDER BY id_pembelian DESC LIMIT 1";
    $sql = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($sql);
    $id_pembelian = $data['id_pembelian'];

    $listCart = explode(",",$listCart);
    $listJumlah = explode(",",$listJumlah);

    for($i = 0; $i < count($listCart); $i++){
        $query = "SELECT * FROM `cart` WHERE id_cart = $listCart[$i]";
        $sql = mysqli_query($conn, $query);
        $produk = mysqli_fetch_array($sql);
        $id_produk = $produk['productID'];

        $query = "INSERT INTO `pembelian_produk`(`id_pembelian`, `id_produk`, `jumlah`) VALUES ($id_pembelian,$id_produk,$listJumlah[$i])";
        $sql = mysqli_query($conn, $query);
    }

    $delete = "DELETE FROM `cart` WHERE id_cart IN(".join(',',$listCart).")";
    $sql_del = mysqli_query($conn, $delete);
    echo "<script>
    location.href='../../transactionPayment/paymentConfirmation/paymentConfirmationManual.php?id_pembelian=$id_pembelian';
    </script>"; 
}
else{
    echo "<script>
    alert('Order Gagal');
    location.href='../../myCart/myCart.php';
    </script>";
}

?>