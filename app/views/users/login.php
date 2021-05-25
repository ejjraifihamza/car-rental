<?php
   require APPROOT . '/views/includes/head.php';
?>

<div class="nav-bar">
    <?php
    require APPROOT . '/views/includes/navigation.php';
    ?>
</div>

<div class="container-login">
    <div class="fc">
        <?php
        if(isset($_SESSION['register']))
        {
            echo $_SESSION['register'];
            unset($_SESSION['register']);
        }

        ?>
    </div>
    <div class="wrapper-login">
        <h2>Sign in</h2>

        <form action="<?php echo URLROOT; ?>/users/login" method ="POST">
        <input type="text" placeholder="Username *" name="username" value="<?php echo ($_POST['username']) ?? '' ?>">
        <span class="invalidFeedback">
            <?php echo $data['usernameError']; ?>
        </span>

        <input type="password" placeholder="Password *" name="password">
        <span class="invalidFeedback">
            <?php echo $data['passwordError']; ?>
        </span>
            <br>
        <button class="submit" type="submit" value="submit">Submit</button>
        <p class="options">Not register yet? <a href="<?php echo URLROOT; ?>/users/register">Create an account!</a></p>
        </form>
    </div>
</div>