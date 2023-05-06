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
    <title>Dashboard - SB Admin</title>
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
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">Task PHP3</a>
      <button
        class="btn btn-link btn-sm order-1 order-lg-0"
        id="sidebarToggle"
        href="#"
      >
        <i class="fas fa-bars"></i>
      </button>
      <!-- Navbar-->
    </nav>
    <div id="layoutSidenav">
      <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
          <div class="sb-sidenav-menu">
            <div class="nav">
            <div class="sb-sidenav-menu-heading">Main Menu</div>
              <a class="nav-link" href="index.php">
                <div class="sb-nav-link-icon">
                  <i class="fas fa-tachometer-alt"></i>
                </div>
                Dashboard
              </a>
              <a class="nav-link" href="products.php">
                <div class="sb-nav-link-icon">
                  <i class="fa fa-steam"></i>
                </div>
                Products
              </a>
              <a class="nav-link" href="categories.php">
                <div class="sb-nav-link-icon">
                  <i class="fas fa-tachometer-alt"></i>
                </div>
                Categories
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
            <h1 class="mt-4">Products</h1>
            <div class="card mb-4">
              <div class="card-header">
                  <!-- Button to Open the Modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                  Add Products
                </button>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    class="table table-bordered"
                    id="dataTable"
                    width="100%"
                    cellspacing="0"
                  >
                  <thead>
                      <tr>
                        <th>Id</th>
                        <th>Category Id</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Created By</th>
                        <th>Verified At</th>
                        <th>Verified By</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                        $ambildataproduct = mysqli_query($conn,'select * from products');
                        while($data=mysqli_fetch_array($ambildataproduct)){
                          $id = $data['id'];
                          $categoryid = $data['category_id'];
                          $name = $data['name'];
                          $description = $data['description'];
                          $price = $data['price'];
                          $status = $data['status'];
                          $created_at = $data['created_at'];
                          $updated_at = $data['updated_at'];
                          $created_by = $data['created_by'];
                          $verified_at = $data['verified_at'];
                          $verified_by = $data['verified_by'];
                        
                      ?>

                      <tr>
                        <td><?=$id;?></td>
                        <td><?=$categoryid;?> </td>
                        <td><?=$name;?></td>
                        <td><?=$description;?></td>
                        <td><?=$price;?></td>
                        <td><?=$status;?></td>
                        <td><?=$created_at;?></td>
                        <td><?=$updated_at;?></td>
                        <td><?=$created_by;?></td>
                        <td><?=$verified_at;?></td>
                        <td><?=$verified_by;?></td>
                      </tr>

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
            <div
              class="d-flex align-items-center justify-content-between small"
            >
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

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Products</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form method="post">
        <div class="modal-body">
          <input type="text" placeholder="Category Id" name="categoryId" class="form-control mt-3" required>
          <input type="text" placeholder="Name Product" name="nameproduct" class="form-control mt-3" required>
          <input type="text" placeholder="Description" name="description" class="form-control mt-3" required>
          <input type="number" placeholder="Price" name="price" class="form-control mt-3" required>

          <select name="status" class="form-control mt-3">
            <option value="accepted">accepted</option>
            <option value="waiting">waiting</option>
            <option value="rejected">rejected</option>
          </select>

          <input type="text" placeholder="Created By" name="createdBy" class="form-control mt-3" required>
          <input type="text" placeholder="Verified By" name="verifiedBy" class="form-control mt-3" required>

          <button type="submit" class="btn btn-primary mt-2" name="add-products">Add</button>
        </div>
        </form>
        
      </div>
    </div>
  </div>
</html>
