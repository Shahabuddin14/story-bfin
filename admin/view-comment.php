<?php 

    include"include/config.php"; 
    session_start(); 
    if(strlen($_SESSION['login'])==0){  
        header('location:index.php');
    }
    else{

        if(isset($_GET['del'])){
            mysqli_query($connection,"DELETE FROM comments WHERE id = '".$_GET['id']."'");
            $_SESSION['delmsg']="Comment deleted";
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
                                    <h2>Stories</h2>
                                </div>
                                <table class="table table-striped table-bordered table-condensed datatable-1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Commentator Name</th>
                                            <th>Comment</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
                                            $query = "SELECT DISTINCT(comment), comments.id AS commentId, users.name AS userName FROM users, comments, stories WHERE users.id = comments.userId AND comments.storyId = '".$_GET['id']."' ";
                                            $select_query = mysqli_query($connection, $query);

                                            $cnt = 1;
                                            while($row = mysqli_fetch_assoc($select_query)){
                                                $id = $_GET['id'];
                                                $commentId = $row['commentId'];
                                                $userName = $row['userName'];
                                                $comment = $row['comment'];
                                        ?>

                                        <tr>
                                            <td><?php echo $cnt ;?></td>
                                            <td><?php echo $userName; ?></td>
                                            <td><?php echo $comment; ?></td>
                                            
                                            <td>
                                                <a href="view-comment.php?id=<?php echo $row['commentId']?>&del=delete" onClick="return confirm('Are you want to delete?')"><i class="icon-trash"></i></a>
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
<?php include"include/footer.php"; } ?>