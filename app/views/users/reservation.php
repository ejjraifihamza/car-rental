<?php

    require APPROOT . '/views/includes/head.php';

?>

<?php 
            if(isset($_GET['title']))
            {
                $title=$_GET['title'];
            };

            if(isset($_GET['image_name']))
            {
                $image=$_GET['image_name'];
            }
        ?>

    <div class="main-content1">
        
        <a href="<?php echo URLROOT ?>/pages/index" class="btn-zero2">Home</a>

      <div class="wrrapper1">
                <div class="hd">
                    <h1 class="hadmin">Choose you'r car</h1>
                </div>
                <br><br>

        <div class="all">


            <div class="left">

                        <form action="<?php echo URLROOT; ?>/users/reservation" method="POST">
                        
                        <table class="tbl-30">
                        <tr>
                            <td width="100">Email</td>
                            <td>
                                <input type="text" name="user_email" placeholder="Email *" value="<?php echo $data['user_email'] ?? '' ?>">
                                <span class="invalidFeedback">
                                    <?php echo $data['emailError']; ?>
                                </span>
                            </td>
                            
                        </tr>

                        <tr>
                            <td>Car Name</td>
                            <td>
                                <input type="text" name="car_name" placeholder="Car name *" value="<?php echo $title ?? '' ?>">
                                <span class="invalidFeedback">
                                    <?php echo $data['carError']; ?>
                                </span>
                            </td>
                            
                        </tr>

                        <tr>
                            <td>Start</td>
                            <td>
                                <input type="date" name="begin">
                                <span class="invalidFeedback">
                                    <?php echo $data['dateError']; ?>
                                </span>
                            </td>
                            
                        </tr>

                        <tr>
                            <td>Finish</td>
                            <td>
                                <input type="date" name="finish">
                                <span class="invalidFeedback">
                                    <?php echo $data['dateError']; ?>
                                </span>
                            </td>
                            
                        </tr>

                        
                        
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="submit" value="submit" class="submit-r">

                            </td>
                        </tr>
                        </table>

                        </form>
            </div>


            <div class="right">
                    
                    <div class="sh-img">
                        <img src="<?php echo URLROOT; ?>/public/up-img/<?php echo $image; ?>" alt="<?php echo $title; ?>" class="bg">
                        <h4 class="hadmin2"><?php echo $title; ?></h4>
                    </div>

             </div>

        </div>
        </div>
    </div>