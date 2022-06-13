<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>sup prod</title>
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT ?>/img/image_processing20200412-21268-172ln5q-removebg-preview.png">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="<?php echo URLROOT ?>/css/style.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="dashbord"> <img style="width:70px;height:50px;  " src="<?php echo URLROOT ?>/img/image_processing20200412-21268-172ln5q-removebg-preview.png" alt="logo"></a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-info" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="<?php echo URLROOT ?>/logout/index">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="dashboard">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Stock
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="product">Products</a>
                                <a class="nav-link" href="brand">Brands</a>
                                <a class="nav-link" href="category">Categories</a>


                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-plus"></i></div>
                            Show More
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">


                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    Tools
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">

                                        <a class="nav-link" href="Rapport">Rapport</a>
                                        <a class="nav-link" href="order">Orders</a>


                                    </nav>
                                </div>
                            </nav>
                        </div>

                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?php echo ($_SESSION['Role']); ?>
                </div>
            </nav>
        </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div style="background-color: #00204a;" class="card text-white mb-4">
                                    <div class="card-body">Total Orders</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">17</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div style="background-color: #005792;" class="card  text-white mb-4">
                                    <div class="card-body">Total Categories</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">116</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div style="background-color: #00bbf0;" class="card  text-white mb-4">
                                    <div class="card-body">Total Products</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">1115</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div style="background-color: #fdb44b;" class="card text-white mb-4">
                                    <div class="card-body">Total Sales</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">15</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header bg-light">
                                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                                        Arrivage details
                                    </div>
                                    <div class="col-lg-6 d-flex">
                                      
                                            
                                            <div class="card-body align-items-center"><div class="col-lg-6"style=""></div><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header bg-light">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        info
                                    </div>
                                    <div class="card-body"style="overflow:scroll;max-height:257px">
                                        <div class="card-header text-white pb-0"style="background-color:#00204a ;">
                                            <h6>Suppliers overview</h6>
                                            <p class="text-sm">
                                              <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                                              <span class="font-weight-bold">24%</span> this month
                                            </p>
                                          </div>
                                          <div class="card-body p-3">
                                            <div class="timeline timeline-one-side">
                                              <div class="timeline-block mb-3">
                                                <span class="timeline-step">
                                                  <i class="material-icons text-success text-gradient">Supplier 1</i>
                                                </span>
                                                <div class="timeline-content">
                                                  <h6 class="text-dark text-sm font-weight-bold mb-0">Brand Name</h6>
                                                  <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">orders pourcentage</p>
                                                </div>
                                              </div>
                                              <div class="timeline-block mb-3">
                                                <span class="timeline-step">
                                                  <i class="material-icons text-danger text-gradient">Supplir 2</i>
                                                </span>
                                                <div class="timeline-content">
                                                  <h6 class="text-dark text-sm font-weight-bold mb-0">Brand Name2</h6>
                                                  <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">orders pourcentage</p>
                                                </div>
                                              </div>
                                              <div class="timeline-block mb-3">
                                                <span class="timeline-step">
                                                  <i class="material-icons text-info text-gradient">shopping_cart</i>
                                                </span>
                                                <div class="timeline-content">
                                                  <h6 class="text-dark text-sm font-weight-bold mb-0">Server payments for April</h6>
                                                  <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 9:34 PM</p>
                                                </div>
                                              </div>
                                              <div class="timeline-block mb-3">
                                                <span class="timeline-step">
                                                  <i class="material-icons text-warning text-gradient">credit_card</i>
                                                </span>
                                                <div class="timeline-content">
                                                  <h6 class="text-dark text-sm font-weight-bold mb-0">New card added for order #4395133</h6>
                                                  <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">20 DEC 2:20 AM</p>
                                                </div>
                                              </div>
                                              <div class="timeline-block mb-3">
                                                <span class="timeline-step">
                                                  <i class="material-icons text-primary text-gradient">key</i>
                                                </span>
                                                <div class="timeline-content">
                                                  <h6 class="text-dark text-sm font-weight-bold mb-0">Unlock packages for development</h6>
                                                  <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">18 DEC 4:54 AM</p>
                                                </div>
                                              </div>
                                              <div class="timeline-block">
                                                <span class="timeline-step">
                                                  <i class="material-icons text-dark text-gradient">payments</i>
                                                </span>
                                                <div class="timeline-content">
                                                  <h6 class="text-dark text-sm font-weight-bold mb-0">New order #9583120</h6>
                                                  <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">17 DEC</p>
                                                </div>
                                              </div>
                                    </div>
                                </div>   

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <i class="fas fa-table me-1"></i>
                                Epuisement du stock details
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Name</th>
                                        <th>Rating</th>
                                        <th>Status</th>
                                        
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Product</th>
                                        <th>Name</th>
                                        <th>Rating</th>
                                        <th>Status</th>
                                       
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr >
                                        <td>SNeakers</td>
                                        <td>air jordan 1</td>
                                        <td>4.5 out of 5</td>
                                        <td>almost empty</td>
                                    </tr>
                                    <tr >
                                        <td>T-Shirt</td>
                                        <td>Nike</td>
                                        <td>3.5 out of 5</td>
                                        <td>available</td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                
            </div>
            
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo URLROOT ?>/js/script.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="<?php echo URLROOT ?>/js/demo/chart-area-demo.js"></script>
        <script src="<?php echo URLROOT ?>/js/demo/chart-bar-demo.js"></script>
        <script src="<?php echo URLROOT ?>/js/demo/chart-pie-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="<?php echo URLROOT ?>/js/datatables-simple-demo.js"></script>
    </body>
</html>





