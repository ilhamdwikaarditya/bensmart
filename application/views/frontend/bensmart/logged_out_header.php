<nav class="navbar navbar-expand-lg navbar-light bg-white">
  <div class="container">

	<!-- Brand -->
	<a class="navbar-brand" href="index.html">
	  <img src="<?php echo base_url().'assets/frontend/bensmart/img/logo_text_bensmart.png' ?>" class="navbar-brand-img" height="17" alt="...">
	</a>

	<!-- Toggler -->
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
	  <span class="navbar-toggler-icon"></span>
	</button>

	<!-- Collapse -->
	<div class="collapse navbar-collapse" id="navbarCollapse">

	  <!-- Toggler -->
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
		<i class="fe fe-x"></i>
	  </button>

	  <!-- Navigation -->
	  <ul class="navbar-nav ml-auto">
		<?php if ($this->session->userdata('admin_login')): ?>
		<li class="nav-item">
		  <a class="nav-link" id="navbarLandings" href="#" aria-haspopup="true" aria-expanded="false">
			Administrator
		  </a>
		</li>
		<?php endif; ?>
		<li class="nav-item">
		  <a class="nav-link" id="navbarLandings" href="#" aria-haspopup="true" aria-expanded="false">
			Tentang Kami
		  </a>
		</li>
		<li class="nav-item">
		  <a class="nav-link" id="navbarLandings" href="#" aria-haspopup="true" aria-expanded="false">
			Belajar Apa Saja
		  </a>
		</li>
		<li class="nav-item">
		  <a class="nav-link" id="navbarLandings" href="#" aria-haspopup="true" aria-expanded="false">
			Keunggulan
		  </a>
		</li>
		
	  </ul>

	  <!-- Button -->
	  <a class="navbar-btn btn btn-sm btn-primary lift ml-auto" href="<?php echo site_url('home/login'); ?>" target="_blank">
		Masuk Kelas
	  </a>

	</div>

  </div>
</nav>