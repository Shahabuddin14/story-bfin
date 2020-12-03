<?php
    session_start();
    error_reporting(0);
    include('includes/db.php');
    include"includes/header.php";

    // Code for User login
    if(isset($_POST['login'])){
        $email=$_POST['email'];
        $password=md5($_POST['password']);
        $query=mysqli_query($connection,"SELECT * FROM users WHERE email='$email' and password='$password'");
        $num=mysqli_fetch_array($query);
        
        if($num>0){
            $_SESSION['login']=$_POST['email'];
            $_SESSION['id']=$num['id'];
            $_SESSION['username']=$num['name'];
            header("location:home.php");
            exit();
        }
        else{
            $extra="login.php";
            $email=$_POST['email'];
            header("location:login.php");
            $_SESSION['errmsg']="Invalid email id or Password";
            exit();
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
                    <!-- Sign-in -->			
                    <div class="col-md-10 col-sm-6">
                        <form class="register-form outer-top-xs" method="post" role="form" class="php-email-form">
                            <span style="color:red;" >
                                <?php echo htmlentities($_SESSION['errmsg']); ?>
                                <?php echo htmlentities($_SESSION['errmsg']=""); ?>
                            </span>

                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                    <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                                </div>

                                <div class="col-md-6 form-group">
                                    <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                                    <input type="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" >
                                </div>
                            </div>
                            
                            <div class="text-right">
                                <button type="submit" name="login" class="btn btn-primary">Login</button>
                            </div>
                        </form>	
                        <p>Don't Have an account? <a href="registration.php" style="color:red">Signup here</a></p>				
                    </div>
                    <!-- Sign-in -->
                </div><!-- /.row -->
            </div>
        </div>
    </main><!-- End #main -->
<?php include"includes/footer.php"; ?>


