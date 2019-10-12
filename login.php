<?php
require 'header.php';
echo '   <title>ELOA | Login</title></head> <body>';
require 'navbar.php';
session_start();
?>
<div class="wrapper nav-collapsed menu-collapsed">
<div class="main-panel">
  <!-- BEGIN : Main Content-->
  <div class="main-content">
    <div class="content-wrapper">
      <section id="loggedin" class="login-page">
        <div class="container-fluid">
          <div class="row full-height-vh m-0">
            <div class="col-12 d-flex align-items-center justify-content-center">
              <div class="card" style="width:61%">
                <div class="card-content">
                  <div class="card-body login-img">
                    <div class="row m-0">
                      <div class="col-lg-6 d-lg-block d-none text-center align-middle px-0 pt-4">
                        <img src="assets/img/login.png" alt="" class="img-fluid" width="400">
                      </div>
                      <div class="col-lg-6 col-md-12 bg-white login-form pr-0">
                        <h4 class="mb-2 card-title">LOGIN</h4>
                        <p class="card-text mb-3">
                          Welcome back, please login to your account.
                        </p>
                        <form id="signin" action="signin.php" method="post">
                          <input type="text" class="form-control mb-3" placeholder="ID Number" name="idNum" required />
                          <input type="password" class="form-control mb-1" placeholder="Password" name="pass" required />
                          <div class="d-flex justify-content-between mt-2">
                            <div class="remember-me">
                              <div class="custom-control custom-checkbox custom-control-inline mb-3">
                                <input type="checkbox" id="customCheckboxInline1" name="customCheckboxInline1" class="custom-control-input" />
                                <label class="custom-control-label" for="customCheckboxInline1">
                                  Remember Me
                                </label>
                              </div>
                            </div>
                            <div class="forgot-password-option">
                              <a href="forgot-password-page.html" class="text-decoration-none text-primary">Forgot Password
                              ?</a>
                            </div>
                          </div>
                          <small class="form-text text-muted">Don't have an account?</small>
                          <div class="fg-actions d-flex justify-content-between mt-1">
                            <div class="login-btn">
                              <a href="register.php" class="btn btn-outline-primary text-decoration-none">Request</a>
                            </div>
                            <button class="btn btn-primary text-decoration-none text-white" type="submit">
                            Login
                            </button>
                            
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
</div>
</div>
<!--Login Page Ends-->
<?php
require 'footer.php';
$previous = $_SERVER['HTTP_REFERER'];
$lastURL = substr($previous, -1);
if($lastURL == '/'){
  session_destroy();
  echo '<script>$(document).ready(function(){
  toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": true,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
};

toastr.warning("You are not logged in.", "Please log in first.");});</script>';
}
?>
</body>
<!-- END : Body-->
</html>