<nav class="top-nav">
    <ul>
        <li>
            <a href="<?php echo URLROOT ?>/admins/index">Home</a>
        </li>
        <li>
            <a href="<?php echo URLROOT ?>/admins/manageCars">Cars</a>
        </li>
        <li>
            <a href="<?php echo URLROOT ?>/admins/reservation">Reservation</a>
        </li>
        <li>
            <a href="<?php echo URLROOT ?>/admins/manageAdmins">Admins</a>
        </li>
        <li>
            <a href="<?php echo URLROOT ?>/admins/manageUser">Users</a>
        </li>
        <li class="btn-login">
            <?php if(isset($_SESSION['user_id'])) : ?> 
                <a href="<?php echo URLROOT; ?>/admins/logout">Log out</a>
            <?php else : ?>
                <a href="<?php echo URLROOT; ?>/admins/login">Log in</a>
            <?php endif; ?> 
        </li>
    </ul>
</nav>