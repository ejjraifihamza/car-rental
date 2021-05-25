<?php

    require APPROOT . '/views/includes/head.php';

?>



    <div class="main-content1">
        <a href="<?php echo URLROOT ?>/pages/index" class="btn-zero2">Home</a>
        <div class="wrrapper1">
            <h1 class="hadmin">Choose you'r car</h1>
                <br><br>
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
                        <input type="text" name="car_name" placeholder="Car Name *" value="<?php echo $car->title ?? '' ?>">
                        <span class="invalidFeedback">
                            <?php echo $data['carError']; ?>
                        </span>
                    </td>
                    
                </tr>

                <tr>
                    <td>Date</td>
                    <td>
                        <input type="text" name="date_between" placeholder="dd/mm/yy To dd/mm/yy *" value="<?php echo $data['date_between'] ?? '' ?>">
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
    </div>