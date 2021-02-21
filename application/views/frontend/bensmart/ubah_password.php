<!-- HEADER
    ================================================== -->
    <header class="bg-dark pt-9 pb-11 d-none d-md-block">
      <div class="container-md">
        <div class="row align-items-center">
          <div class="col">

            <!-- Heading -->
            <h1 class="font-weight-bold text-white mb-2">
              Dashboard Member
            </h1>

          </div>
          <div class="col-auto">

            <!-- Button -->
            <a class="btn btn-sm btn-gray-300-20" href="<?php echo site_url('login/logout'); ?>">
              Log Out
            </a>

          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </header>

    <!-- MAIN
    ================================================== -->
    <main class="pb-8 pb-md-11 mt-md-n9">
      <div class="container-md">
        <div class="row">
          
		  <?php include 'menu_backend.php'; ?>
		  
		  <div class="col-12 col-md-9">

            <!-- Card -->
            <div class="card card-bleed shadow-light-lg mb-6">
              <div class="card-header">

                <!-- Heading -->
                <h4 class="mb-0">
                  Ubah Password
                </h4>

              </div>
              <div class="card-body">

                <!-- Form -->
                <form action="<?php echo site_url('user/manage_password/' .$this->session->userdata('id_user')); ?>" method="post">
                  <div class="row">
                    <div class="col-12 col-md-12">

                      <div class="form-group">
                        <label for="password">&nbsp;Password Sebelumnya</label>
                        <input class="form-control" id="password" name="current_password" type="password" >
                      </div>

                    </div>
                    <div class="col-12 col-md-12">

                      <div class="form-group">
                        <label for="newpassword">&nbsp;Password Baru</label>
                        <input class="form-control" id="newpassword" name="new_password" type="password" >
                      </div>

                    </div>
					<div class="col-12 col-md-12">

                      <div class="form-group">
                        <label for="repassword">&nbsp;Ulangi Password Baru</label>
                        <input class="form-control" id="repassword" name="confirm_password" type="password" >
                      </div>

                    </div>

                    <div class="col-12 col-md-auto">

                      <!-- Button -->
                      <button class="btn btn-block btn-primary" type="submit" id="changepassword">
                        Simpan
                      </button>

                    </div>
                  </div>
                </form>

              </div>
            </div>

          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </main>
	
<script type="text/javascript">
	var submit = document.getElementById('changepassword');
	submit.onclick = function() {
		var pass = $("#newpassword").val();
		var repass = $("#repassword").val();
		var texting = "Password Yang dimasukan berbeda";
		if (pass != repass) {
			info_modal(texting);
			return false;
		}
	}

</script>