<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">
        <h1 class="logo"><a href="index.php">Story</a></h1>

        <?php 
            if(strlen($_SESSION['login'])){   
        ?>

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li><a href="home.php"><?php echo "Hi, " . htmlentities($_SESSION['username']);?></a></li>
            </ul>
        </nav><!-- .nav-menu -->
        
        <a href="logout.php" class="get-started-btn ml-auto">Logout</a>  
        <?php } 

        else{ ?>
            <a href="login.php" class="get-started-btn ml-auto">Join</a>
        <?php } ?>
    </div>
</header><!-- End Header -->
