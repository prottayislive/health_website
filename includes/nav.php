
<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #68c3d4;">
  <div class="container-fluid ">

    <a class="navbar-brand fw-bold" href="index.php">LIFE - Living It Fully Everyday</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
   
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            <div class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link fw-bold" aria-current="page" href="index.php">Home</a>
                </li>

            </div>

            <div class="navbar-nav ml-auto">
                <?php if(isUserLoggedIn()) { ?>
                    <a class="nav-link nav-item fw-bold" href="myService.php">myServices</a>
                <?php } ?>

                <?php if(isUserLoggedIn()) { ?>

                            <span class="nav-item nav-link fw-bold" style="color:black;">
                                Hello <?php echo getLoggedInUser()['first_name']; ?>!
                            </span>

                        <a class="nav-link nav-item fw-bold" href="logout.php">Logout</a>

                <?php } else { ?>

                    <a class="nav-link nav-item fw-bold" href="register.php">Register</a>
                    <a class="nav-link nav-item fw-bold" href="login.php">Login</a>

                <?php } ?>

            </div>

            <li class="nav-item">
                    <a class="nav-link fw-bold" aria-current="page" href="contact.php">Contact</a>
                </li>

        </ul>
        
    </div>

  </div>
</nav>

