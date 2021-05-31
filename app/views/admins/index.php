<?php
   require APPROOT . '/views/includes/head.php';
?>

<div class="nav-bar">
<?php
   require APPROOT . '/views/includes/admin-nav.php';
?>
</div>



<div class="main-content">
        <div class="wrrapper">
            <div class="hd">
            <h1 class="hadmin">Dashboard</h1>
            </div>
            <br><br>
            <div class="fc">
            <?php
    
            
                if(isset($_SESSION['loginAdmin']))
                {
                    echo $_SESSION['loginAdmin'];
                    unset($_SESSION['loginAdmin']);
                }
    
             ?>

             </div>
             <canvas id="myChart"></canvas>
        </div>
    </div>
<?php
   require APPROOT . '/views/includes/footer.php';
?>