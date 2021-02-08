<?php echo $this->session->userdata('is_instructor'); ?>
<section class="category-course-list-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
              <div class="user-dashboard-box mt-3">
                  <div class="user-dashboard-content w-100 login-form">
					  <center><img src="https://i.imgur.com/D7UL5Ap.png" width="650" height="403" border="0" alt="" /></center>
					  <br>
                      <div class="content-title-box">
                          <div class="title">Verifikasi email anda</div>
                          <div class="subtitle">Beri tahu kami bahwa alamat email ini milik Anda. Link verifikasi telah dikirimkan ke email <br> <?php echo $this->session->userdata('register_email'); ?>.</div>
                          <br/>
						  <div class="subtitle">Tidak menerima link verifikasi?</div>
                      </div>
                      <form action="javascript:;" method="post">
                          <div class="content-box">
                              <div class="basic-group">
                                  <div class="form-group">
                                      <label for="login-email">&nbsp;</label>
                                      <a href="javascript:;" class="text-left p-3" id="resend_mail_button" onclick="resend_verification_code()">
                                        <div class="float-left">Klik untuk mengirim ulang ke email anda</div>
                                        <div id="resend_mail_loader" class="float-left pl-2"></div>
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

<script type="text/javascript">
  function resend_verification_code() {
    $("#resend_mail_loader").html('<img src="<?= base_url('assets/global/gif/page-loader-3.gif'); ?>" style="width: 25px;">');
    var email = '<?= $this->session->userdata('register_email'); ?>';
    $.ajax({
      type: 'post',
      url: '<?php echo site_url('login/resend_verification_code/'); ?>',
      data: {email : email},
      success: function(response){
        toastr.success('<?php echo site_phrase('mail_successfully_sent_to_your_inbox');?>');
        $("#resend_mail_loader").html('');
      }
    });
  }
</script>
