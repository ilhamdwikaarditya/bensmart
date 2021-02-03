<style>
.hidden {
    display: none;
}
</style>
<section>
  <div class="container d-flex flex-column login-form">
	<div class="row align-items-center justify-content-center no-gutters min-vh-100">
	  <div class="col-12 col-md-6 col-lg-4 py-8 py-md-11">
		
		<!-- Heading -->
		<h1 class="mb-0 font-weight-bold">
		  Masuk
		</h1>

		<!-- Text -->
		<p class="mb-6 text-muted">
		  Masukan Email dan Password anda.
		</p>

		<!-- Form -->
		<form class="mb-6" action="<?php echo site_url('login/validate_login/user'); ?>" method="post" >

		  <!-- Email -->
		  <div class="form-group">
			<label for="email">
			  Alamat Email
			</label>
			<input type="email" class="form-control" id="email" name = "email" placeholder="email@gmail.com">
		  </div>

		  <!-- Password -->
		  <div class="form-group mb-5">
			<label for="password">
			  Password
			</label>
			<input type="password" class="form-control" id="password" name = "password" placeholder="Enter your password">
		  </div>

		  <!-- Submit -->
		  <button class="btn btn-block btn-primary" type="submit">
			Masuk
		  </button>

		</form>

		<!-- Text -->
		<p class="mb-0 font-size-sm text-muted">
		  Lupa Password? <a href="javascript::" onclick="toggoleForm('forgot_password')">Reset Password</a>.
		</p>
		<p class="mb-0 font-size-sm text-muted">
		  Tidak mempunyai akun? <a href="javascript::" onclick="toggoleForm('registration')">Daftar</a>.
		</p>

	  </div>
	  <div class="col-lg-7 offset-lg-1 align-self-stretch d-none d-lg-block">

		<!-- Image -->
		<div class="h-100 w-cover bg-cover" style="background-image: url(<?php echo base_url() . 'assets/frontend/'.get_frontend_settings('theme').'/img/covers/cover-14.jpg' ?>);"></div>
		
		<!-- Shape -->
		<div class="shape shape-left shape-fluid-y svg-shim text-white">
		  <svg viewBox="0 0 100 1544" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h100v386l-50 772v386H0V0z" fill="currentColor"/></svg>
		</div>

	  </div>
	</div> <!-- / .row -->
  </div> <!-- / .container -->
  <div class="container d-flex flex-column register-form hidden">
	<div class="row align-items-center justify-content-center no-gutters min-vh-100">
	  <div class="col-12 col-md-6 col-lg-4 py-8 py-md-11">
		
		<!-- Heading -->
		<h1 class="mb-0 font-weight-bold">
		  Daftar
		</h1>

		<!-- Text -->
		<p class="mb-6 text-muted">
		  Ayo daftar dan mulai belajar.
		</p>

		<!-- Form -->
		<form action="<?php echo site_url('login/register'); ?>" method="post">
			
			<div class="form-group">
			<label for="fristname">
			  Nama Depan
			</label>
			<input type="text" class="form-control" id="fristname" name = "fristname" placeholder="Nama depan">
		  </div>
		  <div class="form-group">
			<label for="lastname">
			  Nama Belakang
			</label>
			<input type="text" class="form-control" id="lastname" name = "lastname" placeholder="Nama belakang">
		  </div>
		  <div class="form-group">
			<label for="phone">
			  Handphone
			</label>
			<input type="text" class="form-control" id="phone" name = "phone" placeholder="082133071761">
		  </div>
		  <div class="form-group">
			  <label for="address">
			  Alamat:
			  </label>
			  <textarea name="address" id = "address" class="form-control"></textarea>
		  </div>
			
		  <!-- Email -->
		  <div class="form-group">
			<label for="email">
			  Alamat Email
			</label>
			<input type="email" class="form-control" id="registration-email" name = "email" placeholder="email@gmail.com">
		  </div>

		  <!-- Password -->
		  <div class="form-group mb-5">
			<label for="password">
			  Password
			</label>
			<input type="password" class="form-control" id="registration-password" name = "password" placeholder="Masukan kata sandi">
		  </div>
		  
		  <div class="form-group mb-5">
			<label for="repassword">
			  Ulangi Password
			</label>
			<input type="repassword" class="form-control" id="registration-repassword" name = "repassword" placeholder="Masukan lagi kata sandi">
		  </div>

		  <!-- Submit -->
		  <button class="btn btn-block btn-primary" type="submit" id="daftar">
			Registrasi
		  </button>

		</form>

		<!-- Text -->
		<p class="mb-0 font-size-sm text-muted">
		  Sudah mempunyai akun? <a href="javascript::" onclick="toggoleForm('login')">Masuk</a>.
		</p>

	  </div>
	  <div class="col-lg-7 offset-lg-1 align-self-stretch d-none d-lg-block">

		<!-- Image -->
		<div class="h-100 w-cover bg-cover" style="background-image: url(<?php echo base_url() . 'assets/frontend/'.get_frontend_settings('theme').'/img/covers/cover-14.jpg' ?>);"></div>
		
		<!-- Shape -->
		<div class="shape shape-left shape-fluid-y svg-shim text-white">
		  <svg viewBox="0 0 100 1544" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h100v386l-50 772v386H0V0z" fill="currentColor"/></svg>
		</div>

	  </div>
	</div> <!-- / .row -->
  </div> <!-- / .container -->
  <div class="container d-flex flex-column forgot-password-form hidden">
	<div class="row align-items-center justify-content-center no-gutters min-vh-100">
	  <div class="col-12 col-md-6 col-lg-4 py-8 py-md-11">
		
		<!-- Heading -->
		<h1 class="mb-0 font-weight-bold">
		  Lupa Password
		</h1>

		<!-- Text -->
		<p class="mb-6 text-muted">
		  Masukan Email untuk mereset Password anda.
		</p>

		<!-- Form -->
		<form action="<?php echo site_url('login/forgot_password/frontend'); ?>" method="post">

		  <!-- Email -->
		  <div class="form-group">
			<label for="email">
			  Alamat Email
			</label>
			<input type="email" class="form-control" id="forgot-email" name = "email" placeholder="email@gmail.com">
		  </div>


		  <!-- Submit -->
		  <button class="btn btn-block btn-primary" type="submit">
			Masuk
		  </button>

		</form>

		<!-- Text -->
		<p class="mb-0 font-size-sm text-muted">
		  Ingin kembali? <a href="javascript::" onclick="toggoleForm('login')">Masuk</a>.
		</p>

	  </div>
	  <div class="col-lg-7 offset-lg-1 align-self-stretch d-none d-lg-block">

		<!-- Image -->
		<div class="h-100 w-cover bg-cover" style="background-image: url(<?php echo base_url() . 'assets/frontend/'.get_frontend_settings('theme').'/img/covers/cover-14.jpg' ?>);"></div>
		
		<!-- Shape -->
		<div class="shape shape-left shape-fluid-y svg-shim text-white">
		  <svg viewBox="0 0 100 1544" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h100v386l-50 772v386H0V0z" fill="currentColor"/></svg>
		</div>

	  </div>
	</div> <!-- / .row -->
  </div> <!-- / .container -->
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
	
	var submit = document.getElementById('daftar');
	submit.onclick = function() {
		var pass = $("#registration-password").val();
		var repass = $("#registration-repassword").val();
		var texting = "Password Yang dimasukan berbeda";
		if(pass != repass){
			info_modal(texting);
			return false;
		}
	}

</script>
