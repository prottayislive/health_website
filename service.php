<?php require_once('includes/authorities.php'); ?>

<?php 
    $errors = [];
    $duration = isset($_POST['duration']);
    if($duration){
        $errors = userService($_POST);
    }

    $type_id = isset($_POST['type_id']);
    $calories= isset($_POST['calories']);
    if($type_id && $calories){
        $calculate = calculateMeal();
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
        <div class="mb-3">
            <h1 class="display-1">myServices | <?= getServiceDetail() ?>
                <a href="myService.php" class="float-right btn btn-primary btn-sm">Back</a>
            </h1>
            
            
            <section class="myservice row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body"  style="background-color: #d1f4ff;">
                            <form action="" method="POST">
                                <?php if(!checkInstruction()){?>
                                
                                    <?php if($_GET['id'] <> 4){?>
                                    <div class="align-items-center">
                                    <div class = "d-block">
                                            <?php if($_GET['id'] == 1){?>
                                                    <p>Yoga offers physical and mental health benefits for people of all ages. And, 
                                                    if you’re going through an illness, recovering from surgery or living with 
                                                    a chronic condition, yoga can become an integral part of your treatment 
                                                    and potentially hasten healing.</p>
                                                <?php } else if($_GET['id'] == 2){?>
                                                        <p> Meditation is considered a type of mind-body complementary medicine. 
                                                        Meditation can produce a deep state of relaxation and a tranquil mind. 
                                                        Meditation can give you a sense of calm, peace and balance that can 
                                                        benefit both your emotional well-being and your overall health.
                                                        </p>
                                                    <?php } else if($_GET['id'] == 3){?>
                                                            <p> Stretching can help increase your flexibility, which is an important 
                                                            factor of fitness, but it can also improve your posture, reduce 
                                                            stress and body aches, and more. Stretching keeps the muscles 
                                                            flexible, strong, and healthy, and we need that flexibility to 
                                                            maintain a range of motion.
                                                        </p>
                                                    <?php } ?>                
                                        </div>                                        
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                            <label for="exampleInputEmail1">Service Type</label>
                                                <select name="type" class="form-control">
                                                    <?php foreach(getServiceInstruction() as $item){?>
                                                    <option value="<?= $item['service_type']; ?>"><?= $item['service_type']; ?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-primary mt-2">Submit</button>
                                        </div>
                                    </div>
                                    <?php }else{ ?>
                                        <div class="row">
                                            <h5 class="text-center col-sm-12 mb-5">Type</h5>
                                            <div class="col-sm-4 text-center">
                                                <a href="Anything" class="health_type text-decoration-none" style="color:#000000;">
                                                    <img src="assets//images/anything.png" width="100">
                                                    <h5 class="mt-2">No restrictions</h5>
                                                </a>
                                            </div>
                                            <div class="col-sm-4 text-center">
                                                <a href="Vegetarian" class="health_type text-decoration-none" style="#000000;">
                                                    <img src="assets/images/vegetarian.png" width="100">
                                                    <h5 class="mt-2">Vegetarian</h5>
                                                </a>
                                            </div>
                                            <div class="col-sm-4 text-center">
                                                <a href="Vegan" class="health_type text-decoration-none" style="#000000;">
                                                    <img src="assets/images/vegan.png" width="100">
                                                    <h5 class="mt-2">Vegan</h5>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-5 mt-5">
                                                <div class="form-group">
                                                    <label for="">What is your desired caloric intake?</label>
                                                    <input type="text" name="calories" placeholder="Calories" class="form-control">
                                                    <input type="hidden" name="type_id" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <button type="submit" class="btn btn-sm btn-primary" style="margin-top: 83px;">Start!</button>
                                                <a class="btn btn-sm btn-default btn-sm btn-primary" style="margin-top: 83px; display:inline-block; padding:.25rem .5rem;">Reset</a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12"><hr></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 mt-3 mb-3">
                                                <h4>This is your Daily Meal Planner: </h4>
                                            </div>
                                            <div class="col-sm-6" style="margin-bottom: 300px;">
                                                <?php echo calculateMeal() ; ?>
                                            </div>
                                        </div>
                                    <?php } ?>

                                <?php }else{?>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4><?php echo $_POST['type']; ?></h4>
                                        </div>

                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <input type="hidden" name="type" value="<?php echo $_POST['type']; ?>">
                                                <?php if($_POST['type'] !== 'Audio'){?>
                                                    <video class="my-3 service" controls="" height="400">
                                                        <source src="<?php echo getInstructionContent()['path']; ?>" type="video/mp4">
                                                    </video>

                                                <?php }else{ ?>
                                                    <audio controls>
                                                        <source src="<?php echo getInstructionContent()['path']; ?>" type="audio/mpeg">
                                                    </audio> 
                                                <?php }?>
                                                
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-10">
                                                    <label for="exampleInputEmail1">Duration</label>
                                                    <input type="text" class="form-control" name="duration" placeholder="Duration" <?php displayValue($_POST, 'duration'); ?> />
                                                    <?php displayError($errors, 'duration'); ?>
                                                </div>
                                                <div class="col-sm-2">
                                                    <button type="submit" class="btn btn-sm btn-primary" style="margin-top: 35px;">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }?>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            
        </div>

        <?php require_once('includes/footer.php'); ?>
    </div>
    </div>

</div>

</body>
</html>
