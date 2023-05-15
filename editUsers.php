<?php
require "function.php";
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Arkatama Store</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link
      href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"
      rel="stylesheet"
      crossorigin="anonymous"
    />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body class="sb-nav-fixed">
  <div class="container mt-5">
    <h1>Tambah Users</h1>
    <hr>

    <form action="" method="post" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="name" class="form-label">Nama User</label>
            <input type="text" class="form-control" placeholder="Masukkan Nama User" name="namauser" id="name" required>
        </div>

        <div class="row">
            <div class="mb-3 col-6">
                <label for="role" class="form-label">Role</label>
                <select name="role" id="role" class="form-control">
                    <option value="">-- Pilih Role --</option>
                    <option value="admin">admin</option>
                    <option value="staff">staff</option>
                </select>
            </div>

            <div class="mb-3 col-6">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" placeholder="Password..." name="passworduser" id="password" required>
        </div>
        </div>

        <div class="row">
        <div class="mb-3 col-6">
            <label for="email" class="form-label">Email User</label>
            <input type="text" class="form-control" placeholder="Email..." name="emailuser" id="email" required>
        </div>

        <div class="mb-3 col-6">
            <label for="phone" class="form-label">Phone User</label>
            <input type="number" class="form-control" placeholder="Phone..." name="phoneuser" id="phone" required>
        </div>

        </div>

        <div class="mb-3 form-group">
            <label for="address" class="form-label">Alamat User</label>
            <br>
            <textarea name="alamatusers" id="address" class="form-control" rows="3"></textarea>
        </div>

         <div class="form-group mb-3">
            <label for="avatar">Add Avatar</label>
            <input type="file" class="form-control-file" name="avatar" id="avatar">
          </div>

        <button type="submit" name="addUsers" class="btn btn-primary" style="float: right;">Add User</button>     
    </form>
    <a href="users.php" class="btn btn-danger" role="button">Close</a>
</div>
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="js/scripts.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script
      src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="assets/demo/datatables-demo.js"></script>
  </body>
  </div>
</html>
