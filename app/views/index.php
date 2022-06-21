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
    <title><?php $data['title'] ?></title>
    <link href="<?php echo URLROOT ?>/css/style.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="" style="background-image: url('<?php echo URLROOT ?>/img/gestion-de-stock.1.15.jpg');">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div style="background-color:#005792!important;" class="card-header ">
                                    <h3 class=" text-white text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form method="post" class="needs-validation" novalidate>
                                        <div class=" form-floating mb-3">
                                            <input name="email" class="form-control" id="email" type="email" placeholder="name@example.com" />
                                            <label for="inputEmail">Email address</label>
                                            <div id="email_error">

                                            </div>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input name="password" class="form-control" id="password" type="password" placeholder="Password" />
                                            <label for="inputPassword">Password</label>
                                            <div id="password_error">

                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="password.html">Forgot Password?</a>
                                            <button class="btn text-white" style="background-color:#005792!important;" id="submit" name="submit" type="submit">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="<?php echo URLROOT ?>/register/index">Need an account? Sign up!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo URLROOT ?>/js/script.js"></script>
</body>

</html>