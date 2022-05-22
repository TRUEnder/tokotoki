<?php 

include "../connection.php";

$id = $_POST['id_pembelian'];
$date = date('Y-m-d');
$tmpFile = $_FILES['bukti']['tmp_name'];
$fileName = uniqid().'.jpg';
$newFile = '../../images/bukti/' . $fileName;
$result = move_uploaded_file($tmpFile, $newFile);

$fileName = base64_encode($fileName);

$query = "UPDATE `pembelian` SET `id_status`= 6,`bukti_transfer`='$fileName',`tanggal_pembayaran`='$date' WHERE id_pembelian = $id";
$sql = mysqli_query($conn, $query);

if($sql){
    echo "<script>
    alert('Pembayaran Berhasil');
    location.href='../../transactionPayment/transaction.php';
    </script>"; 
}
else{
    echo "<script>
    alert('Pembayaran Gagal');
    history.back();
    </script>";
}

?>