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
            <h1 class="hadmin">Manage Cars</h1>
                <br>
              <a href="<?php echo URLROOT ?>/admins/addCars" class="btn-zero2">Add Car</a>
              <br/><br/><br/>

            <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>Car name</th>
                    <th>Price/d</th>
                    <th>Car image</th>
                    <th>Active</th>
                </tr>

                <?php foreach($data['cars'] as $car): ?>
                                <tr>
                                    <td><?php echo $car->id; ?></td>
                                    <td><?php echo $car->title; ?></td>
                                    <td><?php echo $car->price; ?></td>
                                    <td><img src="<?php echo URLROOT; ?>/public/up-img/<?php echo $car->image_name; ?>" alt="<?php echo $car->title; ?>" class="bg"></td>
                                    <td>
                                        <a href="" class="btn-secondary">Update Car</a>
                                        <a href="" class="btn-danger">Delete Car</a>
                                    </td>
                                </tr>
                <?php endforeach;?>
            </table>
          

        </div>
</div>