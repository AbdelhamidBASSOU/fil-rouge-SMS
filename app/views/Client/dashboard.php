<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?php echo $data['title'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
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
                    <li><a class="dropdown-item" href="<?php echo URLROOT ?>/client/orders">orders</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div class='mt-5'>
        <main>
            <div class="container-fluid bg-trasparent my-4 p-3" style="position: relative;">
                <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">

                <?php foreach ($data['product'] as $product) :  ?>

                    

                    <div class="col">
                        <div class="card h-100 shadow-sm">
                        <img src="<?php echo URLROOT ?>/public/uploads/<?php echo $product->img ?> " class="card-img-top"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="clearfix mb-3"> <span class="float-start badge rounded-pill bg-primary"><?php echo $product->brandName ; ?></span> <span class="float-end price-hp"><?php echo $product->Price ; ?>&euro;</span> </div>
                                <h5 class="card-title"><?php echo $product->Name ; ?></h5>
                                <h6 class="card-title"><?php echo $product->Description ; ?></h6>
                                <form method="POST" action="makeorder" > 
                                    <input type="hidden" name="id" value="<?php echo $product->idProduct ; ?>">
                                    <div class="form-group">
     
                <input type="number" value="1"  class="form-control mt-5" placeholder="Quantity" min='1'  max="<?php echo $product->Quantity; ?>" name="quantity">
              </div>
                                
              <div class="text-center my-4">  <button type="submit" name="makeorder" class="btn btn-warning">Make Order</button></div>
                                </form>

                                
                                
                            </div>
                        </div>
                    </div>

                    <?php endforeach; ?>

                </div>
            </div>
        </main>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>