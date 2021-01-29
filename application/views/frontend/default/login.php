<section class="category-header-area">
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item">
                            <a href="#">
                                <?php echo $page_title; ?>
                            </a>
                        </li>
                    </ol>
                </nav>
                <h1 class="category-name">
                    Pengguna terdaftar
                </h1>
            </div>
        </div>
    </div>
</section>
<?php echo $this->session->userdata('is_instructor'); ?>
<section class="category-course-list-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
              <div class="user-dashboard-box mt-3">
                  <div class="user-dashboard-content w-100 login-form">
                      <div class="content-title-box">
                          <div class="title">Login</div>
                          <div class="subtitle">Masukan Email dan Password anda.</div>
                      </div>
                      <form action="<?php echo site_url('login/validate_login/user'); ?>" method="post" >
                          <div class="content-box">
                              <div class="basic-group">
                                  <div class="form-group">
                                      <label for="login-email"><span class="input-field-icon"><i class="fas fa-envelope"></i></span> Email:</label>
                                      <input type="email" class="form-control" name = "email" id="login-email" placeholder="Masukan email" value="" required>
                                  </div>
                                  <div class="form-group">
                                      <label for="login-password"><span class="input-field-icon"><i class="fas fa-lock"></i></span> Password :</label>
                                      <input type="password" class="form-control" name = "password" placeholder="Masukan password" value="" required>
                                  </div>
                              </div>
                          </div>
                          <div class="content-update-box">
                              <button type="submit" class="btn">Masuk</button>
                          </div>
                          <div class="forgot-pass text-center">
                              <span>Atau</span>
                              <a href="javascript::" onclick="toggoleForm('forgot_password')">Lupa Password ?</a>
                          </div>
                          <div class="account-have text-center">
                              Belum punya akun ? <a href="javascript::" onclick="toggoleForm('registration')"><?php echo site_phrase('sign_up'); ?></a>
                          </div>
                      </form>
                  </div>
                  <div class="user-dashboard-content w-100 register-form hidden">
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
                              Sudah punya akun ? <a href="javascript::" onclick="toggoleForm('login')">Masuk</a>
                          </div>
                      </form>
                  </div>

                  <div class="user-dashboard-content w-100 forgot-password-form hidden">
                      <div class="content-title-box">
                          <div class="title">Lupa Password</div>
                          <div class="subtitle"><?php echo site_phrase('provide_your_email_address_to_get_password'); ?>.</div>
                      </div>
                      <form action="<?php echo site_url('login/forgot_password/frontend'); ?>" method="post">
                          <div class="content-box">
                              <div class="basic-group">
                                  <div class="form-group">
                                      <label for="forgot-email"><span class="input-field-icon"><i class="fas fa-envelope"></i></span> Email:</label>
                                      <input type="email" class="form-control" name = "email" id="forgot-email" placeholder="Masukan Email" value="" required>
                                      <small class="form-text text-muted">Berikan alamat email anda untuk mendapatkan kata sandi.</small>
                                  </div>
                              </div>
                          </div>
                          <div class="content-update-box">
                              <button type="submit" class="btn">Reset kata sandi</button>
                          </div>
                          <div class="forgot-pass text-center">
                              Ingin kembali ? <a href="javascript::" onclick="toggoleForm('login')">Masuk</a>
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
