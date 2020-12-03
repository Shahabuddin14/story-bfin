<?php 
    include"include/config.php"; 
    session_start();

   if(strlen($_SESSION['login'])==0){  
        header('location:index.php');
    }
    else{

     if(isset($_POST['update'])){
       $status = $_POST['status'];

        $id = intval($_GET['id']);
        $sql = mysqli_query($connection,"UPDATE stories SET status = '$status' WHERE id='$id'");
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
                                    <h3>Story details</h3>
                                </div>
                                
                                <div class="module-body">
                                    <form class="form-horizontal row-fluid" name="Category" method="post" enctype="multipart/form-data">

                                        <?php
                                            $id = intval($_GET['id']);
                                            $query = mysqli_query($connection,"SELECT * FROM stories WHERE id='$id'");
                                        
                                            while($row=mysqli_fetch_array($query)){
                                                $id = $row['id'];
                                            $name = $row['name'];
                                            $title = $row['title'];
                                            $body = $row['body'];
                                            $image = $row['image'];
                                            $caption = $row['caption'];
                                            $tags = $row['tags'];
                                            $status = $row['status'];
                                        ?>
                                       
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Publisher Name</label>
                                            <div class="controls">
                                                <input type="text" value="<?php echo $name;?>" class="span8 tip" readonly>
                                            </div>
                                        </div>
                                        
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Story Title</label>
                                            <div class="controls">
                                                <input type="text" value="<?php echo $title;?>" class="span8 tip" readonly>
                                            </div>
                                        </div>
                                        
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Story Content</label>
                                            <div class="controls">
                                               <textarea name="text" id="" cols="20" rows="7" class="span8 tip" placeholder="<?php echo $body;?>" readonly></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Story Image</label>
                                            <div class="controls">
                                                <img src="../images/stories/<?php echo $image;?>" alt="" class="span8 tip img-fluid" style="height: 300px">
                                            </div>
                                        </div>
                                        
                                        <div class="controls">
                                            <p class="text-center"><?php echo $caption?></p>
                                        </div>
                                              
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Story Tag</label>
                                            <div class="controls">
                                                <input type="text" value="<?php echo $tags;?>" class="span8 tip" readonly>
                                            </div>
                                        </div>    
                                            
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Story Status</label>
                                            <div class="controls">
                                                <select class="form-control" name="status">
                                                    <option value="<?php echo $status;?>" name="status"><?php echo "Previous status : ". $status;?></option>
                                                    <option value="Unlisted" name="status">Unlisted</option>
                                                    <option value="Listed" name="status">Listed</option>
                                                </select>
                                            </div>
                                        </div><?php } ?>	
                                        
                                        <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" name="update" class="btn">Upadete</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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