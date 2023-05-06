<?php
session_start();
// koneksi ke database

$conn = mysqli_connect("localhost","root","","arkatama_store");

// Add Categories

if(isset($_POST['add-categories'])){
    $namabarang = $_POST['namabarang'];
    $tanggal = date("Y-m-d H:i:s");

    $addtotable = mysqli_query($conn,"insert into categories(name,created_at,updated_at) values ('$namabarang','$tanggal','$tanggal')");

    if($addtotable){
        // echo '<script type="text/javascript">
        // alert ('data berhasil diinput');
        // </script>';

        header('location:categories.php');
    }else{
        echo "Gagal";
        header('location:categories.php');
    }
}
 
// Add Products
if(isset($_POST['add-products'])){
    $categoryId = $_POST['categoryId'];
    $nameproduct = $_POST['nameproduct'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $createdby = $_POST['createdBy'];
    $verifiedby = $_POST['verifiedBy'];
    $tanggal = date("Y-m-d H:i:s");

    $addproduct = mysqli_query($conn,"insert into products (category_id,name,description,price,status,created_at,updated_at,created_by,verified_at,verified_by) values ('$categoryId','$nameproduct','$description','$price','$status','$tanggal','$tanggal','$createdby','$tanggal','$verifiedby')");

    if($addproduct){
        // echo '<script type="text/javascript">
        // alert ('data berhasil diinput');
        // </script>';

        header('location:products.php');
    }else{
        echo "Gagal";
        header('location:products.php');
    }
}
?>