<?php require_once('includes/function.php'); ?>
<?php
    $errors = [];
    if(isset($_POST['login'])) {
        $errors = loginUser($_POST);

        if(count($errors) === 0)
            redirect('myService.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('includes/head.php'); ?>
</head>
<body>


    <?php require_once('includes/nav.php'); ?>

    <div id="content" class="mt-5 pt-5">
    <div class="container">
        <h1 class="text-center">Login</h1>
    
        <div class="align-items-center">
            
            <div class="d-block">
                <form method="post">
                <div class="card">
                    <div class="card-body" style="background-color: #68c3d4;">
                        <div class="form-group">
                            <label for="lastname">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                <?php displayValue($_POST, 'email'); ?> />
                            <?php displayError($errors, 'email'); ?>
                        </div>

                        <div class="form-group">
                            <label for="phone">Password</label>
                            <input type="password" class="form-control" id="password" name="password" />
                            <?php displayError($errors, 'password'); ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block" name="login" value="login">Login</button>
                    </div>
                </div>
                </form>
            </div>
           
        </div>
    </div>
    </div>

    <?php require_once('includes/footer.php'); ?>



</body>
</html>
