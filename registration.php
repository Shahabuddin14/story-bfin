<?php
    session_start();
    error_reporting(0);
    include('includes/db.php');
    include "includes/header.php";

    // Code user Registration
    if(isset($_POST['submit'])){
        $name=$_POST['fullname'];
        $email=$_POST['emailid'];
        $contactno=$_POST['phone'];
        $password=md5($_POST['password']);
        $birthday=$_POST['birthday'];
        $gender=$_POST['gender'];

        $image = $_FILES['image']['name'];
        $image_temp = $_FILES['image']['tmp_name'];
        move_uploaded_file($image_temp, "images/users/$image" );

        $query=mysqli_query($connection,"insert into users(name,email,phone,password,birthday,gender,image) values('$name','$email','$contactno','$password','$birthday','$gender','$image')");
        if($query){
            echo "<script>alert('You are successfully register');</script>";
            header("location:login.php");
        }
        else{
            echo "<script>alert('Not register something went worng');</script>";
        }
    }
?>

<script type="text/javascript">
    function valid(){
        if(document.register.password.value!= document.register.confirmpassword.value){
            alert("Password and Confirm Password Field do not match  !!");
            document.register.confirmpassword.focus();
            return false;
        }
        return true;
    }
</script>

<script>
    function userAvailability(){
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_availability.php",
            data:'email='+$("#email").val(),
            type: "POST",
            success:function(data){
                $("#user-availability-status1").html(data);
                $("#loaderIcon").hide();
            },
            error:function (){}
        });
    }
</script>


<body>
    <?php include"includes/nav.php"; ?>

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Sign in</h2>
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li>Sign in</li>
                    </ol>
                </div>
            </div>
        </section><!-- End Breadcrumbs -->

        <div class="container">
            <div class="sign-in-page inner-bottom-sm">
                <div class="row">
                    <!-- create a new account -->
                    <div class="col-md-8 col-sm-6">
                        <form role="form" method="post" name="register" onSubmit="return valid();" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="info-title" for="fullname">Full Name <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="fullname" name="fullname" required="required">
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="basicinput">Avatar</label>
                                <div class="controls">
                                    <input type="file" placeholder="Avatar"  name="image" class="span8 tip" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
                                <input type="email" class="form-control unicase-form-control text-input" id="email" onBlur="userAvailability()" name="emailid" required >
                                <span id="user-availability-status1" style="font-size:12px;"></span>
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="contactno">Contact No. <span>*</span></label>
                                <input type="number" class="form-control unicase-form-control text-input" id="contactno" name="phone" maxlength="11" required >
                            </div>
                            
                            <div class="form-group">
                                <label class="info-title" for="birthday">birthday<span>*</span></label>
                                <input class="form-control unicase-form-control text-input" type="date" name="birthday" required="required">
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="gender">gender<span>*</span></label>            
                                <select class="form-control" name="gender">
                                    <option value="Male" name="gender">Select Gender</option>

                                    <?php 
                                        $query = "SELECT * FROM gender";
                                        $class_query = mysqli_query($connection, $query);

                                        if(!$class_query){
                                            die("Not Connected" . mysqli_error($connection));
                                        }

                                        while($row = mysqli_fetch_assoc($class_query)){
                                            $gender_name = $row['name'];
                                            echo "<option value ='$gender_name' >{$gender_name}</option>";
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="info-title" for="password">Password. <span>*</span></label>
                                    <input type="password" class="form-control unicase-form-control text-input" id="password" name="password"  required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="info-title" for="confirmpassword">Confirm Password. <span>*</span></label>
                                    <input type="password" class="form-control unicase-form-control text-input" id="confirmpassword" name="confirmpassword" required >
                                </div>
                            </div>
                            
    
                            <div class="text-right">
                                <button type="submit" name="submit" class="btn btn-primary text-right" id="submit">Sign Up</button>
                            </div>
                        </form>

                        <p>Have an account? <a href="login.php" style="color:red">Login here</a></p>	
                    </div>	
                    <!-- create a new account -->
                </div><!-- /.row -->
            </div>
        </div>
    </main><!-- End #main -->
   
<?php include"includes/footer.php"; ?>


