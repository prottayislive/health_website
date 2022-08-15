<?php require_once('includes/function.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('includes/head.php'); ?>
</head>
<body>
<?php require_once('includes/nav.php'); ?>

   

    <div id="content" class="mt-5">
    <div class="container mb-5">

    <div class="d-block justify-content-center">
        <h1 class="text-center">Contact</h1>
    </div>

        <div class="d-block justify-content-center">

                <h5 class="text-center">Hi there! Do you have a query?
                <br> Let us know down here and we will get back to you
                </h5>

        </div>
    

                    <div class="d-block justify-content-center mt-3">
                        <form method="POST" id="myForm">
                            <!-- first name -->
                            <div class="form-group row">
                                <label for="firstname" class="col-sm-3 col-form-label" >First Name: </label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control mt-2" id="firstname" name="firstname" placeholder="Enter your First Name">
                                </div>
                            </div>
                            <!-- last name-->
                            <div class="form-group row">
                                <label for="lastname" class="col-sm-3 col-form-label">Last Name: </label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control mt-2" id="lastname" name="lastname" placeholder="Enter your Last Name">
                                </div>
                            </div>
                            <!-- address-->
                            <div class="form-group row">
                                <label for="address" class="col-sm-3 col-form-label">Address: </label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control mt-2" id="address" name="address" placeholder="Enter your Address">
                                </div>
                            </div>
                            <!-- email-->
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email Address: </label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control mt-2" id="email" name="email" placeholder="Enter your Email Address">
                                </div>
                            </div>
                            <!-- enquiry-->
                            <div class="form-group row">
                                <label for="enquiry" class="col-sm-3 col-form-label">Enquiry:</label>
                                <div class="col-sm-9">
                                <textarea name="enquiry" class="form-control mt-2" id="enquiry" rows="7" placeholder="Write your query here"></textarea>
                                </div>
                            </div>
                        
                        
                            <div class="form-group row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-sm btn-primary mt-2">Submit Form</button>
                                </div>
                            </div>
                        </form>
                    </div>
                

    </div>
    </div>
    
    <div class="d-block mt-3">
    <?php require_once('includes/footer.php'); ?>
    </div>


</body>
</html>
