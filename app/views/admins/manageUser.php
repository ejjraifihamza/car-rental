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
            <h1 class="hadmin">Manage users</h1>
             <br>

            <table class="tbl-full">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                    <?php foreach($data['users'] as $user): ?>
                    
                                <tr>
                                    <td><?php echo $user->id; ?></td>
                                    <td><?php echo $user->username; ?></td>
                                    <td><?php echo $user->email; ?></td>
                                    <td>
                                        <a href="<?php echo URLROOT ?>/admins/deleteUser?id=<?php echo $user->id; ?>" class="btn-danger">Delete User</a>
                                    </td>
                                </tr>
                    <?php endforeach;?>
            </table>
          

        </div>
</div>