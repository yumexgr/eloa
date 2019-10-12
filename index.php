<?php
   session_start();
  include_once'header.php';
  echo '   </head> <body id="page-top">';
  include_once 'navbar.php';
 ?>
       <div class="modal fade text-left" id="login" tabindex="-1" role="dialog" aria-labelledby="loginModal"
      aria-hidden="true">
      <div class="modal-dialog mx-auto" style="margin-top: 10%" role="document">
        <div class="modal-content">
          <section id="login" class="login-pg">
            <div class="row m-0">
              <div class="col-lg-6 d-lg-block d-none py-2 text-center align-middle">
                <img src="assets/img/login.png" alt="" class="img-fluid mt-5" width="400" height="230">
              </div>
              <div class="col-lg-6 col-md-12 bg-white px-4 my-auto py-4">
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
                      <input type="checkbox" id="customCheckboxInline1" name="rememberme" class="custom-control-input" />
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
                <div class="fg-actions d-flex justify-content-between pt-1">
                  <div class="login-btn">
                    <a href="register.php" class="btn btn-outline-primary text-decoration-none">Request</a>
                  </div>
                  <div class="recover-pass">
                    <button class="btn btn-primary" type="submit">
                  LOGIN
                    </button>
                  </div>
                </div>
              </form>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
    <header class="masthead">
      <div class="container h-100">
        <div class="row h-100">
          <div class="col-lg-6 my-auto">
            <div class="header-content mx-auto">
              <h1 class="mb-5">Filing for leave?</h1>
              <a href="<?php if(isset($_SESSION['idNum'])){echo '/acc/file.php';} else{echo '/login.php';}  ?>" class="btn btn-outline btn-xl">Click here to File</a>
            </div>
          </div>
          <div class="col-lg-6 my-auto">
               <img src="assets/img/masthead2.png" width="650px" />
            </div>
        </div>
      </div>
    </header>
    
    <section class="download bg-primary text-center" id="download">
      <div class="container">
        <div class="row">
          <div class="col-md-8 mx-auto">
            <h2 class="section-heading">USING THE SYSTEM</h2>
            <p>Minimal "how to" in using the system</p>
          </div>
        </div>
      </div>
    </section>
    
    <section class="features" id="features">
      <div class="container">
        <div class="section-heading text-center">
          <h2>Frequently Asked Questions (FAQ)</h2>
          <p class="text-muted">Mga usual na tanong. mamaya na baguhin. haha</p>
          <hr>
        </div>
        <div class="row">
          <div class="col-lg-12  my-auto">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-4">
                  <div class="feature-item">
                    <i class="icon-screen-smartphone text-primary"></i>
                    <h3>FAQ1</h3>
                    <p class="text-muted">Question1</p>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="feature-item">
                    <i class="icon-screen-smartphone text-primary"></i>
                    <h3>FAQ2</h3>
                    <p class="text-muted">Question2</p>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="feature-item">
                    <i class="icon-camera text-primary"></i>
                    <h3>FAQ3</h3>
                    <p class="text-muted">Question3</p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="feature-item">
                    <i class="icon-present text-primary"></i>
                    <h3>FAQ4</h3>
                    <p class="text-muted">Question4</p>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="feature-item">
                    <i class="icon-lock-open text-primary"></i>
                    <h3>FAQ5</h3>
                    <p class="text-muted">Question5</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="cta" id="about">
      <div class="cta-content">
        <div class="container">
          <h2>About<br>Yumex</h2>
          <a href="#about" class="btn btn-outline btn-xl">or About the System</a>
        </div>
      </div>
      <div class="overlay"></div>
    </section>
    <?php
      require 'footer.php';
      if(isset($_SESSION['request']) && $_SESSION['request'] == true){
        echo "<script>
        $(document).ready(function(){
          Swal.fire({
             title:'Great!',
             text: 'You have requested for an account. Please wait until your account is created.',
             type: 'success',
             showConfirmButton: false,
            })
          });
        </script>";
      }elseif(isset($_SESSION['approved']) && $_SESSION['approved'] == false){
        echo "<script>
        $(document).ready(function(){
          Swal.fire({
             title:'Darn it!',
             text: 'Unfortunately, your account is not yet created. Please try again at a later time. Thank you!',
             type: 'error',
             showConfirmButton: false,
            })
          });
        </script>";
      }
    ?>
    </body>
<!-- END : Body-->
</html>
