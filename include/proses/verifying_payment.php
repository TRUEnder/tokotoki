<?php 

include "../connection.php";

$id = $_GET['id_pembelian'];


$query = "UPDATE `pembelian` SET `id_status`= 7 WHERE id_pembelian = $id";
$sql = mysqli_query($conn, $query);

if($sql){
    echo "<script>alert('Verifikasi Berhasil');location.href='../../transaction/transaction.php';</script>";
}
else{
    echo "<script>alert('Verifikasi Gagal');history.back();</script>";
}

?>