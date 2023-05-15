<?php
session_start();
// koneksi ke database

$conn = mysqli_connect("localhost", "root", "", "arkatama_store");

// Add Categories
if (isset($_POST['add-categories'])) {
    $namabarang = $_POST['namabarang'];

    $addtotable = mysqli_query($conn, "insert into categories(name) values ('$namabarang')");

    if ($addtotable) {
        header('location:categories.php');
    } else {
        echo "Gagal";
        header('location:categories.php');
    }
}

// Add Products
if (isset($_POST['add-products'])) {
    $categoryId = $_POST['categoryId'];
    $nameproduct = $_POST['nameproduct'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $createdby = $_POST['createdBy'];
    $verifiedby = $_POST['verifiedBy'];

    $addproduct = mysqli_query($conn, "insert into products (category_id,name,description,price,status,created_by,verified_at,verified_by) values ('$categoryId','$nameproduct','$description','$price','$status','$createdby','$verifiedby')");

    if ($addproduct) {
        header('location:products.php');
    } else {
        echo "Gagal";
        header('location:products.php');
    }
}

// Add Users
if (isset($_POST['addUsers'])) {
    $nameuser = $_POST['namauser'];
    $emailuser = $_POST['emailuser'];
    $role = $_POST['role'];
    $phone = $_POST['phoneuser'];
    $address = trim($_POST['alamatusers']);
    $password = $_POST['passworduser'];
    $avatar = addImage();
    $tanggal = date("Y-m-d H:i:s");

    $addNewUsers = mysqli_query($conn, "insert into users (email,name,role,avatar,phone,address,password,created_at,updated_at) values ('$emailuser','$nameuser','$role','$avatar','$phone','$address','$password','$tanggal','$tanggal')");
}

// function add image new start
function addImage()
{
    $namefile = $_FILES['avatar']['name'];
    $ukuran = $_FILES['avatar']['size'];
    $error = $_FILES['avatar']['error'];
    $tmpName = $_FILES['avatar']['tmp_name'];

    // check file yang diupload
    $extensiFileValid = ['jpg', 'jpeg', 'png'];
    $extensiFile = explode('.', $namefile);
    $extensiFile = strtolower(end($extensiFile));

    if (!in_array($extensiFile, $extensiFileValid)) {
        // gagal
        echo '<script>
         alert ("format file tidak sesuai");
         document.location.href="users.php";
        </script>';

        die();
    }

    // check ukuran foto
    if ($ukuran > 2048000) {
        // gagal
        echo '<script>
         alert ("Ukuran File Max 2 MB");
         document.location.href="addUsers.php";
        </script>';

        die();
    } else {
        echo '<script>
        alert ("Data Berhasil Ditambah");
        document.location.href="addUsers.php";
       </script>';
    }

    // generate nama file baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensiFile;

    // pindahkan ke local
    move_uploaded_file($tmpName, 'assets/avatars/' . $namaFileBaru);
    return $namaFileBaru;
}
// function add image new start



// function edit image new end
function editImage()
{
    $namefile = $_FILES['avatar']['name'];
    $ukuran = $_FILES['avatar']['size'];
    $error = $_FILES['avatar']['error'];
    $tmpName = $_FILES['avatar']['tmp_name'];

    // check file yang diupload
    $extensiFileValid = ['jpg', 'jpeg', 'png'];
    $extensiFile = explode('.', $namefile);
    $extensiFile = strtolower(end($extensiFile));

    if (!in_array($extensiFile, $extensiFileValid)) {
        // gagal
        echo '<script>
         alert ("format file tidak sesuai");
         document.location.href="users.php";
        </script>';

        die();
    }

    // check ukuran foto
    if ($ukuran > 2048000) {
        // gagal
        echo '<script>
         alert ("Ukuran File Max 2 MB");
         document.location.href="users.php";
        </script>';

        die();
    } else {
        echo '<script>
         alert ("Data Berhasil Di Update");
         document.location.href="users.php";
        </script>';
    }

    // generate nama file baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensiFile;

    // pindahkan ke local
    move_uploaded_file($tmpName, 'assets/avatars/' . $namaFileBaru);
    return $namaFileBaru;
}
// function edit image new end


// Edit User Start
if (isset($_POST['editUsers'])) {
    $id = $_POST['id'];
    $nameuser = $_POST['editnamauser'];
    $emailuser = $_POST['editemailuser'];
    $role = $_POST['editrole'];
    $phone = $_POST['editphoneuser'];
    $address = trim($_POST['editalamatusers']);
    $password = $_POST['editpassworduser'];
    $avatar = editImage();

    mysqli_query($conn, "update users set email='" . $emailuser . "',name='" . $nameuser . "',role='" . $role . "',avatar='" . $avatar . "',phone='" . $phone . "',address='" . $address . "',password='" . $password . "' where id='" . $id . "'");
}
// Edit User End
