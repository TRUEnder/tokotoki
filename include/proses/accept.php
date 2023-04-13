<?php 

include "../connection.php";

$id = $_GET['id_pembelian'];

$date = date("Y-m-d");
$query = "UPDATE `pembelian` SET `id_status`= 4, `tanggal_selesai` = '$date' WHERE id_pembelian = $id";
$sql = mysqli_query($conn, $query);

if($sql){
    echo "<script>location.href='../../orderHistory/orders.php';</script>";
}
else{
    echo "<script>history.back();</script>";
}

?>