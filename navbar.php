   <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="/"> <img alt="Logo" src="../assets/media/logos/logo-9-md.png" /></a><p style="padding-top:20px;" class="nav-brand" >YUMEX PHILIPPINES CORPORATION</p>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php if($_SERVER['REQUEST_URI'] =='/'){echo '#download';} else {echo '/#download';}?>">How to</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php if($_SERVER['REQUEST_URI'] =='/'){echo '#features';} else {echo '/#features';}?>">FAQ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php if($_SERVER['REQUEST_URI'] =='/'){echo '#about';} else {echo '/#about';}?>">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){echo 'acc/home.php">';}else if($_SERVER['REQUEST_URI'] =='/'){
                echo '#login" data-toggle="modal">';
              }else {
                echo 'login.php">';
              } ?> 
              <?php if(isset($_SESSION['idNum'])){echo 'Hi '.$_SESSION['first'].'!';} else{echo 'Log-in';}?></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
