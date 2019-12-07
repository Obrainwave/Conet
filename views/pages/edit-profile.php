<?php 
if(!auth()){
    backWith("error", "You must logged in to view this page");
}
$page = pageName('Edit Profile');
require __DIR__.'/../layouts/header.php'; ?>
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
                        <h2>Edit Profile</h2>
                    <div class="line"></div>
                </div>
            </div>
        </div>

      <div class="row">
        <div class="col-12">
          <!-- register Form -->
          <?php $user = first('users', 'id', $_SESSION['user_id']); ?>
          <?php $detail = first('details', 'user_id', $_SESSION['user_id']); ?>
          <div class="register-form">
            <form action="<?php url('edit-profile'); ?>" method="post" enctype="multipart/form-data">
            <?php csrf() ?>
            
              <div class="row justify-content-center">
              <input name="id" type="hidden" value="<?php echo $user['id']; ?>" readonly>
                <div class="col-md-12">
                  <div class="form-group mb-30">
                    <input type="text" name="name" value="<?php echo $user['name']; ?>" class="form-control" placeholder="Your Name">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group mb-30">
                    <input type="text" name="phone" value="<?php echo $user['phone']; ?>" class="form-control" placeholder="Your Phone No">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group mb-30">
                    <input type="text" name="email" value="<?php echo $user['email']; ?>" class="form-control" placeholder="Your Email Address">
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group mb-30">
                    <select name="gender" value="<?php echo $detail['gender']; ?>" class="form-control">
                      <option value="">Select Gender</option>
                      <option value="Male" <?php if($detail['gender'] == 'Male'){?> selected <?php } ?>>Male</option>
                      <option value="Female" <?php if($detail['gender'] == 'Female'){?> selected <?php } ?>>Female</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group mb-30">
                    <input type="date" name="date_of_birth" value="<?php echo $detail['dob']; ?>" class="form-control" placeholder="Your Date of Birth">
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group mb-30">
                    <textarea name="address" class="form-control" placeholder="Your Address"><?php echo $detail['address']; ?></textarea>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group mb-30">
                    <input type="file" name="image" class="form-control" placeholder="Your Date of Birth">
                  </div>
                </div>
                
                
                <div class="col-12 text-center">
                  <button type="submit" class="btn m3tech-btn">Update</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

 <?php require __DIR__.'/../layouts/footer.php'; ?>