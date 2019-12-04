 <?php 
 if(!auth()){
    backWith("error", "You must logged in to view this page");
 }
 $page = pageName('Profile');
 require __DIR__.'/../layouts/header.php'; ?>
       <!-- ***** Welcome Area Start ***** -->
       <div>
        <?php 
          message('message');
          message('error');
        ?>
       </div>
    <section class="welcome-area">
    <!-- Welcome Slides -->
    <div class="welcome-slides owl-carousel">
      <!-- Single Welcome Slide -->
      <div class="welcome-welcome-slide bg-img bg-gradient-overlay jarallax" style="background-image: url(../img/logo/m3tech-x-logo.jpg);">
        <div class="container h-100">
          <div class="row h-100 align-items-center">
            <div class="col-12">
              <!-- Welcome Text -->
              <?php 
              $user = first('users', 'id', $_SESSION['user_id']);
              ?>
              <div class="welcome-text text-center">
                <h2 data-animation="fadeInUp" data-delay="100ms"> This is a protected page. You can access this because you are logged in </h2>
                <p data-animation="fadeInUp" data-delay="300ms">Welcome <?php echo $user['name']; ?> | You logged in at <?php echo date('Y-m-d, H:i:s', $_SESSION['logged_in']); ?></p>
                
                <div class="welcome-btn-group">
                  <a href="<?php url('pages/edit-profile') ?>" class="btn m3tech-btn mx-2" data-animation="fadeInUp" data-delay="500ms">Edit Profile</a>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      
    </div>
  </section>
  <!-- ***** Welcome Area End ***** -->

 <?php require __DIR__.'/../layouts/footer.php'; ?>