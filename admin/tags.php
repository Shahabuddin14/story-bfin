<?php 

    include"include/config.php"; 
    session_start();

    if(strlen($_SESSION['login'])==0){  
        header('location:index.php');
    }
    else{

        if(isset($_POST['add_tag'])){
            $name = $_POST['name'];
            $sql = mysqli_query($connection,"INSERT INTO tags ( name ) values('$name') ");
            $_SESSION['msg']="Tag added";
        }

        if(isset($_GET['del'])){
            mysqli_query($connection,"DELETE FROM tags WHERE id = '".$_GET['id']."'");
            $_SESSION['delmsg']="Tag deleted";
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
                        <h2>Add tag</h2>
                    </div>
                    <form class="form-inline" method="post" action="tags.php">
                        <div class="form-group">
                            <div class="controls">
                                <label class="control-label" for="basicinput">Add tag</label>
                                <input type="text" name="name" class="form-control" required> <button type="submit" name="add_tag" class="btn btn-primary">Add tag</button>
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
                                    <h2>All tag</h2>
                                </div>
                                
                                <table class="table table-striped table-bordered table-condensed datatable-1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tag Name</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
                                            $query = "SELECT * FROM tags ";
                                            $select_query = mysqli_query($connection, $query);

                                            $cnt = 1;
                                            while($row = mysqli_fetch_assoc($select_query)){
                                                $id = $row['id'];
                                                $name = $row['name'];     
                                        ?>

                                        <tr>
                                            <td><?php echo $cnt ;?></td>
                                            <td><?php echo $name; ?></td>
                                            <td>
                                                <a href="tags.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you want to delete?')"><i class="icon-trash"></i></a>
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