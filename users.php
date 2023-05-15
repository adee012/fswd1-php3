<?php
require "function.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Arkatama Store</title>
  <link href="css/styles.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Arkatama Store</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar-->
    <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0 ">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Users</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="login.html">Logout</a>
        </div>
      </li>
    </ul>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">Main Menu</div>
            <a class="nav-link" href="index.php">
              <div class="sb-nav-link-icon">
                <i class="fas fa-clipboard-list"></i>
              </div>
              Dashboard
            </a>
            <a class="nav-link" href="products.php">
              <div class="sb-nav-link-icon">
                <i class="fas fa-boxes"></i>
              </div>
              Products
            </a>
            <a class="nav-link" href="categories.php">
              <div class="sb-nav-link-icon">
                <i class="fas fa-box"></i>
              </div>
              Categories
            </a>

            <div class="sb-sidenav-menu-heading">Menu Admin</div>
            <a class="nav-link" href="users.php">
              <div class="sb-nav-link-icon">
                <i class="fas fa-users"></i>
              </div>
              Users
            </a>

          </div>
        </div>
        <div class="sb-sidenav-footer text-center">
          <div class="small">adedwiputra16@gmail.com</div>
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid">
          <h1 class="mt-4">Users</h1>
          <div class="card mb-4">
            <div class="card-header">
              <!-- Button to Open the Modal -->
              <a href="addUsers.php"><button type="button" class="btn btn-primary">
                  Add Users
                </button></a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Action</th>
                      <th>Email</th>
                      <th>Name</th>
                      <th>Role</th>
                      <th>Avatar</th>
                      <th>Phone</th>
                      <th>Addres</th>
                      <th>Password</th>
                      <th>Created At</th>
                      <th>Updated At</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $ambildatausers = mysqli_query($conn, 'select * from users');
                    while ($data = mysqli_fetch_array($ambildatausers)) {
                      echo "<tr>";
                      echo "<td>" . $data['id'] . "</td>";

                      // button action start
                      echo "<td>";
                    ?>
                      <!-- Delete Data End -->
                      <a href="delete.php?id=<?php echo $data['id']; ?>" onclick="konfirmasi()" class="btn btn-danger" role="button">Hapus</a>
                      <!-- Delete Data End -->

                      <!-- Edit Data Start -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?= $data['id']; ?>" value="<?= $data['id']; ?>">
                        Edit
                      </button>

                      <div class="modal fade" id="myModal<?= $data['id']; ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title">Edit Users</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->


                            <form action="" method="post" enctype="multipart/form-data">
                              <input type="text" name="id" value="<?= $data['id']; ?>" class="d-none">
                              <div class="modal-body">
                                <div class="mb-3">
                                  <label for="name" class="form-label">Nama User</label>
                                  <input type="text" class="form-control" placeholder="Masukkan Nama User" name="editnamauser" id="name" value="<?= $data['name']; ?>" required>
                                </div>

                                <div class="row">
                                  <div class="mb-3 col-6">
                                    <label for="role" class="form-label">Role</label>
                                    <select name="editrole" id="role" class="form-control">
                                      <option selected><?= $data['role']; ?></option>
                                      <option value="admin">admin</option>
                                      <option value="staff">staff</option>
                                    </select>
                                  </div>

                                  <div class="mb-3 col-6">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" placeholder="Password..." name="editpassworduser" id="password" value="<?= $data['password']; ?>" required>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="mb-3 col-6">
                                    <label for="email" class="form-label">Email User</label>
                                    <input type="text" class="form-control" placeholder="Email..." name="editemailuser" id="email" value="<?= $data['email']; ?>" required>
                                  </div>

                                  <div class="mb-3 col-6">
                                    <label for="phone" class="form-label">Phone User</label>
                                    <input type="number" class="form-control" placeholder="Phone..." name="editphoneuser" id="phone" value="<?= $data['phone']; ?>" required>
                                  </div>

                                </div>

                                <div class="mb-3 form-group">
                                  <label for="address" class="form-label">Alamat User</label>
                                  <br>
                                  <textarea name="editalamatusers" id="address" class="form-control" rows="3"><?= $data['address']; ?></textarea>
                                </div>

                                <div class="form-group mb-3">
                                  <label for="avatar">Add Avatar</label>
                                  <input type="file" class="form-control-file" name="avatar" id="avatar" value="<?= $data['avatar']; ?>">
                                </div>

                                <button type="submit" name="editUsers" class="btn btn-primary mb-3" style="float: right;">Update</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- Edit Data End -->

                      <!-- Detail Data Start -->
                      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ModalDetail<?= $data['id']; ?>" value="<?= $data['id']; ?>">
                        Detail
                      </button>


                      <div class="modal fade" id="ModalDetail<?= $data['id']; ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header text-center bg-warning">
                              <h4 class="modal-title">Detail Users</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="row d-flex justify-content-center align-items-center">
                              <div class="mb-3 mt-3 mr-5">
                                <p><img src="assets/avatars/<?= $data['avatar']; ?>" style="width:150px; height:200px"></p>
                              </div>
                              <div class=" mb-3 mt-3">
                                <div class="row d-flex justify-content-center">
                                  <div class=" mb-3 mt-3">
                                    <p>Id User &emsp;&emsp;&emsp;&nbsp; :</p>
                                    <p>Nama Lengkap : </p>
                                    <p>Role &emsp;&emsp;&emsp;&emsp;&ensp; :</p>
                                    <p>No.HP&emsp;&emsp;&emsp;&ensp;&nbsp; :</p>
                                    <p>Email &emsp;&emsp;&emsp;&ensp;&ensp; :</p>
                                    <p>Alamat &emsp;&emsp;&emsp;&ensp;:</p>
                                  </div>
                                  <div class=" mb-3 mt-3">
                                    <p>&ensp;<?= $data['id']; ?></p>
                                    <p>&ensp;<?= $data['name']; ?></p>
                                    <p>&ensp;<?= $data['role']; ?></p>
                                    <p>&ensp;<?= $data['phone']; ?></p>
                                    <p>&ensp;<?= $data['email']; ?></p>
                                    <p>&ensp;<?= $data['address']; ?></p>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>


                          </div>
                        </div>
                      </div>
                      <!-- Detail Data End -->

                      <?php
                      echo "</td>";
                      // button action end

                      echo "<td>" . $data['email'] . "</td>";
                      echo "<td>" . $data['name'] . "</td>";
                      echo "<td>" . $data['role'] . "</td>";
                      echo "<td>";
                      ?>
                      <img src="assets/avatars/<?= $data['avatar']; ?>" style="width:120px; height:120px">
                      <?php
                      echo "</td>";
                      echo "<td>" . $data['phone'] . "</td>";
                      echo "<td>" . $data['address'] . "</td>";
                      echo "<td>" . $data['password'] . "</td>";
                      echo "<td>" . $data['created_at'] . "</td>";
                      echo "<td>" . $data['updated_at'] . "</td>";
                      echo "</tr>";
                      ?>

                    <?php
                    };
                    ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </main>
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Ade Dwi Putra</div>
            <div>
              <a href="#">Privacy Policy</a>
              &middot;
              <a href="#">Terms &amp; Conditions</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script>
    function konfirmasi() {
      konfirmasi = confirm("Apakah anda yakin ingin menghapus data ini?"), alert("Data berhasil dihapus");
      document.writeln(konfirmasi)
    }
  </script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/chart-area-demo.js"></script>
  <script src="assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/datatables-demo.js"></script>
</body>

<!-- Modal Detail Start -->
<?php
$detaildatausers = mysqli_query($conn, 'select * from users');
while ($datadetail = mysqli_fetch_array($detaildatausers)) {


?>
  <!-- Detail Modal -->
  <div class="modal fade" id="ModalDetail">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header bg-warning">
          <h4 class="modal-title">Detail Users</h4>
          <button type="button" class="close  " data-dismiss="modal">&times;</button>
        </div>

        <div class="row mt-3">
          <div class="mb-3 col-6">
            <p class="text-center"><?= $namedetail; ?></p>
          </div>

          <img src="assets/avatars/<?= $avatardetail; ?> " style="width:120px; height:120px">
        </div>

      </div>
    </div>
  </div>

<?php
};
?>
<!-- Modal Detail End -->

</html>