<!-- <h1><?php echo lang('forgot_password_heading');?></h1>
<p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/forgot_password");?>

      <p>
      	<label for="identity"><?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?></label> <br />
      	<?php echo form_input($identity);?>
      </p>

      <p><?php echo form_submit('submit', lang('forgot_password_submit_btn'));?></p>

<?php echo form_close();?> -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Password Reset - SB Admin</title>
        <link href="<?php echo base_url();?>resources/admintheme/css/styles.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>resources/admintheme/css/login-css.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Atur Ulang Kata Sandi</h3></div>
                                    <div class="card-body">
                                        <div class="small mb-3 text-muted">Masukkan Email Anda dan kami akan mengirimkan link atur ulang kata sandi.</div>
                                        <?php echo form_open("auth/forgot_password");?>
                                        <form>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="identity" type="email" placeholder="name@example.com" />
                                                <label for="identity">Email</label>
                                            </div>
                                            <div id="login" class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <div class="small">Sudah punya akun? </div><a href="<?php echo base_url('auth/login');?>"> Login</a>
                                            </div>
                                            <div id="loginbutton">
                                                <button class="btn btn-primary" type="submit">KIRIM</button>
                                            </div>
                                        </form>
                                        <?php echo form_close();?>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small">Belum punya akun?<a href="register.html"> DAFTAR DI SINI!</a></div>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
