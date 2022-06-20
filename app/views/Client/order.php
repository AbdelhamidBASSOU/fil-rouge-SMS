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
        <a class="navbar-brand ps-3" href="dashbord"> <img style="width:70px;height:50px;  "
                src="<?php echo URLROOT ?>/img/image_processing20200412-21268-172ln5q-removebg-preview.png"
                alt="logo"></a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>

        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="<?php echo URLROOT ?>/logout/index">Logout</a></li>
                    <li><a class="dropdown-item" href="<?php echo URLROOT ?>/client/dashboard">Dashboard</a></li>

                </ul>
            </li>
        </ul>
    </nav>
        
            <main>
                <div class="container-fluid px-4 " style='margin-top:70px;' >
                    <h1 class="mt-4" >Orders</h1>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            My orders
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>idOrder</th>
                                        
                                        <th>Product</th>
                                        
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($data['Orders'] as $order) : ?>
                                        <tr>
                                            <td><?php echo $order->idOrder; ?></td>
                                            
                                            <td><?php echo $order->Name; ?></td>
                                            
                                            <td><?php echo $order->Quantity; ?></td>
                                            <td><?php echo $order->Status; ?></td>
                                            
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">

            </footer>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo URLROOT ?>/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="<?php echo URLROOT ?>/js/datatables-simple-demo.js"></script>
</body>

</html>