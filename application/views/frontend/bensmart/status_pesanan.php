<!-- HEADER
    ================================================== -->
    <header class="bg-dark pt-9 pb-11 d-none d-md-block">
      <div class="container-md">
        <div class="row align-items-center">
          <div class="col">

            <!-- Heading -->
            <h1 class="font-weight-bold text-white mb-2">
              Dashbord Member
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
                  Informasi Pesanan
                </h4>

              </div>
              <div class="card-body">

                <!-- Form -->
				Belum ada kelas yang dipesan.

              </div>
            </div>

          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </main>