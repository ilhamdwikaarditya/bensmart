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
                  Informasi Pesanan
                </h4>

              </div>
              <div class="card-body">
<?php
$this->db->select("kd_booking, f_formatTanggalindo(date(a.cdate)) dt , time(a.cdate) tm, b.status sts_pay");
$this->db->from("tr_payment a");
$this->db->join("tr_class_member b", "a.id_class_member = b.id_class_member");
$this->db->where("b.cuser", $id_user);
$this->db->group_by("kd_booking");
$inv_datas = $this->db->get()->result_array();
if(empty($inv_datas)){
	echo "Belum ada kelas yang dipesan.";
}else{
	foreach ($inv_datas as $inv_data):?>
                <!-- Form -->
				<div class="list-group list-group-flush">
                  <div class="list-group-item">
                    <div class="row align-items-center">
                      <div class="col">

                        <!-- Heading -->
                        <p class="mb-0">
                          <a href="#!"><?php echo $inv_data['kd_booking']; ?></a>
                        </p>

                        <!-- Text -->
                        <small class="text-gray-700">
                          <?php echo $inv_data['dt']." - ".$inv_data['tm']; ?>
                        </small>

                      </div>
                      <div class="col-auto">

                        <!-- Button -->
                        
                          <?php if($inv_data['sts_pay'] == '0'){ ?>
							<a type="button" href="<?php echo site_url('home/confirmation_payment_from_panel/').$inv_data['kd_booking']; ?>" target="_blank" class="btn btn-xs btn-outline-white">
								Bayar
							</a>
						  <?php }else{ ?>
							<span class="badge badge-pill badge-success-soft">
								<span class="h6 text-uppercase font-weight-bold">Selesai</span>
							</span>
						  <?php } ?>
                        

                      </div>
                    </div>
                  </div>
                </div>
	<?php endforeach; ?>
<?php } ?>
              </div>
            </div>

          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </main>
