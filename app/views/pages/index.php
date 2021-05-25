<?php

    require APPROOT . '/views/includes/head.php';

?>

<div class="section-landing">
    <?php
       require APPROOT . '/views/includes/navigation.php';

       ?>
       <br><br><br>
       <div class="fc">
       <?php
    
            
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }

            if(isset($_SESSION['reservation']))
            {
                echo $_SESSION['reservation'];
                unset($_SESSION['reservation']);
            }
            
            ?>
        </div>

    <div class="wrapper-landing">
        <div class="decoration">
        <h1 class="text-1">Your satisfaction is our main aim</h1>
        <span class="text-2">Enjoy your holidays with our wheels.</span>
        </div>
        <br><br>
        <a href="<?php echo URLROOT ?>/pages/cars" class="btn-zero22">See our cars</a>
    </div>
</div>


