<?php 
include "../../lib/koneksi.php";

$id = $_POST['id'];
$status_pembayaran = $_POST['status_pembayaran'];

$queryEdit = mysqli_query($koneksi, "UPDATE tb_transaksi SET status_pembayaran = '$status_pembayaran' WHERE id_transaksi='$id'");
if ($queryEdit) {

	echo "<script>
    alert ('Data Berhasil diubah');
    document.location.href = 'main.php';
    </script>
";
} else {
    echo "<script>
    alert ('Data Tidak Berhasil diubah');
    document.location.href = 'edit.php';
    </script>

";
}
?>