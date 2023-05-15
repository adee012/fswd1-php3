<?php
require 'function.php';

$id = $_GET['id'];
$sql = "delete from users where id=$id";
$deleteUsers = mysqli_query($conn,$sql);
if ($deleteUsers) {
    header("Location:users.php?hapus=berhasil");
}
else {
    header("Location:users.php?hapus=gagal");

}
// echo'<script>alert("Data berhasil Dihapus");</script>';
?>