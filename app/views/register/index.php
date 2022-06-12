<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo  $data['title'] ?></title>
        <link href="<?php echo URLROOT ?>/css/style.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class=""style="background-image: url('../src/assets/img/gestion-de-stock.1.15.jpg');">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div style="background:#005792!important;"class="text-white card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-floating mb-3">
                                                <input name="Email" class="form-control" id="inputEmail" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input name="FullName" class="form-control" id="inputFirstName" type="text" placeholder="Enter your fill name" />
                                                        <label for="inputFirstName">Full name</label>
                                                    </div> 
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                       
                                                       <label class="form-label " for="inputRole">Role</label>
                                                <select name="Role" class="form-select shadow-none" aria-label="Default select example">
                                                    <option></option>
                                                    <option value="Supplier">Supplier</option>
                                                    <option value="client">Client</option>
                                                </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input name="Phone" class="form-control" id="inputPhone" type="Phone" placeholder="0XXXXXXXXXXXXX" />
                                                <label for="inputPhone">Phone</label>
                                            </div>
                                            <div><?php if(isset($data['FullName_err'])) echo $data['FullName_err'];?></div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input name="Password" class="form-control" id="inputPassword" type="password" placeholder="Create a password" />
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input name="cPassword" class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirm password" />
                                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button style="background-color:#005792!important;" class="btn text-white btn-block" type='submit'  name="submit">Create Account</button></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.html">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
