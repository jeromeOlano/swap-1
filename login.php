<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./CSS/login.css"/>
    <link rel="icon" href="./image/white_logo.webp"/> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1fb0c16617.js" crossorigin="anonymous"></script>
    <title>SWAP</title>
</head>
<body>

  <header>
    <nav class="navbar justify-content-center">
      <div class="col-lg-4 col-md-4 col-sm-12">
        <a  style="color: whitesmoke;" class="navbar-brand" href="indexWOutAcc.html"><img src="./image/white_logo.webp" alt="logo" >Swap</a>
      </div>

      <div class="input-group col-lg-4 col-md-3 col-sm-12">
          <input type="text" class="form-control" placeholder="Search">
          <div class="input-group-append">
            <button class="btn btn-light" type="button">
              <i class="fa fa-search"></i>
            </button>
          </div>
      </div>
      
      <div class=" col-lg-4 col-md-4 col-sm-12">
          <a id="login" href="login.php">Log In</a>
          <a id="signin" href="signup.php">Sign Up</a>
        
      </div>
    </nav>

    <div class="navigationbar">
      <nav class="nav-bar navbar-expand-md navbar-light">
          <div class="container-fluid">
            <button data-toggle="collapse" class="navbar-toggler" data-target="#navbarCollapse"><span class="sr-only">Toggle navigation</span><i class="fa fa-bars" aria-hidden="true" style="color:#e6e6ff"></i></button>
   
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="nav-bar mx-auto">
               <ul class="nav">
                  <li class="nav-item col-lg-4 col-md-4 col-sm-12">
                     <a class="nav-link" href="indexWOutAcc.html">Home</a>
                  </li>
               </ul>
            </div>
          </div>
          </div>    
      </nav>
    </div>  
  </header>
    
    <main>
       <div class="container">
         <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12 ">
            <div class="image offset-3">
              <img src="image/black_logo.webp" alt="">
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="login">
              <h1>Login</h1>
              <form action="php/login_functionality.php" method="POST">
                <?php
                  if(isset($_SESSION["error"]))
                  {
                    echo "<p style= color:red ;>$_SESSION[error]</p>";
                  }
                  unset($_SESSION["error"]);
                ?>

                <label for="uname">Username</label>
                <input type="text" placeholder="Username" name="username" required>

                <label for="pass">Password</label>
                <input type="password" placeholder="Password" name="password" required>

                <span class="psw">Forgot <a href="#">password?</a></span>

                <div class="forbtn">
                  <button type="submit" class="logbtn">Log in</button>
                </div>

                <div class="newhere">
                <span>New in this site? <a href="signup.html">click here</a> to Sign up</span>
                </div>
              </form>

            </div>
          </div>
         </div>
       </div>
           
    </main>

    <footer>
      <div id="foots">
      <div class="container-fluid p-0">
        <div class="row mx-auto">
          <div class="col-md-6">
            <h1 class="text-dark">About Us</h1>
            <p class="text-muted">Swap website is created to let our User experience the new way of barter and making sure that they are at ease when using Swap by ensuring their safety, security, and mostly, to give them a convinient service at all times!</p>
          </div>
          <div class="col-md-6">
            <p class="pt-4 text-muted justify-content-center">Swap &copy2020  All Rights Reserved </p>
          </div>
        </div>
      </div>
    </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>