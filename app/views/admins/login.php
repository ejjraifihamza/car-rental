<?php
   require APPROOT . '/views/includes/head.php';
?>

<div class="container-login">
    <br><br>
    <div class="wrapper-login">
        <h2>Sign in</h2>

        <form action="<?php echo URLROOT; ?>/admins/login" method ="POST"> 
        <input type="text" placeholder="Username *" name="username" value="<?php echo $data['username'] ?? '' ?>">
        <span class="invalidFeedback">
            <?php echo $data['usernameError']; ?>
        </span>
        <input type="password" placeholder="Password *" name="password">
        <span class="invalidFeedback">
            <?php echo $data['passwordError']; ?>
        </span>
        <button class="submit" type="submit" value="submit">Submit</button>
        </form>
    </div>
</div>