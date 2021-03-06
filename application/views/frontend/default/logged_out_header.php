<section class="menu-area">
  <div class="container-xl">
    <div class="row">
      <div class="col">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">

          <ul class="mobile-header-buttons">
            <li><a class="mobile-nav-trigger" href="#mobile-primary-nav">Menu<span></span></a></li>
            <li><a class="mobile-search-trigger" href="#mobile-search">Search<span></span></a></li>
          </ul>

          <a href="<?php echo site_url(''); ?>" class="navbar-brand" href="#"><img src="<?php echo base_url('uploads/system/'.get_frontend_settings('dark_logo')); ?>" alt="" height="25"></a>

          <?php  include 'menu.php'; ?>

          <form class="inline-form" action="<?php echo site_url('home/search'); ?>" method="get" style="width: 100%;">
            <div class="input-group search-box mobile-search">
              <input type="text" name = 'query' class="form-control" placeholder="Pencarian kelas">
              <div class="input-group-append">
                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </form>

          <?php if ($this->session->userdata('admin_login')): ?>
            <div class="instructor-box menu-icon-box">
              <div class="icon">
                <a href="<?php echo site_url('admin'); ?>" style="border: 1px solid transparent; margin: 10px 10px; font-size: 14px; width: 100%; border-radius: 0;"><?php echo site_phrase('administrator'); ?></a>
              </div>
            </div>
          <?php endif; ?>

			<div class="instructor-box menu-icon-box">
				<div class="icon">
					<a href="<?php echo site_url('home/about_us'); ?>" style="border: 1px solid transparent; margin: 10px 10px; font-size: 14px; width: 100%; border-radius: 0; min-width: 100px;">Tentang Kami</a>
				</div>
			</div>
			<div class="instructor-box menu-icon-box">
				<div class="icon">
					<a href="<?php echo site_url('#'); ?>" style="border: 1px solid transparent; margin: 10px 10px; font-size: 14px; width: 100%; border-radius: 0; min-width: 100px;">Belajar apa saja</a>
				</div>
			</div>
			<div class="instructor-box menu-icon-box">
				<div class="icon">
					<a href="<?php echo site_url('#'); ?>" style="border: 1px solid transparent; margin: 10px 10px; font-size: 14px; width: 100%; border-radius: 0; min-width: 100px;">Keunggulan</a>
				</div>
			</div>
			
			<div class="cart-box menu-icon-box" id = "cart_items">
				<?php include 'cart_items.php'; ?>
			</div>
			
			<span class="signin-box-move-desktop-helper"></span>
			<div class="sign-in-box btn-group">

            <a href="<?php echo site_url('home/login'); ?>" class="btn btn-sign-up">Masuk Kelas</a>


          </div> <!--  sign-in-box end -->
        </nav>
      </div>
    </div>
  </div>
</section>
