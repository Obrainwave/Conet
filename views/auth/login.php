<?php 
if(auth()){
    redirect('/');
}
$page = pageName('Login');
require __DIR__.'/../layouts/header.php'; ?>
       <!-- ***** Register Area Start ***** -->
       <div>
        <?php 
          message('message');
          message('error');
          ?>
       </div>
    <section class="book-an-oppointment-area section-padding-100 bg-img bg-gradient-overlay jarallax clearfix" style="background-image: url('img/bg-img/12.jpg');">
        <div class="container" id="contact">
		 
            <div class="row">
                <!-- Section Heading -->
                <div class="col-12">
                    <div class="section-heading text-center white">
                        <h2>Sign In</h2>
                    <div class="line"></div>
                </div>
            </div>
        </div>

      <div class="row">
        <div class="col-12">
          <!-- register Form -->
          <div class="register-form">
            <form action="<?php url('login'); ?>" method="POST">
            <?php csrf() ?>
              <div class="row justify-content-center">
              
                <div class="col-md-12">
                  <div class="form-group mb-30">
                    <input type="text" name="email" class="form-control" placeholder="Your Email Address">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group mb-30">
                    <input type="password" name="password" class="form-control" placeholder="Your secured Password">
                  </div>
                </div>
				
                <div class="col-12 text-center">
                  <button type="submit" class="btn m3tech-btn">Sign In</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

 <?php require __DIR__.'/../layouts/footer.php'; ?>