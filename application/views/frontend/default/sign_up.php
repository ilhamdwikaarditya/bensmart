<section class="category-header-area">
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('home'); ?>"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item">
                            <a href="#">
                                <?php echo $page_title; ?>
                            </a>
                        </li>
                    </ol>
                </nav>
                <h1 class="category-name">
                    Pendaftaran
                </h1>
            </div>
        </div>
    </div>
</section>

<section class="category-course-list-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
              <div class="user-dashboard-box mt-3">
                  <div class="user-dashboard-content w-100 login-form hidden">
                      <div class="content-title-box">
                          <div class="title">Login</div>
                          <div class="subtitle"><?php echo site_phrase('provide_your_valid_login_credentials'); ?>.</div>
                      </div>
                      <form action="<?php echo site_url('login/validate_login/user'); ?>" method="post">
                          <div class="content-box">
                              <div class="basic-group">
                                  <div class="form-group">
                                      <label for="login-email"><span class="input-field-icon"><i class="fas fa-envelope"></i></span> Email:</label>
                                      <input type="email" class="form-control" name = "email" id="login-email" placeholder="Email" required>
                                  </div>
                                  <div class="form-group">
                                      <label for="login-password"><span class="input-field-icon"><i class="fas fa-lock"></i></span> Password:</label>
                                      <input type="password" class="form-control" name = "password" placeholder="Password" required>
                                  </div>
                              </div>
                          </div>
                          <div class="content-update-box">
                              <button type="submit" class="btn"><?php echo site_phrase('login'); ?></button>
                          </div>
                          <div class="forgot-pass text-center">
                              <span>or</span>
                              <a href="javascript::" onclick="toggoleForm('forgot_password')"><?php echo site_phrase('forgot_password'); ?></a>
                          </div>
                          <div class="account-have text-center">
                              <?php echo site_phrase('do_not_have_an_account'); ?>? <a href="javascript::" onclick="toggoleForm('registration')"><?php echo site_phrase('sign_up'); ?></a>
                          </div>
                      </form>
                  </div>
                  <div class="user-dashboard-content w-100 register-form">
                      <div class="content-title-box">
                          <div class="title">Form Pendaftaran</div>
                          <div class="subtitle">Ayo daftar dan mulai belajar.</div>
                      </div>
                      <form action="<?php echo site_url('login/register'); ?>" method="post">
                          <div class="content-box">
                              <div class="basic-group">
                                  <div class="form-group">
                                      <label for="fullname"><span class="input-field-icon"><i class="fas fa-user"></i></span> Nama Lengkap:</label>
                                      <input type="text" class="form-control" name = "fullname" id="fullname" placeholder="Nama Lengkap" value="" required>
                                  </div>
                                  <div class="form-group">
                                      <label for="phone"><span class="input-field-icon"><i class="fas fa-user"></i></span> Handphone:</label>
                                      <input type="text" class="form-control" name = "phone" id="phone" placeholder="Handphone" value="" required>
                                  </div>
								  <div class="form-group">
                                      <label for="address"><span class="input-field-icon"><i class="fas fa-user"></i></span> Alamat:</label>
                                      <textarea name="address" id = "address" class="form-control"></textarea>
                                  </div>
								  <div class="form-group">
                                      <label for="jenjang"><span class="input-field-icon"><i class="fas fa-jenjang"></i></span> Jenjang:</label>
                                      <select class="form-control select2" data-toggle="select2" name="id_jenjang" id="id_jenjang">
										  <option value="0">None</option>
										  <?php foreach ($jenjang as $datajenjang): ?>
												  <option value="<?php echo $datajenjang['id_jenjang']; ?>"><?php echo $datajenjang['nm_jenjang']; ?></option>
										  <?php endforeach; ?>
										</select>
                                  </div>
                                  <div class="form-group">
                                      <label for="registration-email"><span class="input-field-icon"><i class="fas fa-envelope"></i></span> Email:</label>
                                      <input type="email" class="form-control" name = "email" id="registration-email" placeholder="Email" value="" required>
                                  </div>
                                  <div class="form-group">
                                      <label for="registration-password"><span class="input-field-icon"><i class="fas fa-lock"></i></span> Password:</label>
                                      <input type="password" class="form-control" name = "password" id="registration-password" placeholder="Password" value="" required>
                                  </div>
                              </div>
                          </div>
                          <div class="content-update-box">
                              <button type="submit" class="btn">Daftar</button>
                          </div>
                          <div class="account-have text-center">
                              Sudah punya akun ? <a href="javascript::" onclick="toggoleForm('login')"><?php echo site_phrase('login'); ?></a>
                          </div>
                      </form>
                  </div>

                  <div class="user-dashboard-content w-100 forgot-password-form hidden">
                      <div class="content-title-box">
                          <div class="title"><?php echo site_phrase('forgot_password'); ?></div>
                          <div class="subtitle"><?php echo site_phrase('provide_your_email_address_to_get_password'); ?>.</div>
                      </div>
                      <form action="<?php echo site_url('login/forgot_password/frontend'); ?>" method="post">
                          <div class="content-box">
                              <div class="basic-group">
                                  <div class="form-group">
                                      <label for="forgot-email"><span class="input-field-icon"><i class="fas fa-envelope"></i></span> <?php echo site_phrase('email'); ?>:</label>
                                      <input type="email" class="form-control" name = "email" id="forgot-email" placeholder="<?php echo site_phrase('email'); ?>" value="" required>
                                      <small class="form-text text-muted"><?php echo site_phrase('provide_your_email_address_to_get_password'); ?>.</small>
                                  </div>
                              </div>
                          </div>
                          <div class="content-update-box">
                              <button type="submit" class="btn"><?php echo site_phrase('reset_password'); ?></button>
                          </div>
                          <div class="forgot-pass text-center">
                              <?php echo site_phrase('want_to_go_back'); ?>? <a href="javascript::" onclick="toggoleForm('login')"><?php echo site_phrase('login'); ?></a>
                          </div>
                      </form>
                  </div>
              </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
  function toggoleForm(form_type) {
    if (form_type === 'login') {
      $('.login-form').show();
      $('.forgot-password-form').hide();
      $('.register-form').hide();
    }else if (form_type === 'registration') {
      $('.login-form').hide();
      $('.forgot-password-form').hide();
      $('.register-form').show();
    }else if (form_type === 'forgot_password') {
      $('.login-form').hide();
      $('.forgot-password-form').show();
      $('.register-form').hide();
    }
  }
</script>
