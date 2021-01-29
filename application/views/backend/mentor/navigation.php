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
				<span>DASHBOARD</span>
			</a>
		</li>
		<?php 
			$session_level = $this->session->userdata('id_level');
			$CI =& get_instance();
			$CI->load->model('Menu_model');
			$result = $CI->Menu_model->getAllMenugroups($session_level)->result();
				foreach ($result as $rows){
		?>
		<li class="side-nav-item  ">
			<a href="javascript: void(0);" class="side-nav-link ">
				<i class="dripicons-network-1"></i>
				<span> <?php echo $rows->nm_menu_groups; ?> </span>
				<span class="menu-arrow"></span>
			</a>
			<ul class="side-nav-second-level" aria-expanded="false">
				<?php 

					$result_= $CI->Menu_model->getAllMenudetails($rows->id_menu_groups, $session_level)->result();
						foreach ($result_ as $rows_){
				?>
				<li class = "">
					<a href="<?php echo base_url(); ?><?php echo $rows_->url; ?>"><?php echo $rows_->nm_menu_details; ?></a>
				</li>
				<?php } ?>
			</ul>
		</li>
		<?php } ?>
	</ul>
	
	</ul>
	
	
</div>
