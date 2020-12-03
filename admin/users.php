<?php 
    include"include/config.php"; 
    session_start();


    if(strlen($_SESSION['login'])==0){  
        header('location:index.php');
    }
    else{

    if(isset($_GET['del'])){
        mysqli_query($connection,"DELETE FROM users WHERE id = '".$_GET['id']."'");
        $_SESSION['delmsg']="User deleted";
    }


?>
  
<?php include"include/header.php"; ?>
<div class="wrapper">
    <div class="container">
        <div class="row">
            <?php include"include/sidebar.php"; ?>
            <!--/.span3-->
            <div class="span9">
                <div class="content">
                    <div class="btn-controls">
                        <div class="btn-box-row row-fluid"> 
                           
                              <div class="module">
                                <div class="module-head">                               
                            <h2><strong>List of users</strong></h2>
                            <table class="table table-striped table-bordered table-condensed datatable-1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User Image</th>
                                        <th>User Name</th>
                                        <th>User Email</th>
                                        <th>Gender</th>
                                        <th>Phone Number</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php 
                                        $query = "SELECT * FROM users ";
                                        $select_query = mysqli_query($connection, $query);

                                        $cnt = 1;
                                        while($row = mysqli_fetch_assoc($select_query)){
                                            $name = $row['name'];
                                            $email = $row['email'];
                                            $image = $row['image'];
                                            $gender = $row['gender'];
                                            $phone = $row['phone'];
                                    ?>

                                    <tr>
                                        <td><?php echo $cnt ;?></td>
                                        <td><img src="../images/users/<?php echo $image; ?>" alt="" style="width:50px"></td>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $gender; ?></td>
                                        <td><?php echo $phone; ?></td>
                                        <td>
                                            <a href="users.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you want to delete?')"><i class="icon-trash"></i></a>
                                        </td>
                                        
                                    </tr> <?php $cnt=$cnt+1; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--/.content-->
            </div>
            <!--/.span9-->
        </div>
    </div>
    <!--/.container-->
</div>
</div>
</div>
<!--/.wrapper-->
<?php include"include/footer.php"; } ?>