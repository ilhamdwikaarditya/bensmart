<?php
$status_wise_courses = $this->crud_model->get_status_wise_courses();
?>
<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu left-side-menu-detached">
	<div class="leftbar-user">
		<a href="javascript: void(0);">
			<img src="<?php echo $this->user_model->get_user_image_url($this->session->userdata('user_id')); ?>" alt="user-image" height="42" class="rounded-circle shadow-sm">
			<?php
			$admin_details = $this->user_model->get_all_user($this->session->userdata('user_id'))->row_array();
			?>
			<span class="leftbar-user-name"><?php echo $admin_details['first_name'].' '.$admin_details['last_name']; ?></span>
		</a>
	</div>

	<!--- Sidemenu -->
	<ul class="metismenu side-nav side-nav-light">

		<li class="side-nav-title side-nav-item"><?php echo get_phrase('navigation'); ?></li>

		<li class="side-nav-item <?php if ($page_name == 'dashboard')echo 'active';?>">
			<a href="<?php echo site_url('admin/dashboard'); ?>" class="side-nav-link">
				<i class="dripicons-view-apps"></i>
				<span><?php echo get_phrase('dashboard'); ?></span>
			</a>
		</li>

		<li class="side-nav-item <?php if ($page_name == 'categories' || $page_name == 'category_add' || $page_name == 'category_edit' ): ?> active <?php endif; ?>">
			<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'categories' || $page_name == 'category_add' || $page_name == 'category_edit' ): ?> active <?php endif; ?>">
				<i class="dripicons-network-1"></i>
				<span> <?php echo get_phrase('categories'); ?> </span>
				<span class="menu-arrow"></span>
			</a>
			<ul class="side-nav-second-level" aria-expanded="false">
				<li class = "<?php if($page_name == 'categories' || $page_name == 'category_edit') echo 'active'; ?>">
					<a href="<?php echo site_url('admin/categories'); ?>"><?php echo get_phrase('categories'); ?></a>
				</li>

				<li class = "<?php if($page_name == 'category_add') echo 'active'; ?>">
					<a href="<?php echo site_url('admin/category_form/add_category'); ?>"><?php echo get_phrase('add_new_category'); ?></a>
				</li>
			</ul>
		</li>
		
		<?php $session_level = '1'?>
        <?php foreach ($this->Menu_model->getAllMenugroups($session_level)->result() as $rows) { ?>
		
		<?php } ?>
</div>
