<?php require_once('includes/function.php'); ?>
<?php
    $errors = [];
    if(isset($_POST['register'])) {
        $errors = registerUser($_POST);

        if(count($errors) === 0)
            redirect('myService.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('includes/head.php'); ?>
    <script>
        $(document).ready(function () {
            const age = $("#age");
            const ageChange = function () {
                $("#age-display").text(age.val());
            }

            ageChange();
            age.mousemove(ageChange).change(ageChange);
        });
    </script>
</head>
<body>
<?php require_once('includes/nav.php'); ?>

  
    
    <div id="content" class="mt-2">
    <div class="container ">
        <h1 class="text-center">Register</h1>
        <form method="post">
        <div class="align-items-center">
            <div class="d-block">
                 <div class="card ">
          
                    <div class="card-body" style="background-color: #d1f4ff;">
                        <!-- Full name -->
                        <div class="form-group">
                            <label for="firstname">First name</label>
                            <input type="text" class="form-control" id="firstname" name="firstname"
                                <?php displayValue($_POST, 'firstname'); ?> />
                            <?php displayError($errors, 'firstname'); ?>
                        </div>

                           
                        <div class="form-group">
                            <label for="lastname">Last name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname"
                                <?php displayValue($_POST, 'lastname'); ?> />
                            <?php displayError($errors, 'lastname'); ?>
                        </div>

                         <!-- email address -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                <?php displayValue($_POST, 'email'); ?> />
                            <?php displayError($errors, 'email'); ?>
                        </div>
                         <!-- phone number -->
                        <div class="form-group">
                            <label for="phone">Phone number <small class="text-muted"> +61 4xx xxx xxx</small></label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                <?php displayValue($_POST, 'phone'); ?> />
                            <?php displayError($errors, 'phone'); ?>
                        </div>
                         <!-- age and restriction -->
                         <div class="form-group">
                            <label for="phone">Age <small class="text-muted">must be above 13 years</small></label>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">
                                    <h4><span id="age-display" class="badge badge-danger bg-success"></span></h4>
                                </label>
                                <div class="col-sm-10">
                                    <input type="range" class="form-control" id="age" name="age" min="1" max="120"
                                        onclick="getTotal()"
                                        <?php displayValue($_POST, 'age'); ?>
                                        <?php if(!isset($_POST['age'])) echo 'value="1"'; ?> />
                                </div>
                            </div>
                            <?php displayError($errors, 'age'); ?>
                        </div>
                
                    
            <div class="d-block"> 
                        <!-- studentship-->
                        <div class="form-group">
                                    <div>*Student</div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            id="student-status-yes" name="student-status" value="true"
                                            onclick="getTotal()"
                                            <?php displayChecked($_POST, 'student-status', 'true'); ?> />
                                        <label class="form-check-label" for="student-status-yes">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            id="student-status-no" name="student-status" value="false"
                                            onclick="getTotal()"
                                            <?php displayChecked($_POST, 'student-status', 'false'); ?> />
                                        <label class="form-check-label" for="student-status-no">No</label>
                                    </div>
                                    <?php displayError($errors, 'student-status'); ?>
                                </div>
                            </div>
                        <!-- employment status -->
                        <div class="form-group">
                                    <div>Currently Employed</div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            id="employment-status-yes" name="employment-status" value="true"
                                            onclick="getTotal()"
                                            <?php displayChecked($_POST, 'employment-status', 'true'); ?> />
                                        <label class="form-check-label" for="employment-status-yes">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            id="employment-status-no" name="employment-status" value="false"
                                            onclick="getTotal()"
                                            <?php displayChecked($_POST, 'employment-status', 'false'); ?> />
                                        <label class="form-check-label" for="employment-status-no">No</label>
                                    </div>
                                    <?php displayError($errors, 'employment-status'); ?>
                                </div>

                        <!-- password and confirmation -->

                        <div class="form-group">
                            <label for="password">Password <small class="text-muted">must be at least 6 characters</small></label>
                            <input type="password" class="form-control" id="password" name="password" />
                            <?php displayError($errors, 'password'); ?>
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword">Confirm password</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" />
                            <?php displayError($errors, 'confirmPassword'); ?>
                        </div>

                    
                        <!-- submit button -->
                        <div class="card-footer mt-2">
                        <a href="index.php" class="btn btn-sm btn-link  mr-2">Cancel</a>
                        <button type="submit" class="btn btn-sm btn-primary" name="register" value="register">Register</button>
                        </div>
                    </div>
                     </div>
                 </div>      
            </div>
        </div>
        
    </form>
    </div>
    </div>

    <?php require_once('includes/footer.php'); ?>

</body>
</html>
