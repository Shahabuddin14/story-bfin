<?php 
    error_reporting(0);
    session_start();
    include "includes/db.php";
    include "includes/header.php";
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
                        <!--<li>Blog</li>-->
                    </ol>
                </div>
            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container">
                <div class="row">
                    <?php 
                    
                        $query = "SELECT * FROM stories WHERE status = 'Listed' ";
                        $select_story_query = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_assoc($select_story_query)){
                            $id = $row['id'];
                            $name = $row['name'];
                            $title = $row['title'];
                            $body = $row['body'];
                            $image = $row['image'];
                            $date = $row['date'];
                            $time = date('Y-m-d', strtotime($date));

                    ?>

                    <div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                        <article class="entry">
                            <div class="entry-img">
                                <img src="images/stories/<?php echo $image; ?> " alt="" class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                                <a href="story-single.php?title=<?php echo $title; ?>"><?php echo $title; ?></a>
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href=""><?php echo $name; ?></a></li>
                                    <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href=""><time><?php echo $time; ?></time></a></li>
                                </ul>
                            </div>

                            <div class="entry-content">
                                <p><?php echo mb_strimwidth($body, 0, 150, "..."); ?></p>
                                <div class="read-more">
                                    <a href="story-single.php?title=<?php echo $title; ?>">Read More</a>
                                </div>
                            </div>
                        </article><!-- End blog entry -->
                    </div> <?php } ?>
                </div>
            </div>
        </section><!-- End Blog Section -->
    </main><!-- End #main -->

<?php include "includes/footer.php"; ?>