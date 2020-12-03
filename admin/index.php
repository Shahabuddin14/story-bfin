<?php
    include"include/config.php";
    session_start();

    //login code
    if(isset($_POST['login'])){
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        $query=mysqli_query($connection,"SELECT * FROM admin WHERE username='$username' and password='$password'");
        $num=mysqli_fetch_array($query);
        
        if($num>0){
            $_SESSION['login']=$_POST['username'];
            $_SESSION['id']=$num['id'];
            $_SESSION['username']=$num['name'];
            header("location:home.php");
            exit();
        }
        else{
            $extra="login.php";
            $username=$_POST['username'];
            header("location:index.php");
            $_SESSION['errmsg']="Invalid email id or Password";
            exit();
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="module module-login span4 offset4">
                    <form class="form-vertical" method="post">
                        <div class="module-head"><h3>Sign In</h3></div>
                        
                        <div class="module-body">
                            <div class="control-group">
                                <div class="controls row-fluid">
                                    <input class="span12" type="text" id="inputEmail" name="username" placeholder="Username">
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls row-fluid">
                                    <input class="span12" type="password" id="inputPassword" name="password" placeholder="Password">
                                </div>
                            </div>
                        </div>

                        <div class="module-foot">
                            <div class="control-group">
                                <div class="controls clearfix">
                                    <button type="submit" class="btn btn-primary pull-right" name="login">Login</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="footer">
        <div class="container">
            <b class="copyright">&copy; 2020 stories.com </b>All rights reserved.
        </div>
    </div>

    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
    <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
    <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="scripts/common.js" type="text/javascript"></script>
</body>
</html>