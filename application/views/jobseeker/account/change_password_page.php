 <!-- start banner Area -->
<section class="banner-area relative" id="home">  
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h1 class="text-white">
            <?=trans('change_pass')?>
        </h1> 
        <p class="text-white link-nav"><a href="<?= base_url(); ?>"><?=trans('label_home')?> </a>  <span class="lnr lnr-arrow-right"></span>  <a href=""> <?=trans('change_pass')?></a></p>
      </div>                      
    </div>
  </div>
</section>
<!-- End banner Area -->  

<!-- Start post Area -->
<section class="post-area section-gap">
  <div class="container">
    <div class="row justify-content-center d-flex">
      <div class="col-lg-4 sidebar">
        <?php $this->load->view($user_sidebar); ?>
      </div>
      <div class="col-lg-8 post-list">

         <?php if ($this->session->flashdata('error_update_password')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error_update_password') . '</div>';
          } ?>
          
         <?php if ($this->session->flashdata('update_password_success')) {
            echo '<div class="alert alert-success">' . $this->session->flashdata('update_password_success') . '</div>';
          } ?>

          <?php if ($this->session->flashdata('update_password_failed')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('update_password_failed') . '</div>';
          } ?> 

        <?php $attributes = array('id' => 'Change_Password_form', 'method' => 'post'); ?>
        <?php echo form_open('account/change_password',$attributes);?>

        <div class="profile_job_content col-lg-12">
          <div class="headline">
            <h3> <?=trans('change_pass')?></h3>
          </div>
          <div class="profile_job_detail">
            <div class="row">
              <div class="col-md-12 col-sm-12">
                <div class="submit-field">
                  <h5><?=trans('old_pass')?> *</h5>
                  <input type="Password" name="old_password" class="form-control">
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="submit-field">
                  <h5><?=trans('new_pass')?> *</h5>
                  <input type="Password" name="new_password" class="form-control">
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="submit-field">
                  <h5><?=trans('confirm_new_pass')?> *</h5>
                  <input type="Password" name="confirm_password" class="form-control">
                </div>
              </div>
              <div class="col-12">
                <div class="submit-field">
                   <input class="btn btn-info px-5 btn-md" value="<?=trans('update')?>" type="submit" name="<?=trans('submit')?>">
                 </div>
              </div>
            </div>
          </div>
        </div>                             
       <?php echo form_close(); ?>
     </div>
   </div>
 </div>  
</section>
<!-- End post Area -->    