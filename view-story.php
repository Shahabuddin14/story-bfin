<?php 
    error_reporting(0);
    session_start();
    include "includes/db.php";
    include "includes/header.php";

    if(strlen($_SESSION['login'])==0){  
    header('location:index.php');
    }
    else{

    if(isset($_GET['del'])){
        mysqli_query($connection,"DELETE FROM stories WHERE id = '".$_GET['id']."'");
        $_SESSION['delmsg']="Teacher deleted";
    }
?>
 
<body>

    <?php include "includes/nav.php"; ?>

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Home</h2>
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li><?php echo htmlentities($_SESSION['username']);?></li>
                    </ol>
                </div>
            </div>
            </section><!-- End Breadcrumbs -->
            
            <!-- ======= Blog Section ======= -->
            <section id="blog" class="blog">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="sidebar">
                                <div class="sidebar-item categories"> <?php include"includes/side_bar.php"; ?></div><!-- End sidebar categories-->
                            </div><!-- End sidebar -->
                        </div><!-- End blog sidebar -->

                        <div class="col-lg-9">
                            <table class="table table-striped table-bordered table-condensed">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Image</th>
                                        <th>Cation</th>
                                        <th>Tags</th>
                                        <th>Status</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                        $query = "SELECT * FROM stories WHERE userId = '".$_SESSION['id']."' ";
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
                                        <td><?php echo $title; ?></td>
                                        <td><?php echo $body; ?></td>

                                        <td><img src="images/stories/<?php echo $image; ?>" alt="" style="width: 50px"></td>
                                        <td><?php echo $caption; ?></td>
                                        <td><?php echo $tags; ?></td>
                                        <td><?php echo $status; ?></td>
                                        <td>
                                            <a href="view-story.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you want to delete?')"><i class="icofont-ui-delete"></i></a>
                                        </td>
                                    </tr> <?php $cnt=$cnt+1; } ?>
                                </tbody>
                            </table>
                        </div><!-- End blog entries list -->
                    </div>
                </div>
            </section><!-- End Blog Section -->
        
        </main><!-- End #main -->

<?php include"includes/footer.php"; } ?>
