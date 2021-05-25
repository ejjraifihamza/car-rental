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
        <h1 class="hadmin">Change Password</h1>

        
        <br><br>

        <?php 
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        ?>

        <form action="<?php echo URLROOT; ?>/admins/updatePassword" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Current Password</td>
                    <td>
                        <input required type="password" name="currentPassword" placeholder="Current Password*">
                    </td>
                </tr>

                <tr>
                    <td>New Password</td>
                    <td>
                        <input required type="password" name="newPassword" placeholder="New Password*">
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password</td>
                    <td>
                        <input required type="password" name="confirmPassword" placeholder="Confirm Password*">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>
            </table>
            </form>
    </div>
</div>