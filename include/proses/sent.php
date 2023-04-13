<?php 

include "../connection.php";

$id = $_GET['id_pembelian'];

$date = date("Y-m-d");
$query = "UPDATE `pembelian` SET `id_status`= 3, `tanggal_pengiriman` = '$date' WHERE id_pembelian = $id";
$sql = mysqli_query($conn, $query);

if($sql){
    echo "<script>alert('Produk Berhasil Dikirim');location.href='../../shipment/shipment.php';</script>";
}
else{
    echo "<script>alert('Produk Gagal Dikirim');history.back();</script>";
}

?>