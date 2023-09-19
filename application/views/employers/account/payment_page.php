<!-- start banner Area -->
<section class="banner-area relative" id="home">  
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h1 class="text-white">
          <?=trans('payments')?>
        </h1> 
        <p class="text-white link-nav"><a href="<?= base_url('employers'); ?>"><?=trans('label_home')?> </a>  <span class="lnr lnr-arrow-right"></span>  <a href=""> <?=trans('payments')?></a></p>
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
        <?php $this->load->view($emp_sidebar); ?>
      </div>
      <div class="col-lg-8 post-list">
        <div class="profile_job_content col-lg-12">
          <div class="headline">
            <div class="row">
              <div class="col-12">
                <h3 class="d-inline"><?=trans('payments')?></h3>
              </div>
            </div>  
          </div>
          <div class="onjob-job-alerts">
            <div class="table-responsive">
              <table>
                <thead>
                  <tr>
                    <th>Txn Id</th>
                    <th>Payment Amount</th>
                    <th>Currency</th>
                    <th>Payment Status</th>
                    <th>Payment Date</th>

                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(empty($payments)): ?>
                    <p class="text-gray"><strong><?=trans('sorry')?>,</strong> <?=trans('no_posted_job_yet')?></p>
                  <?php endif; ?>

                  <?php foreach ($payments as $payment): ?>
                    <tr>
                      <td><?= $payment['txn_id'] ?></td>
                      <td class="text-center"><?= $payment['payment_amount'] ?></td>
                      <td><?= $payment['currency'] ?></td>
                      <td class="text-center"><?= $payment['payment_status'] ?></td>
                      <td><?= date_time($payment['payment_date']) ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>                            
      </div>

    </div>
  </div>  
</section>
      <!-- End Job listing Area -->