<?php
require 'header.php';
echo ' </head> <body data-col="1-column" class=" 1-column  blank-page">';
require 'navbar.php';
?>
<!-- ////////////////////////////////////////////////////////////////////////////-->

<div class="wrapper nav-collapsed menu-collapsed">
<div class="main-panel">
  <!-- BEGIN : Main Content-->
  <div class="main-content">
    <div class="content-wrapper"><!--Registration Page Starts-->
    <section id="registration" style="padding-top: 122px;">
      <div class="container-fluid">
        <div class="row full-height-vh m-0">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="card">
              <div class="card-content">
                <div class="card-body register-img">
                  <div class="row m-0">
                    <div class="col-lg-6 d-none d-lg-block py-2 text-center">
                      <img src="assets/img/register.png" alt="" class="img-fluid mt-3 pl-3" width="400"
                      height="230">
                    </div>
                    
                    <div class="col-lg-6 col-md-12 px-4 py-3 pt-4 bg-white">
                      <h4 class="card-title mb-2">REQUEST ACCOUNT</h4>
                      <p class="card-text mb-3">
                        Fill the form below to request an account.
                      </p>
                      <form id="register" action="signup.php" method="post">
                        <input type="text" class="form-control mb-3" placeholder="First Name" name="first" required />
                        <input type="text" class="form-control mb-3" placeholder="Last Name" name="last" required />
                        <input class="form-control mb-3" name='idNum' type='tel' pattern="[0-9\-]+" placeholder='ID Number' title="Input correct ID Number"required>
                        <input type="password" class="form-control mb-3" placeholder="Password" name="pass"required />
                        <input type="password" class="form-control mb-3" placeholder="Confirm Password" name="confirmPass" required />
                        <div class="custom-control custom-checkbox custom-control-inline mb-3">
                          <input type="checkbox" id="customCheckboxInline1" name="termsAndCondition" class="custom-control-input"
                          required />
                          <label class="custom-control-label" for="customCheckboxInline1">
                            I accept the terms & conditions.
                          </label>
                        </div>
                        <div class="fg-actions d-flex justify-content-between">
                          <div class="login-btn">
                            <a href="login.php" class="btn btn-outline-primary text-decoration-none">
                              Back To Login
                            </a>
                          </div>
                          <div class="recover-pass">
                            <button class="btn btn-primary" type="submit">
                            REQUEST
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
    <!--Registration Page Ends-->
  </div>
</div>
<!-- END : End Main Content-->
</div>
</div>
  <footer>
      <div class="container">
        <p>&copy; eLOA 2019. All Rights Reserved.</p>
        <ul class="list-inline">
          <li class="list-inline-item">
            <a href="#">Privacy</a>
          </li>
          <li class="list-inline-item">
            <a href="#">Terms</a>
          </li>
          <li class="list-inline-item">
            <a href="#">FAQ</a>
          </li>
        </ul>
      </div>
    </footer>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<!-- BEGIN VENDOR JS-->
<script src="assets/vendors/js/core/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="assets/vendors/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/vendors/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/vendors/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="assets/vendors/js/prism.min.js" type="text/javascript"></script>
<script src="assets/vendors/js/jquery.matchHeight-min.js" type="text/javascript"></script>
<script src="assets/vendors/js/screenfull.min.js" type="text/javascript"></script>
<script src="assets/vendors/js/pace/pace.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<!-- END PAGE VENDOR JS-->
<!-- BEGIN APEX JS-->
<script src="assets/js/app-sidebar.js" type="text/javascript"></script>
<script src="assets/js/notification-sidebar.js" type="text/javascript"></script>
<script src="assets/js/customizer.js" type="text/javascript"></script>
<!-- END APEX JS-->
<!-- END APEX JS-->
<!-- BEGIN PAGE LEVEL JS-->
<!-- END PAGE LEVEL JS-->
</body>
<!-- END : Body-->
</html>