<?php

    require APPROOT . '/views/includes/head.php';

?>

<div class="nav-bar">
    <?php
    require APPROOT . '/views/includes/navigation.php';
    ?>
</div>
<br><br><br>
<div class="section-cars">
    <div class="container-cars">
        <div class="testing">
        <h2 class="text-centre text-one">Choose your car</h2>
        <span class="text-two">Now</span>
        </div>
            <br>
            <?php foreach($data['cars'] as $car): ?>
            <div class="flex">
                <br><br>

                <div class="car">

                    <img src="<?php echo URLROOT; ?>/public/up-img/<?php echo $car->image_name; ?>" alt="<?php echo $car->title; ?>" height="400px" weight="400px">
                    <p><?php echo $car->title; ?></p>

                </div>

                <div class="reserv-car">

                <a href="<?php echo URLROOT ?>/users/reservation?title=<?php echo $car->title; ?>&image_name=<?php echo $car->image_name; ?>" class="btn-zero2">Reserve now</a>

                </div>
            
            </div>

            <?php endforeach;?>


    </div>
</div>

<?php

    require APPROOT . '/views/includes/footer.php';

?>