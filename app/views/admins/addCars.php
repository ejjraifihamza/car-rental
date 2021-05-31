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
        <h1 class="hadmin">Add Car</h1>
        </div>

        
        <br><br>

        <form action="<?php echo URLROOT; ?>/admins/addCars" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title</td>
                    <td>
                        <input required type="text" name="title" placeholder="Car title*">
                    </td>
                </tr>

                <tr>
                    <td>Price/Day</td>
                    <td>
                        <input required type="text" name="price" placeholder="Price/Day*">
                    </td>
                </tr>

                <tr>
                    <td>choose image</td>
                    <td>
                        <input type="file" name="image_name">
                    </td>
                </tr>


                <tr>
                    <td>Active</td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="submit" name="submit" value="Add Car" class="submit-r">
                    </td>
                </tr>

            </table>

        </form>
    </div>
</div>