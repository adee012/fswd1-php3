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
            <div class="sb-sidenav-menu-heading"></div>
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
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item active">Data Join Product & Categories</li>
            </ol>
            <div class="card mb-4">
              <div class="card-header">
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
                        <th>No</th>
                        <th>Categories</th>
                        <th>Products</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Status</th>
                        <!-- <th>Created At</th>
                        <th>Updated At</th>
                        <th>Created By</th>
                        <th>Verified At</th>
                        <th>Verified By</th> -->
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                        $ambildatajoin = mysqli_query($conn,'select c.name as name_category,p.name,p.description,p.price,p.status from products p inner join categories c on p.category_id=c.id ');
                        $i=0;
                        while($data=mysqli_fetch_array($ambildatajoin )){
                          
                            $i++;
                            $categoryname = $data['name_category'];
                            $productname = $data['name'];
                            $description = $data['description'];
                            $price = $data ['price'];
                            $status = $data ['status'];
                        
                      ?>

                      <tr>
                        <td><?=$i;?></td>
                        <td><?=$categoryname;?></td>
                        <td><?=$productname;?></td>
                        <td><?=$description;?></td>
                        <td><?=$price;?></td>
                        <td><?=$status;?></td>
                        <!-- <td>System Architect</td>
                        <td></td>
                        <td>1</td>
                        <td>2011/04/25</td>
                        <td>1</td> -->
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
      </div>
    </div>
  </div>
</html>