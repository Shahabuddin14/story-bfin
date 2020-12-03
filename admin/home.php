<?php 
    include"include/config.php"; 
    session_start();
   if(strlen($_SESSION['login'])==0){  
        header('location:index.php');
    }
    else{
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
                            <?php 
                                $query = "SELECT * FROM users ";

                                if ($select_query = mysqli_query($connection, $query)){
                                    $rowcount=mysqli_num_rows($select_query);
                                }
                            ?>

                            <a href="users.php" class="btn-box big span4"><i class="icon-group"></i><b><?php echo $rowcount; ?></b>
                                <p class="text-muted">Users</p>
                            </a>

                            <?php 
                                $query = "SELECT * FROM stories ";

                                if ($select_query = mysqli_query($connection, $query)){
                                    $rowcount=mysqli_num_rows($select_query);
                                }
                            ?>

                            <a href="stories.php" class="btn-box big span4"><i class="icon-book"></i><b><?php echo $rowcount; ?></b>
                                <p class="text-muted">Stories</p>
                            </a>

                            <?php 
                                $query = "SELECT * FROM comments ";

                                if ($select_query = mysqli_query($connection, $query)){
                                    $rowcount=mysqli_num_rows($select_query);
                                }
                            ?>

                            <a href="#" class="btn-box big span4"><i class="icon-comments"></i><b><?php echo $rowcount; ?></b>
                                <p class="text-muted">All comments</p>
                            </a>
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
<?php include"include/footer.php"; } ?>