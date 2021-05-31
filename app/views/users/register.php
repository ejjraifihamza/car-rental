<?php
   require APPROOT . '/views/includes/head.php';
?>

<div class="nav-bar">
    <?php
    require APPROOT . '/views/includes/navigation.php';
    ?>
</div>

<div class="container-login">
    <div class="wrapper-login">
        <div class="hd">
        <h2 class="hadmin3">Register</h2>
        </div>

        <form action="<?php echo URLROOT; ?>/users/register" method ="POST">
        <input type="text" placeholder="Username *" name="username" value="<?php echo ($_POST['username']) ?? '' ?>">
        <span class="invalidFeedback">
            <?php echo $data['usernameError']; ?>
        </span>

        <input type="email" placeholder="Email *" name="email" value="<?php echo ($_POST['email']) ?? '' ?>">
        <span class="invalidFeedback">
            <?php echo $data['emailError']; ?>
        </span>

        <input type="password" placeholder="Password *" name="password" value="<?php echo ($_POST['password']) ?? '' ?>">
        <span class="invalidFeedback">
            <?php echo $data['passwordError']; ?>
        </span>

        <input type="password" placeholder="Confirm Password *" name="confirmPassword" value="<?php echo ($_POST['confirmPassword']) ?? '' ?>">
        <span class="invalidFeedback">
            <?php echo $data['confirmPasswordError']; ?>
        </span>
        <br>

        <button class="submit" type="submit" value="submit">Submit</button>
        <p class="options">Already have an account? <a href="<?php echo URLROOT; ?>/users/login">Sign in</a></p>
        </form>
    </div>
</div>