<?php 

    error_reporting(0);
    session_start();
    include "includes/db.php";
    include "includes/header.php";

    if(strlen($_SESSION['login'])==0){  

        if(isset($_GET['title'])){
            $title = $_GET['title'];

            $query = "SELECT * FROM stories WHERE title = '$title' ";
            $select_query = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc( $select_query)){
                $id = $row['id'];
                $name = $row['name'];
                $title = $row['title'];
                $body = $row['body'];
                $image = $row['image'];
                $caption = $row['caption'];
                $tags = $row['tags'];
                $date = $row['date'];
                $time = date('Y-m-d', strtotime($date));

?> 

<body>

    <?php include "includes/nav.php"; ?>

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2><?php echo $title; ?></h2>
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li><a href=""><?php echo $name; ?></a></li>
                    </ol>
                </div>
            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 entries">
                        <article class="entry entry-single">
                            <div class="entry-img">
                                <img src="images/stories/<?php echo $image; ?>" alt="" class="img-fluid">
                            </div>

                            <h6 style="font-style: italic;"><?php echo $caption; ?></h6>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href=""><?php echo $name; ?></a></li>
                                    <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href=""><time ><?php echo $time; ?></time></a></li>
                                </ul>
                            </div>

                            <div class="entry-content">
                                <p><?php echo $body; ?></p>
                            </div>

                            <div class="entry-footer clearfix">
                                <div class="float-left">
                                    <i class="icofont-tags"></i>
                                    <ul class="cats">
                                        <li><a href="tag-view.php?tags=<?php echo $tags; ?>"><?php echo $tags; ?></a></li>
                                    </ul>
                                </div>
                            </div>
                        </article><!-- End blog entry -->
                    </div><!-- End blog entries list -->

                    <div class="col-lg-4">
                        <div class="sidebar">
                            <h3 class="sidebar-title">Search</h3>
                               <div class="sidebar-item search-form">
                                <form action="search.php" method="post">
                                    <input type="text" name="search" required>
                                    <button type="submit" name="search_btn"><i class="icofont-search"></i></button>
                                </form>
                            </div> <!-- End sidebar search formn -->
                            

                            <h3 class="sidebar-title">Recent Posts</h3>
                            
                            <div class="sidebar-item recent-posts">

                                <?php 

                                    $query = "SELECT * FROM stories WHERE status = 'Listed' ORDER BY date DESC LIMIT 4";
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
                                
                                <div class="post-item clearfix">
                                    <img src="images/stories/<?php echo $image; ?>" alt="">
                                    <h4><a href="story-single.php?title=<?php echo $title; ?>"> <?php echo $title; ?></a></h4>
                                    <time><?php echo $time; ?></time>
                                </div> <?php } ?>
                            </div><!-- End sidebar recent posts-->
                            
                            <h3 class="sidebar-title">Tags</h3>

                            <div class="sidebar-item tags">
                                <div class="row">
                                
                                <?php
                
                                    $query = "SELECT * FROM tags";
                                    $select_story_query = mysqli_query($connection, $query);

                                    while($row = mysqli_fetch_assoc($select_story_query)){
                                        $name = $row['name'];
                                    
                                ?>
                                
                                <div class="col-4">
                                    <ul>
                                        <li><a href="tag-view.php?tags=<?php echo $name; ?>"><?php echo $name; ?></a></li>
                                    </ul>
                                    </div><?php } ?>
                                </div>
                            </div> 
                        </div><!-- End sidebar -->
                    </div><!-- End blog sidebar -->
                </div>
            </div>
        </section><!-- End Blog Section -->
    </main><!-- End #main -->

<?php    } } } else { 

    if(isset($_GET['title'])){
        $title = $_GET['title'];
        $query = "SELECT * FROM stories WHERE title = '$title' ";
        $select_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc( $select_query)){
            $id = $row['id'];
            $name = $row['name'];
            $title = $row['title'];
            $body = $row['body'];
            $image = $row['image'];
            $caption = $row['caption'];
            $tags = $row['tags'];
            $date = $row['date'];
            $time = date('Y-m-d', strtotime($date));

    ?> 

<body>

    <?php include "includes/nav.php"; ?>
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2><?php echo $title; ?></h2>
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li><a href=""><?php echo $name; ?></a></li>
                    </ol>
                </div>
            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 entries">
                        <article class="entry entry-single">
                            <div class="entry-img">
                                <img src="images/stories/<?php echo $image; ?>" alt="" class="img-fluid">
                            </div>

                            <h6 style="font-style: italic;"><?php echo $caption; ?></h6>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href=""><?php echo $name; ?></a></li>
                                    <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href=""><time ><?php echo $time; ?></time></a></li>
                                </ul>
                            </div>

                            <div class="entry-content">
                                <p><?php echo $body; ?></p>
                            </div>

                            <div class="entry-footer clearfix">
                                <div class="float-left">
                                    <i class="icofont-tags"></i>
                                    <ul class="cats">
                                        <li><a href="tag-view.php?tags=<?php echo $tags; ?>"><?php echo $tags; ?></a></li>
                                    </ul>
                                </div>

                                <div class="blog-comments">

                                    <?php 
            
                                        $query = "SELECT DISTINCT(comment), users.image AS userImage, users.name AS userName,time  FROM users, comments, stories WHERE users.id = comments.userId AND comments.storyId = '$id' ";
                                        $select_query = mysqli_query($connection, $query);
            
                                        while($row = mysqli_fetch_assoc($select_query)){

                                            $userImage = $row['userImage'];
                                            $userName = $row['userName'];
                                            $time = $row['time'];
                                            $date = date('Y-m-d', strtotime($time));
                                            $comment = $row['comment'];
                                    ?>

                                    <div id="comment-1" class="comment clearfix">
                                        <img src="images/users/<?php echo $userImage; ?>" class="comment-img  float-left" alt="">
                                        <h5><a href=""><?php echo $userName; ?></a> </h5>
                                        <time><?php echo $date ?></time>
                                        <p><?php echo $comment; ?></p>
                                    </div><?php } ?>

                                    <div class="reply-form">
                                        <h4>Leave a Reply</h4>
                                        
                                        <?php
            
                                            $query = "SELECT users.id AS userId, stories.id AS storyId from users, stories WHERE stories.id = '$id' AND users.id = '".$_SESSION['id']."' ";
                                            $select_query = mysqli_query($connection, $query);

                                            while($row = mysqli_fetch_assoc($select_query)){

                                                $userId = $row['userId'];
                                                $storyId = $row['storyId'];

                                                if(isset($_POST['addComment'])){
                                                    $commentUserId = $userId;
                                                    $commentStoryId = $storyId;
                                                    $comment = $_POST['comment'];
                                                    
                                                    $sql = mysqli_query($connection,"INSERT INTO comments (userId, storyId, comment, time) values('$commentUserId','$commentStoryId', '$comment', now())");

                                                 }
                                            }
                                        ?>    

                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col form-group">
                                                    <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary" name="addComment">Post Comment</button>
                                        </form>
                                    </div>
                                </div><!-- End blog comments -->
                            </div>
                        </article><!-- End blog entry -->
                    </div><!-- End blog entries list -->

                    <div class="col-lg-4">
                        <div class="sidebar">
                            <h3 class="sidebar-title">Search</h3>
                            <div class="sidebar-item search-form">
                                <form action="search.php" method="post">
                                    <input type="text" name="search" required>
                                    <button type="submit" name="search_btn"><i class="icofont-search"></i></button>
                                </form>
                            </div> <!-- End sidebar search formn -->
                            
                            
                            <h3 class="sidebar-title">Recent Posts</h3>
                            <div class="sidebar-item recent-posts">

                                <?php 

                                    $query = "SELECT * FROM stories WHERE status = 'Listed' ORDER BY date DESC LIMIT 4";
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
                                
                                <div class="post-item clearfix">
                                    <img src="images/stories/<?php echo $image; ?>" alt="" class="img-fluid">
                                    <h4><a href="story-single.php?title=<?php echo $title; ?>"> <?php echo $title; ?></a></h4>
                                    <time><?php echo $time; ?></time>
                                </div> <?php } ?>
                            </div><!-- End sidebar recent posts-->

                            <h3 class="sidebar-title">Tags</h3>
                            
                            <div class="sidebar-item tags">
                                <div class="row">
                                   
                                    <?php
                                        $query = "SELECT * FROM tags";
                                        $select_story_query = mysqli_query($connection, $query);

                                        while($row = mysqli_fetch_assoc($select_story_query)){
                                            $name = $row['name'];
                                    ?>
                                    <div class="col-4">
                                        <ul>
                                            <li><a href="tag-view.php?tags=<?php echo $name; ?>"><?php echo $name; ?></a></li>
                                        </ul>
                                    </div><?php } ?>
                                </div>
                            </div> 
                        </div><!-- End sidebar -->
                    </div><!-- End blog sidebar -->
                </div>
            </div>
        </section><!-- End Blog Section -->
    </main><!-- End #main -->

<?php include "includes/footer.php"; } } } ?>