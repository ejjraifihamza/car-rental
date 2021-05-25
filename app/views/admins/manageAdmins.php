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
            <h1 class="hadmin">Manage Admin</h1>
             <br>
            <div class="fc">
             <?php
            
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset ($_SESSION['add']);
                    }
             ?>
             
            </div>
             <br>

              <a href="<?php echo URLROOT ?>/admins/addAdmins" class="btn-zero2">Add Admin</a>
              <br/><br/><br/>

            <table class="tbl-full">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                    <?php foreach($data['admins'] as $admin): ?>
                    
                                <tr>
                                    <td><?php echo $admin->id; ?></td>
                                    <td><?php echo $admin->username; ?></td>
                                    <td><?php echo $admin->email; ?></td>
                                    <td>
                                        <a href="<?php echo URLROOT ?>/admins/updatePassword?id=<?php echo $admin->id; ?>" class="btn-primary">Change Password</a>
                                        <a href="<?php echo URLROOT ?>/admins/updateAdmin?id=<?php echo $admin->id; ?>" class="btn-secondary">Update Admin</a>
                                        <a href="<?php echo URLROOT ?>/admins/deleteAdmin?id=<?php echo $admin->id; ?>" class="btn-danger">Delete Admin</a>
                                    </td>
                                </tr>
                    <?php endforeach;?>
            </table>
          

        </div>
</div>