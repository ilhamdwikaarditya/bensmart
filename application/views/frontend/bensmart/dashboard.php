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
				Dashboard member
			  </h4>

			</div>
			<div class="card-body">

			  <!-- List group -->
			  <div class="list-group list-group-flush">

				<div class="list-group-item">

				  <!-- Heading -->
				  <h5 class="mb-0">
					Minat Belajar
				  </h5>


				  <!-- Text -->
				  <p class="small text-muted">
					Berdasarkan kelas yang kamu ikuti saat ini
				  </p>

				  <div class="d-flex justify-content-between">
					<div class="col-sm-2 col-md-3 col-6">
					  <div class="circle-progress-block">
						<div id="circleProgress1" class="progressbar-js-circle p-3"><svg viewBox="0 0 100 100" style="display: block; width: 100%;">
								<path d="M 50,50 m 0,-48 a 48,48 0 1 1 0,96 a 48,48 0 1 1 0,-96" stroke="#eee" stroke-width="6" fill-opacity="0"></path>
								<path d="M 50,50 m 0,-48 a 48,48 0 1 1 0,96 a 48,48 0 1 1 0,-96" stroke="rgb(159,162,179)" stroke-width="4" fill-opacity="0" style="stroke-dasharray: 301.635, 301.635; stroke-dashoffset: 199.079;"></path>
							</svg>
							<div class="progressbar-text" style="position: absolute; left: 50%; top: 42%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: #000000; font-size: 1rem;">
							  <span class="h4">0%</span></div>
						</div>
					  </div>
					  <h5 class="text-center">Matematika</h5>
					</div>
					<div class="col-sm-2 col-md-3 col-6">
					  <div class="circle-progress-block">
						<div id="circleProgress1" class="progressbar-js-circle p-3"><svg viewBox="0 0 100 100" style="display: block; width: 100%;">
								<path d="M 50,50 m 0,-48 a 48,48 0 1 1 0,96 a 48,48 0 1 1 0,-96" stroke="#eee" stroke-width="4" fill-opacity="0"></path>
								<path d="M 50,50 m 0,-48 a 48,48 0 1 1 0,96 a 48,48 0 1 1 0,-96" stroke="rgb(159,162,179)" stroke-width="4" fill-opacity="0" style="stroke-dasharray: 301.635, 301.635; stroke-dashoffset: 138.752;"></path>
							</svg>
							<div class="progressbar-text" style="position: absolute; left: 50%; top: 42%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: #000000; font-size: 1rem;">
							  <span class="h4">0%</span></div>
						</div>
					  </div>
					  <h5 class="text-center">Bahasa Indonesia</h5>
					</div>
					<div class="col-sm-2 col-md-3 col-6">
					  <div class="circle-progress-block">
						<div id="circleProgress1" class="progressbar-js-circle p-3"><svg viewBox="0 0 100 100" style="display: block; width: 100%;">
								<path d="M 50,50 m 0,-48 a 48,48 0 1 1 0,96 a 48,48 0 1 1 0,-96" stroke="#eee" stroke-width="4" fill-opacity="0"></path>
								<path d="M 50,50 m 0,-48 a 48,48 0 1 1 0,96 a 48,48 0 1 1 0,-96" stroke="rgb(159,162,179)" stroke-width="4" fill-opacity="0" style="stroke-dasharray: 301.635, 301.635; stroke-dashoffset: 199.079;"></path>
							</svg>
							<div class="progressbar-text" style="position: absolute; left: 50%; top: 42%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: #000000; font-size: 1rem;">
							  <span class="h4">0%</span></div>
						</div>
					  </div>
					  <h5 class="text-center">IPA</h5>
					</div>
					<div class="col-sm-2 col-md-3 col-6">
					  <div class="circle-progress-block">
						<div id="circleProgress1" class="progressbar-js-circle p-3"><svg viewBox="0 0 100 100" style="display: block; width: 100%;">
								<path d="M 50,50 m 0,-48 a 48,48 0 1 1 0,96 a 48,48 0 1 1 0,-96" stroke="#eee" stroke-width="4" fill-opacity="0"></path>
								<path d="M 50,50 m 0,-48 a 48,48 0 1 1 0,96 a 48,48 0 1 1 0,-96" stroke="rgb(159,162,179)" stroke-width="4" fill-opacity="0" style="stroke-dasharray: 301.635, 301.635; stroke-dashoffset: 199.079;"></path>
							</svg>
							<div class="progressbar-text" style="position: absolute; left: 50%; top: 42%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: #000000; font-size: 1rem;">
							  <span class="h4">0%</span></div>
						</div>
					  </div>
					  <h5 class="text-center">Bahasa Inggris</h5>
					</div>
				  </div>

				</div>

				<div class="list-group-item">

				  <!-- Heading -->
				  <h5 class="mb-0">
					Progress Belajar
				  </h5>

				  <!-- Text -->
				  <p class="small text-muted">
					Selesaikan semua materi dengan baik
				  </p>

				  <div class="class-list mx-2">
					<h6 style="font-size: 16px;">
					  Belajar Matematika Sehari Semalam
					</h6>
					<div class="progress">
					  <div class="progress-bar bg-dark" style="width:14%">
						14%
					  </div>
					</div>
					<p class="small text-muted mt-1">
					  <span class="">(11 dari 86 materi telah selesai)</span>
					</p>
				  </div>

				  <div class="class-list mx-2">
					<h6 style="font-size: 16px;">
					  Belajar Bahasa Indonesia Bersama Bensmart
					</h6>
					<div class="progress">
					  <div class="progress-bar bg-dark" style="width:72%">
						72%
					  </div>
					</div>
					<p class="small text-muted mt-1">
					  <span class="">(14 dari 16 materi telah selesai)</span>
					</p>
				  </div>

				  <div class="class-list mx-2">
					<h6 style="font-size: 16px;">
					  Being Fluent in English
					</h6>
					<div class="progress">
					  <div class="progress-bar bg-dark" style="width:40%">
						40%
					  </div>
					</div>
					<p class="small text-muted mt-1">
					  <span class="">(22 dari 112 materi telah selesai)</span>
					</p>
				  </div>

				</div>

			  </div>


			</div>
		  </div>


          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </main>