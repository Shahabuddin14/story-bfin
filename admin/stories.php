<?php 
    include"include/config.php"; 
    session_start();

    if(strlen($_SESSION['login'])==0){  
        header('location:index.php');
    }
    else{
        
        if(isset($_GET['del'])){
            mysqli_query($connection,"DELETE FROM stories WHERE id = '".$_GET['id']."'");
            $_SESSION['delmsg']="Teacher deleted";
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
                                            <th>Publisher Name</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Image Cation</th>
                                            <th>Tags</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
                                            $query = "SELECT * FROM stories ";
                                            $select_query = mysqli_query($connection, $query);

                                            $cnt = 1;
                                            while($row = mysqli_fetch_assoc($select_query)){
                                            $id = $row['id'];
                                            $name = $row['name'];
                                            $title = $row['title'];
                                            $body = $row['body'];
                                            $image = $row['image'];
                                            $caption = $row['caption'];
                                            $tags = $row['tags'];
                                            $status = $row['status'];
                                        ?>

                                        <tr>
                                            <td><?php echo $cnt ;?></td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $title; ?></td>
                                            
                                            <td><img src="../images/stories/<?php echo $image; ?>" alt="" style="width: 50px"></td>
                                            <td><?php echo $caption; ?></td>
                                            <td><?php echo $tags; ?></td>
                                            <td><?php echo $status; ?></td>
                                            <td>
                                                <a href="view-story.php?id=<?php echo $row['id']?>" ><i class="icon-edit"></i></a>
                                                <a href="view-comment.php?id=<?php echo $row['id']?>" ><i class="icon-comments"></i></a>
                                                <a href="stories.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you want to delete?')"><i class="icon-trash"></i></a>
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