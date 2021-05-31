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
        <h1 class="hadmin">Add Admin</h1>
        </div>
        <br><br>

        <form action="<?php echo URLROOT; ?>/admins/addAdmins" method="POST">

        <table class="tbl-30">
            <tr>
                <td>Username</td>
                <td>
                     <input type="text" name="username" placeholder="Username *" value="<?php echo $data['username'] ?? '' ?>">
                     <span class="invalidFeedback">
                        <?php echo $data['usernameError']; ?>
                     </span>
                </td>
                
            </tr>

            <tr>
                <td>Email</td>
                <td>
                    <input type="text" name="email" placeholder="Email *" value="<?php echo $data['email'] ?? '' ?>">
                    <span class="invalidFeedback">
                        <?php echo $data['emailError']; ?>
                    </span>
                </td>
                
            </tr>

            <tr>
                <td>Password</td>
                <td>
                    <input type="password" name="password" placeholder="Password *" value="<?php echo $data['password'] ?? '' ?>">
                    <span class="invalidFeedback">
                        <?php echo $data['passwordError']; ?>
                    </span>
                </td>
                
            </tr>

            <tr>
                <td>Confirm Password</td>
                <td>
                    <input type="password" name="confirmPassword" placeholder="Confirm Password *" value="<?php echo ($_POST['confirmPassword']) ?? '' ?>">
                    <span class="invalidFeedback">
                        <?php echo $data['confirmPasswordError']; ?>
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