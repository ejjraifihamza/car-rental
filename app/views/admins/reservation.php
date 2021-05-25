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
           
        <h1 class="hadmin">Reservation</h1>


              
              <br/><br/>

            <table class="tbl-full">
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Car</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                    <?php foreach($data['reservation'] as $reservation): ?>
                    
                                <tr>
                                    <td><?php echo $reservation->id; ?></td>
                                    <td><?php echo $reservation->user_email; ?></td>
                                    <td><?php echo $reservation->car_name; ?></td>
                                    <td><?php echo $reservation->date_between; ?></td>
                                    <td>
                                        <a href="" class="btn-primary">Accept</a>
                                        
                                    </td>
                                </tr>
                    <?php endforeach;?>
            </table>
          

        </div>
</div>
