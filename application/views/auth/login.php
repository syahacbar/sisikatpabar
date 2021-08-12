<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - Panel Admin Sisikat</title>
        <link href="<?php echo base_url();?>resources/admintheme/css/styles.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>resources/admintheme/css/login-css.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <img class="mb-4" src="https://sisikat.com/resources/template/assets/logo-sisikat.png" alt="" width="72" height="72">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <div id="infoMessage"><?php echo $message;?></div>
                                        <?php echo form_open("auth/login");?>
                                        <form>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="identity" type="identity" name="identity" placeholder="name@example.com" />
                                                <label for="identity">Nama Akun Pengguna</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="password" type="password" name="password" placeholder="Password" />
                                                <label for="password">Kata sandi</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="remember" type="checkbox" value="1" />
                                                <label class="form-check-label" for="remember">Ingat kata sandi</label> 
                                                <a style="text-align: right;" class="small" href="forgot_password">Lupa kata sandi?</a>
                                            </div>
                                            <div class="form-check mb-3">
                                                <center><?php echo $recaptcha;?></center>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                
                                            </div>
                                            <div id="loginbutton">
                                                <button type="submit" class="btn btn-primary">MASUK</button>
                                            </div>
                                        </form>
                                        <?php echo form_close();?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; SISIKAT 2021</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
