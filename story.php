<?php 

    //error_reporting(0);
    session_start();
    include "includes/db.php";
    include "includes/header.php";

    if(strlen($_SESSION['login'])==0){  
        header('location:index.php');
    }
    else{

        $query = "SELECT * FROM users WHERE id = '".$_SESSION['id']."' ";
        $select_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_query)){
            $id = $row['id'];
            $name = $row['name'];
            $email = $row['email'];

            if(isset($_POST['submit'])){
                $name = $name;
                $usermail = $email;
                $title = $_POST['title'];
                $body = $_POST['body'];

                $image = $_FILES['image']['name'];
                $image_temp = $_FILES['image']['tmp_name'];
                move_uploaded_file($image_temp, "images/stories/$image" );

                $caption = $_POST['caption'];
                $tags = $_POST['tags'];

                $sql = mysqli_query($connection,"INSERT INTO stories (userId, name, usermail, title, body, image, caption, tags, status, date) values('$id','$name','$usermail', '$title', '$body', '$image', '$caption', '$tags', 'Unlisted', now())");
                $_SESSION['msg']="Story shared";
            }
        }

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
                    <div class="col-lg-4">
                        <div class="sidebar">
                            <div class="sidebar-item categories"> <?php include"includes/side_bar.php"; ?></div><!-- End sidebar categories-->
                        </div><!-- End sidebar -->
                    </div><!-- End blog sidebar -->

                    <div class="col-lg-8 entries">
                        <div class="module-head">
                            <h3>Share Story</h3>
                        </div>

                        <div class="module-body">
                            <form class="form-horizontal row-fluid" name="Category" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="control-label" for="basicinput">Story title</label>
                                    <div class="controls">
                                        <input type="text" name="title" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="basicinput">Story details</label>
                                    <div class="controls">
                                        <textarea name="body" class="form-control" required id="" cols="30" rows="10"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="basicinput">Story image</label>
                                    <div class="controls">
                                        <input type="file"  name="image" class="span8 tip" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="basicinput">Image caption</label>
                                    <div class="controls">
                                        <input type="text" name="caption" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="basicinput">Story tags</label>

                                        <select class="form-control" name="tags">
                                        <option value="Male" name="tags">Select tag</option>

                                        <?php 
                                            $query = "SELECT * FROM tags ";
                                            $tag_query = mysqli_query($connection, $query);

                                            if(!$tag_query){
                                                die("Not Connected" . mysqli_error($connection));
                                            }

                                            while($row = mysqli_fetch_assoc($tag_query)){
                                                $tag_name = $row['name'];
                                                echo "<option value ='$tag_name' >{$tag_name}</option>";
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="text-right">
                                    <button type="submit" name="submit" class="btn btn-primary">Share</button>
                                </div>

                            </form>
                        </div>
                    </div><!-- End blog entries list -->
                </div>
            </div>
        </section><!-- End Blog Section -->
    </main><!-- End #main -->

<?php include "includes/footer.php";  ?>
