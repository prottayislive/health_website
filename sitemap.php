<?php require_once('includes/function.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('includes/head.php'); ?>
</head>
<body>


    <?php require_once('includes/nav.php'); ?>

    <div id="content" class="mt-5 pt-5">
    <div class="container mb-5">
        <h1 class="text-center">Sitemap</h1>
    
        <div class="align-items-center">
            <div class="d-block">
                <div class="card">
                    <div class="card-body text-center" style="background-color: #68c3d4;">
                        <h5>Sitemap page: <br> All our web pages are listed here! </h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5 mb-5">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body text-center " style="background-color: #68c3d4;">
                        <h5 class="col-sm-12">Homepage</h5>
                        <a href="index.php" class="btn btn-sm btn-primary">LIFE - Living It Fully Everyday</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body text-center" style="background-color: #68c3d4;">
                        <h5 class="col-sm-12">AU Covid-19 Resources</h5>
                        <a href="https://www.health.gov.au/news/health-alerts/novel-coronavirus-2019-ncov-health-alert/coronavirus-covid-19-resources" class="btn btn-sm btn-primary" target="_blank">Covid-19 Resources</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body text-center mt-2" style="background-color: #68c3d4;">
                        <h5 class="col-sm-12">Contact Page</h5>
                        <a href="contact.php" class="btn btn-sm btn-primary">Contact Form</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body text-center mt-2" style="background-color: #68c3d4;">
                        <h5 class="col-sm-12">Registration Page</h5>
                        <a href="register.php" class="btn btn-sm btn-primary">Register</a>
                    </div>
                </div>
            </div>
        </div>


    </div>
    </div>

    <?php require_once('includes/footer.php'); ?>

</div>

</body>
</html>
