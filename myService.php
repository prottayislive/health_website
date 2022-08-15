<?php require_once('includes/authorities.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('includes/head.php'); ?>
</head>
<body>


    <?php require_once('includes/nav.php'); ?>

    <div id="content" class="mt-5 pt-5">
    <div class="container">
        <div class="mb-3">
            <h1 class="display-1">myServices</h1>

            <div class="alert" style="background-color: rgba(245, 245, 239, 1);">
                <div class="container">
                    <p class="display-6">Welcome to LIFE - Living It Fully Everyday!</p>
                    <p>All our services are here!</p>
                </div>
            </div>
            
            
            <section class="myservice row">
                <?php foreach(getService() as $service){?>
                <div class="col">
                    <a href="service.php?id=<?= $service['service_id']; ?>" class="text-decoration-none fw-bolder d-block" style="color:#000000">
                        <img src="<?= $service['image_path']; ?>" width="60%" class="d-block">
                        <span class="d-block ms-2 mt-2"><?= $service['name']; ?></span>
                    </a>
                </div>
                <?php }?>
            </section>
            
        </div>

        <?php require_once('includes/footer.php'); ?>
    </div>
    </div>

</div>

</body>
</html>
