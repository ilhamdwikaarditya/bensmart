<?php echo $this->session->userdata('is_instructor'); ?>
<section class="category-course-list-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
              <div class="user-dashboard-box mt-3">
                  <div class="user-dashboard-content w-100 login-form">
                      <div class="content-title-box">
                          <div class="title">Verifikasi email <?php echo @$email; ?> berhasil!</div>
                          <div class="subtitle">Silahkan login menggunakan email anda.</div>

                      </div>
                      <form action="javascript:;" method="post">
                          <div class="content-box">
                              <div class="basic-group">
                                  <div class="form-group">
                                      <label for="login-email">&nbsp;</label>
                                      <a href="<?php echo site_url('home/login'); ?>" class="text-left p-3" >
                                        <div class="float-left">Klik untuk masuk kedalam bensmart</div>
                                        
                                      </a>
                                  </div>
                              </div>
                          </div>
                          
                      </form>
                  </div>
              </div>
            </div>
        </div>
    </div>
</section>