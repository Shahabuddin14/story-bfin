<?php 
    error_reporting(0);
    session_start();
    include "includes/db.php";
    include "includes/header.php";

    if(strlen($_SESSION['login'])==0){  
        header('location:index.php');
    }
    else{
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
                        <li><a href="index.html">Home</a></li>
                        <li><?php echo htmlentities($_SESSION['username']);?></li>
                    </ol>
                </div>
            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="sidebar">
                            <div class="sidebar-item categories"> <?php include"includes/side_bar.php"; ?></div><!-- End sidebar categories-->
                        </div><!-- End sidebar -->
                    </div><!-- End blog sidebar -->

                    <div class="col-lg-8 entries">
                        <section id="services" class="services">
                            <div class="row">
                                <div class="col-md-4">

                                    <?php

                                        $query = "SELECT * FROM stories WHERE userId = '".$_SESSION['id']."'";

                                        if ($select_query = mysqli_query($connection, $query)){
                                            $rowcount=mysqli_num_rows($select_query);
                                        }
                                    ?>

                                    <div class="icon-box">
                                        <i class="icofont-book"></i>
                                        <h4><a href="view-story.php">All Story (<?php echo $rowcount; ?>)</a></h4> 
                                    </div>
                                </div>

                                <div class="col-md-4">

                                    <?php
         
                                        $query = "SELECT * FROM stories WHERE userId = '".$_SESSION['id']."' AND status = 'Unlisted' ";

                                        if ($select_query = mysqli_query($connection, $query)){
                                            $rowcount=mysqli_num_rows($select_query);
                                        }
                                    ?>

                                    <div class="icon-box">
                                        <i class="icofont-ui-block"></i>
                                        <h4><a href="#">Pending story(<?php echo $rowcount; ?>)</a></h4>
                                    </div>
                                </div>

                                <div class="col-md-4">

                                    <?php

                                        $query = "SELECT * FROM comments WHERE userId = '".$_SESSION['id']."'";

                                        if ($select_query = mysqli_query($connection, $query)){
                                            $rowcount=mysqli_num_rows($select_query);
                                        }
                                    ?>

                                    <div class="icon-box">
                                        <i class="icofont-comment"></i>
                                        <h4><a href="#">Comments (<?php echo $rowcount; ?>)</a></h4>
                                    </div>
                                </div>
                            </div>
                        </section>             
                    </div><!-- End blog entries list -->
                </div>
            </div>
        </section><!-- End Blog Section -->
    </main><!-- End #main -->

<?php include "includes/footer.php"; } ?>
