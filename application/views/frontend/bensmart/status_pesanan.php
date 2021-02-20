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
				
				<div class="list-group list-group-flush">
                  <div class="list-group-item">
                    <div class="row align-items-center">
                      <div class="col">

                        <!-- Heading -->
                        <p class="mb-0">
                          <a href="#!">Invoice #91240</a>
                        </p>

                        <!-- Text -->
                        <small class="text-gray-700">
                          Billed Apr, 24, 2020
                        </small>

                      </div>
                      <div class="col-auto">

                        <!-- Button -->
                        <button class="btn btn-xs btn-outline-white">
                          Pay now
                        </button>

                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>

          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </main>