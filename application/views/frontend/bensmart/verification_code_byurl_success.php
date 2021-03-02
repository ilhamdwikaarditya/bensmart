<?php 
echo $this->session->userdata('is_instructor'); 
$cekstatusver = $this->db->get_where('ref_user', array('email' => $email))->row_array();
?>


<section class="category-course-list-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
              <div class="user-dashboard-box mt-3">
                  <div class="user-dashboard-content w-100 login-form">
                      <div class="content-title-box">
                          <?php if($cekstatusver['status_verification'] == '1'){ ?>
						  <div class="title">Email <?php echo @$email; ?> sudah di verifikasi!</div>
                          <?php }else{ ?>
						  <div class="subtitle">Silahkan login menggunakan email anda.</div>
                          <?php } ?>

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