<div class="col-12 col-md-3">

	<!-- Card -->
	<div class="card card-bleed border-bottom border-bottom-md-0 shadow-light-lg">

	  <!-- Collapse -->
	  <div class="collapse d-md-block" id="sidenavCollapse">
		<div class="card-body">
		  <!-- Heading -->
		  
		  <h6 class="font-weight-bold text-uppercase mb-3">
			<a class="list-link text-reset" href="<?php echo base_url('user/dashboard'); ?>">
				Dashboard
			  </a>
		  </h6>
		  <hr>
		  <!-- Heading -->
		  <h6 class="font-weight-bold text-uppercase mb-3">
			Kelas saya
		  </h6>

		  <!-- List -->
		  <ul class="card-list list text-gray-700 mb-6">
			<li class="list-item">
			<?php if ($page_name == 'kelas_diikuti') { ?>
				<a class="list-link text-warning" href="<?php echo base_url('user/kelas_diikuti'); ?>">
				Kelas Diikuti
			  </a>
			<?php } else { ?>
				<a class="list-link text-reset" href="<?php echo base_url('user/kelas_diikuti'); ?>">
				Kelas Diikuti
			  </a>
			<?php }?>
			</li>
			<li class="list-item">
			  <a class="list-link text-reset" href="<?php echo site_url('publik/class_all'); ?>" target="_blank">
				Daftar Kelas
			  </a>
			</li>
			<li class="list-item">
			<?php if ($page_name == 'status_pesanan') { ?>
				<a class="list-link text-warning" href="<?php echo base_url('user/status_pesanan'); ?>">
				Status Pesanan
			  </a>
			<?php } else { ?>
				<a class="list-link text-reset" href="<?php echo base_url('user/status_pesanan'); ?>">
				Status Pesanan
			  </a>
			<?php }?>
			</li>
		  </ul>

		  <!-- Heading -->
		  <h6 class="font-weight-bold text-uppercase mb-3">
			Profil
		  </h6>

		  <!-- List -->
		  <ul class="card-list list text-gray-700 mb-0">
			<li class="list-item">
			<?php if ($page_name == 'akun_saya') { ?>
				<a class="list-link text-warning" href="<?php echo base_url('user/akun_saya'); ?>">
				Akun saya
			  </a>
			<?php } else { ?>
				<a class="list-link text-reset" href="<?php echo base_url('user/akun_saya'); ?>">
				Akun saya
			  </a>
			<?php }?>
			</li>
			<li class="list-item">
			<?php if ($page_name == 'ubah_password') { ?>
				<a class="list-link text-warning" href="<?php echo base_url('user/ubah_password'); ?>">
				Ubah Password
			  </a>
			<?php } else { ?>
				<a class="list-link text-reset" href="<?php echo base_url('user/ubah_password'); ?>">
				Ubah Password
			  </a>
			<?php }?>
			</li>
		  </ul>

		</div>
	  </div>

	</div>

  </div>