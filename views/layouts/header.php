<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Conet - Simple PHP Web development structural template with optional database connection function">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="author" content="Olaiwola Akeem A.K.A Brainwave, he is the founder of M3 Technology">
        <title> <?php echo APPNAME; ?> - <?php echo $page; ?></title>
		<!-- Favicon -->
		<link rel="icon" href="<?php echo BASEPATH; ?>/img/favicon/logo.png">
        <link rel="stylesheet" href="<?php echo BASEPATH; ?>css/styles.css">
		
	<style>
		h2.app-logo{
			font-size: 40px;
			font-weight: 900;
			font-family: Harlow Solid Italic;
			font-style: bold;
			color: red;
		}
		h2.app-logo span{
			color: skyblue;
		}
		
		h2.app-logo i{
			color: blue;
		}
	
    
    h2.app{
			font-size: 70px;
			font-weight: 900;
			font-family: Harlow Solid Italic;
			font-style: bold;
			color: red;
		}
		h2.app span{
			color: skyblue;
		}
		
		h2.app i{
			color: blue;
		}
	
	</style>
    </head>
    <body>
	
	<!-- Preloader -->
  <div id="preloader">
    <div class="preload-content">
      <div id="dento-load"></div>
    </div>
  </div>
  
   <!-- ***** Header Area Start ***** -->
  <header class="header-area">
    

    <!-- Main Header Start -->
    <div class="main-header-area">
      <div class="classy-nav-container breakpoint-off">
        <div class="container">
          <!-- Classy Menu -->
          <nav class="classy-navbar justify-content-between" id="dentoNav">

            <!-- Logo -->
			
            <a class="nav-brand" href="<?php url('/') ?>">
			
				<h2 class="app-logo"> <?php echo substr(APPNAME, 0, 2); ?><span><?php echo substr(APPNAME, 2); ?></span></h2>
			
			<!--<img src="img/core-img/logo.png" alt="">-->
			
			</a>

            <!-- Navbar Toggler -->
            <div class="classy-navbar-toggler">
              <span class="navbarToggler"><span></span><span></span><span></span></span>
            </div>

            <!-- Menu -->
            <div class="classy-menu">

              <!-- Close Button -->
              <div class="classycloseIcon">
                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
              </div>

              <!-- Nav Start -->
              <div class="classynav">
                <ul id="nav">
                <li class="active"><a href="<?php url('/'); ?>">Home</a></li>
                <?php if(!auth()){ ?>
                  <li><a href="<?php url('auth/register'); ?>">Register</a></li>
				          <li><a href="<?php url('auth/login'); ?>">Login</a></li>
                <?php }else{ ?>
                  <li><a href="<?php url('pages/profile'); ?>">Profile</a></li>
                  <?php } ?>
                  
                </ul>
              </div>
              <!-- Nav End -->
            </div>

            <?php if(auth()){ ?>

            <a href="<?php url('auth/logout'); ?>" class="btn dento-btn booking-btn">Logout</a>
            <?php } ?>
          </nav>
        </div>
      </div>
    </div>
  </header>