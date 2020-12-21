<?php
include "../../admin/lib/koneksi.php";

$email = $_POST['email'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$id_kota = $_POST['kota'];
$no_hp = $_POST['no_hp'];

$QuerySimpan = mysqli_query($koneksi, "INSERT INTO tb_member VALUES ('','$email','$password','$nama','$alamat','$id_kota','$no_hp')");
if ($QuerySimpan) {
   
	echo "<script>
    alert ('Anda Berhasil Regis,Silahkan Login');
    document.location.href = '$baseUrl2'+'index.php';
    </script>
    ";

}else {
    echo "<script>
    alert ('Anda  Tidak Berhasil Regis');
    document.location.href = '$baseUrl2'+'register.php';
    </script>
    ";
}
?>