<div class="row ">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">
				<h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Atur Profil</h4>
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div><!-- end col-->
</div>

<div class="row ">
	<div class="col-xl-6">
		<div class="card">
			<div class="card-body">
				<h4 class="header-title mb-3">Info Umum</h4>
				<?php
				foreach ($edit_data as $row) :
					// $social_links = json_decode($row['social_links'], true);
				?>
					<?php echo form_open(site_url('mentor/manage_profile/update_profile_info/' . $row['id_user']), array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>

					<div class="form-group">
						<label>Firstname</label>
						<input type="text" class="form-control" name="firstname" value="<?php echo $row['firstname']; ?>" required />
					</div>

					<div class="form-group">
						<label>Lastname</label>
						<input type="text" class="form-control" name="lastname" value="<?php echo $row['lastname']; ?>" required />
					</div>

					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" required disabled />
					</div>

					<div class="form-group">
						<label>No Telpon</label>
						<input type="text" class="form-control" name="phone" value="<?php echo $row['phone']; ?>" required />
					</div>

					<div class="form-group">
						<label>Alamat</label>
						<input type="text" class="form-control" name="address" value="<?php echo $row['address']; ?>" required />
					</div>

					<div class="form-group">
						<label> <?php echo get_phrase('photo'); ?> <small>(<?php echo get_phrase('the_image_size_should_be_any_square_image'); ?>)</small> </label>
						<div class="d-flex mt-2">
							<div class="">
								<img class="rounded-circle img-thumbnail" src="<?php echo $this->master_model->get_user_photo_url($this->session->userdata('id_user')); ?>" alt="" style="height: 50px; width: 50px;">
							</div>
							<div class="flex-grow-1 pl-2">
								<div class="input-group">
									<div class="custom-file">
										<input type="file" class="custom-file-input" name="photo" id="photo" onchange="changeTitleOfImageUploader(this)" accept="image/*">
										<label class="custom-file-label ellipsis" for="">Pilih File</label>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row justify-content-center">
						<button type="submit" class="btn btn-primary">Ubah Profil</button>
					</div>
					</form>
				<?php
				endforeach;
				?>
				</form>
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div>
	<div class="col-xl-6">
		<div class="card">
			<div class="card-body">
			<h4 class="header-title mb-3">Info Biografi</h4>
				<?php foreach ($edit_data as $row) : ?>
					<?php echo form_open(site_url('mentor/manage_profile/update_profile_bio/' . $row['id_user']), array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top')); ?>
					<div class="form-group">
						<label>Kata kata Mutiara</label>
						<textarea rows="5" id="short-title" class="form-control" name="quotes" placeholder="Kata Kata Mutiara" required><?php echo $row['quotes']; ?></textarea>
					</div>

					<div class="form-group">
						<label>Biografi</label>
						<textarea rows="5" class="form-control" name="bio" id="bio" placeholder="Biografi" required><?php echo $row['bio']; ?></textarea>
					</div>
					<div class="row justify-content-center">
						<button type="submit" class="btn btn-success">Ubah Bio</button>
					</div>
					</form>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<!-- <div class="col-xl-6">
		<div class="card">
			<div class="card-body">
				<?php foreach ($edit_data as $row) : ?>
					<?php echo form_open(site_url('mentor/manage_profile/change_password/' . $row['id_user']), array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top')); ?>
					<div class="form-group">
						<label>Password Sekarang</label>
						<input type="password" class="form-control" name="current_password" value="" required />
					</div>
					<div class="form-group">
						<label>Password Baru</label>
						<input type="password" class="form-control" name="new_password" value="" required />
					</div>
					<div class="form-group">
						<label>Konfirmasi Password Baru</label>
						<input type="password" class="form-control" name="confirm_password" value="" required />
					</div>
					<div class="row justify-content-center">
						<button type="submit" class="btn btn-info">Ubah Password</button>
					</div>
					</form>
				<?php endforeach; ?>
			</div>
		</div>
	</div> -->
</div>

<script type="text/javascript">
	$(document).ready(function() {
		initSummerNote(['#biography']);
	});
</script>