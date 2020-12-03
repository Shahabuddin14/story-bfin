<?php 

    include"include/config.php"; 
    session_start();

    if(strlen($_SESSION['login'])==0){  
        header('location:index.php');
    }
    else{

        if(isset($_POST['admin'])){
            
            $username = $_POST['username'];
            $password=md5($_POST['password']);
            $sql = mysqli_query($connection,"INSERT INTO admin ( username, password, creationDate ) values ('$username', '$password', now()) ");
            $_SESSION['msg']="Admin added";
        }

        if(isset($_GET['del'])){
            mysqli_query($connection,"DELETE FROM admin WHERE id = '".$_GET['id']."'");
            $_SESSION['delmsg']="Adnmin deleted";
        }
?>
  
<?php include"include/header.php"; ?>
<div class="wrapper">
    <div class="container">
        <div class="row">
            <?php include"include/sidebar.php"; ?>
            <!--/.span3-->
            <div class="span9">
                <div class="module">
                    <div class="module-head">
                        <h2>Add admin</h2>
                    </div>
                    <form class="form-inline" method="post" action="admin.php">
                        <div class="form-group">
                            <div class="controls">
                                <label class="control-label" for="basicinput">Add admin</label>
                                <input type="text" name="username" class="form-control" required> 
                                <input type="password" name="password" class="form-control" required> 
                                <button type="submit" name="admin" class="btn btn-primary">Add admin</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="span9">
                <div class="content">
                    <div class="btn-controls">
                        <div class="btn-box-row row-fluid">                               
                            <div class="module">
                                <div class="module-head">
                                    <h2>All admin</h2>
                                </div>
                                
                                <table class="table table-striped table-bordered table-condensed datatable-1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
                                            $query = "SELECT * FROM admin ";
                                            $select_query = mysqli_query($connection, $query);

                                            $cnt = 1;
                                            while($row = mysqli_fetch_assoc($select_query)){
                                                $name = $row['username']; 
                                        ?>

                                        <tr>
                                            <td><?php echo $cnt ;?></td>
                                            <td><?php echo $name; ?></td>
                                            <td>
                                                <a href="admin.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you want to delete?')"><i class="icon-trash"></i></a>
                                            </td>
                                        </tr> <?php $cnt=$cnt+1; } ?>
                                    </tbody>
                                </table>
                            </div>
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
<!--/.wrapper-->
<?php include"include/footer.php";  } ?>