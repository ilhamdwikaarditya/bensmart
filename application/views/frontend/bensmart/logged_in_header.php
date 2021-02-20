<?php
$user_details = $this->user_model->get_user($this->session->userdata('id_user'),$this->session->userdata('id_level'))->row_array();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-white">
	<div class="container">

		<!-- Brand -->
		<a class="navbar-brand" href="<?php echo site_url() ?>">
			<img src="<?php echo base_url() . 'assets/frontend/bensmart/img/logo_text_bensmart.png' ?>" class="navbar-brand-img" height="17" alt="...">
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
				<?php if ($this->session->userdata('admin_login')) : ?>
					<li class="nav-item">
						<a class="nav-link" id="navbarLandings" href="#" aria-haspopup="true" aria-expanded="false">
							Administrator
						</a>
					</li>
				<?php endif; ?>
				<li class="nav-item">
					<a class="nav-link" id="navbarLandings" href="<?php echo site_url('home/tentang'); ?>" aria-haspopup="true" aria-expanded="false">
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
				<li class="nav-item fas">
					<a class="nav-link" id="navbarLandings" href="<?php echo site_url('home/shopping_cart'); ?>" aria-haspopup="true" aria-expanded="false">
						<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart4 pb-0" viewBox="0 0 20 20">
						  <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
						</svg>
					</a>
				</li>

			</ul>
			<ul class="list-unstyled topbar-right-menu float-right mb-0">
				<li class="dropdown notification-list">
					<a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" id="topbar-userdrop"
						href="#" role="button" aria-haspopup="true" aria-expanded="false">
						<span class="account-user-avatar">
							<img src="<?php echo $this->user_model->get_user_image_url($this->session->userdata('id_user')); ?>" alt="user-image" class="rounded-circle" style="width:35px; height:35px;">
						</span>
						&nbsp;
						<span style="color: #506690; ">
							<?php
							$logged_in_user_details = $this->user_model->get_all_user($this->session->userdata('id_user'))->row_array();;
							?>
							<span class="account-user-name"><b><?php echo $logged_in_user_details['firstname'];?></b></span>
						</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown"
						aria-labelledby="topbar-userdrop">
						<?php if (strtolower($this->session->userdata('role')) == 'user'): ?>
							<!-- Account -->
							<a href="<?php echo site_url(strtolower($this->session->userdata('role'))); ?>" class="dropdown-item notify-item">
								<i class="mdi mdi-account-circle mr-1"></i>
								<span>Akun saya</span>
							</a>
						<?php endif; ?>
						<?php if (strtolower($this->session->userdata('role')) == 'admin'): ?>
							<!-- Account -->
							<a href="<?php echo site_url(strtolower($this->session->userdata('role')).'/manage_profile'); ?>" class="dropdown-item notify-item">
								<i class="mdi mdi-account-circle mr-1"></i>
								<span>Akun saya</span>
							</a>
							<!-- settings-->
							<a href="<?php echo site_url('admin/system_settings'); ?>" class="dropdown-item notify-item">
								<i class="mdi mdi-settings mr-1"></i>
								<span><?php echo get_phrase('settings'); ?></span>
							</a>

						<?php endif; ?>


						<!-- Logout-->
						<a href="<?php echo site_url('login/logout'); ?>" class="dropdown-item notify-item">
							<i class="mdi mdi-logout mr-1"></i>
							<span><?php echo get_phrase('logout'); ?></span>
						</a>
					</div>
				</li>
			</ul>
		</div>
</nav>