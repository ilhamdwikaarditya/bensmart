<?php
$user_details = $this->user_model->get_user($this->session->userdata('id_user'),$this->session->userdata('id_level'))->row_array();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-white">
	<div class="container">

		<!-- Brand -->
		<a class="navbar-brand" href="<?php echo site_url() ?>">
			<img src="<?php echo base_url() . 'assets/frontend/bensmart/img/logo_text_bensmart.png' ?>" class="navbar-brand-img mt-n3" height="20" alt="...">
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
					<a class="nav-link" id="navbarLandings" href="<?php echo site_url('publik/class_all'); ?>" aria-haspopup="true" aria-expanded="false">
						Belajar Apa Saja
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="navbarLandings" href="<?php echo site_url(); ?>" aria-haspopup="true" aria-expanded="false">
						Keunggulan
					</a>
				</li>
				<li class="nav-item mt-3 ml-md-auto mr-3 text-uppercase mb-0 position-relative d-flex">
            <style>
              li {
                list-style: none;
              }

              .fa,
              .fas {
                font-family: 'FontAwesome';
              }

              ul li a {
                font-size: 1.1rem;
                color: #343a40;
              }

              ul li a.cart:hover {
                text-decoration: none;
                color: #869ab8;
              }

              ul li a.cart .cart-basket {
                font-size: .6rem;
                position: absolute;
                top: -8px;
                right: -12px;
                width: 16px;
                height: 16px;
                color: #fff;
                background-color: #ffc107;
                border-radius: 50%;
              }
            </style>
            <div id="cart" class="d-none">

            </div>
            <a href="<?php echo site_url('home/shopping_cart'); ?>" class="cart position-relative d-inline-flex" aria-label="View your shopping cart">
              <i class="fas fa fa-shopping-cart fa-lg"></i>
              <span class="cart-basket d-flex align-items-center justify-content-center" id="count_cart">
<?php
	$iduser = $this->session->userdata('id_user');
	$count_cart = $this->db->query("SELECT COUNT(id_chart) totcart FROM tr_chart WHERE id_user = ".$this->db->escape($iduser)." AND booked = '0' ")->row("totcart");
	echo $count_cart;
?>
              </span>
            </a>
          </li>

			</ul>
			<ul class="list-unstyled topbar-right-menu float-right mb-0">
				<li class="dropdown notification-list">
					<a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" id="topbar-userdrop"
						href="#" role="button" aria-haspopup="true" aria-expanded="false">
						<span class="account-user-avatar">
							<img src="<?php echo $this->user_model->get_user_image_url_new($this->session->userdata('id_user')); ?>" alt="user-image" class="rounded-circle" style="width:35px; height:35px;">
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