 <?php
 $page = pageName('Welcome');
 require __DIR__.'/layouts/header.php'; ?>
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
      <div class="welcome-welcome-slide bg-img bg-gradient-overlay jarallax" style="background-image: url(img/logo/m3tech-x-logo.jpg); height: 550px">
        <div class="container">
          <div class="row h-100 align-items-center">
            <div class="col-12">
              <!-- Welcome Text -->
              <div class="welcome-text text-center">
                <h2 data-animation="fadeInUp" data-delay="100ms" class="app" style="margin-top:0px; padding-top:0px">
                <?php echo substr(APPNAME, 0, 2); ?><span><?php echo substr(APPNAME, 2); ?></span> </h2>
                <p data-animation="fadeInUp" data-delay="300ms">
                This is a lovely PHP MINI Framework which can be used 
                in developing your small or medium website such as blog platforms. 
                <?php echo APPNAME ?> has more than 50 inbuilt functions that can be easily used. Read the <a href="http://conet.m3tech.com.ng/" class="link">Documentation</a> for more details.</p>
                <div class="welcome-btn-group">
                  <a href="http://conet.m3tech.com.ng/#get-started" class="btn m3tech-btn mx-2" data-animation="fadeInUp" data-delay="500ms" target="_blank">Get Started</a>
                  <a href="http://conet.m3tech.com.ng/" class="btn m3tech-btn mx-2" data-animation="fadeInUp" data-delay="700ms" target="_blank">Documentation</a>
                  <a href="https://github.com/Obrainwave/conet.git" class="btn m3tech-btn mx-2" data-animation="fadeInUp" data-delay="700ms" target="_blank">Github</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      
    </div>
  </section>
  <!-- ***** Welcome Area End ***** -->

 <?php require __DIR__.'/layouts/footer.php'; ?>