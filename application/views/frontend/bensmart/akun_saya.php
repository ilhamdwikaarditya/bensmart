<?php
$data_akun = $this->db->get_where('ref_user', array('id_user' => $this->session->userdata('id_user')))->row_array();
?>
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
                  Informasi Akun
                </h4>

              </div>
              <div class="card-body">

                <!-- Form -->
				<form action="<?php echo site_url('master/member/edit/'.$data_akun['id_user']); ?>" enctype="multipart/form-data" method="post">
                  <div class="row">
                    <div class="col-12 col-md-6">

                      <!-- Name -->
                      <div class="form-group">
                        <label for="firstname">&nbsp;Nama Depan</label>
                        <input class="form-control" id="firstname" name="firstname" type="text" placeholder="Nama depan" value="<?php echo $data_akun['firstname']; ?>">
                      </div>

                    </div>
					<div class="col-12 col-md-6">

                      <div class="form-group">
                        <label for="lastname">&nbsp;Nama Belakang</label>
                        <input class="form-control" id="lastname" name="lastname" type="text" placeholder="Nama belakang" value="<?php echo $data_akun['lastname']; ?>">
                      </div>

                    </div>
					<div class="col-12 col-md-12">

                      <div class="form-group">
                        <label for="address">&nbsp;Alamat</label>
                        <input class="form-control" id="address" name="address" type="text" placeholder="Alamat" value="<?php echo $data_akun['address']; ?>">
                      </div>

                    </div>
                    <div class="col-12 col-md-6">

                      <!-- Email -->
                      <div class="form-group">
                        <label for="email">&nbsp;Email</label>
                        <input class="form-control" id="email" name="email" type="email" placeholder="name@address.com" value="<?php echo $data_akun['email']; ?>">
                      </div>

                    </div>
					<div class="col-12 col-md-6">

                      <div class="form-group">
                        <label for="phone">&nbsp;No Telp</label>
                        <input class="form-control" id="phone" name="phone" type="phone" placeholder="No Telp" value="<?php echo $data_akun['phone']; ?>">
                      </div>

                    </div>
					
					<div class="col-12 col-md-2">
						<div class="row align-items-center">
						  <div class="col-auto">
							<!-- Avatar -->
							<div class="avatar avatar-xl">
							  <img class = "rounded-circle img-thumbnail" src="<?php echo $this->master_model->get_user_photo_url($data_akun['id_user']);?>" alt="" style="height: 60px; width: 60px;">
							</div>
						  </div>
						</div>
					</div>
					<div class="col-12 col-md-4">	  
						  <div class="col ml-n5">
							<!-- Heading -->
							<p class="mb-0">
							  &nbsp;Foto saya
							</p>
							<!-- Text -->
							<small class="text-gray-700">
							  JPG dengan ukuran maks 1 Mb
							</small>
						  </div>
					</div>
                    
					<div class="col-12 col-md-6">
						<div class="input-group">
							<div class="custom-file">
								<input type="file" class="custom-file-input" name = "photo" id="photo" onchange="changeTitleOfImageUploader(this)" accept="image/*">
								<label class="custom-file-label ellipsis" for="photo">Pilih Foto</label>
							</div>
						</div>
                    </div>
					
					
                    <div class="col-12 col-md-12">

                      <!-- Button -->
                      <button class="btn btn-block btn-primary" type="submit">
                        Simpan
                      </button>

                    </div>
                  </div>
                </form>
              </div>
            </div>

          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </main>