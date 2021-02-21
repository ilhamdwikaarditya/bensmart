<?php
$kd_booking = html_escape($this->uri->segment(3));
$user_details = $this->user_model->get_user($id_user,$id_level)->row_array();

$this->db->select('IFNULL(sum(discount_price),0) totprice');
$this->db->from('tr_chart a');
$this->db->join('tr_class b', 'a.id_class = b.id_class', 'left');
$this->db->join('tr_class_member c', 'CONCAT(a.id_class,a.id_user) = CONCAT(c.id_class,c.cuser)', 'left');
$this->db->join('tr_payment d', 'c.kd_booking = d.kd_booking');
$this->db->where('id_user', $id_user);
$this->db->where('d.kd_booking', $kd_booking);
$this->db->where('c.status', '0');
$this->db->group_by('c.id_class');
$cart_sum = $this->db->get()->row_array();

$digitrand = str_pad(rand(0, pow(10, 3)-1), 3, '0', STR_PAD_LEFT);
if($this->session->userdata('sessdigitrand')){ }else{ $this->session->set_userdata('sessdigitrand', $digitrand); }

?>
<!-- HEADER
    ================================================== -->
  <header class="bg-dark pt-9 pb-9 d-none d-md-block">
    <div class="container-md">
      <div class="row align-items-center">
        <div class="col">

          <!-- Heading -->
          <h1 class="font-weight-bold text-white mb-2">
            Pembayaran Kelas
          </h1>

        </div>
      </div> <!-- / .row -->
    </div> <!-- / .container -->
  </header>

  <!-- MAIN
    ================================================== -->
  <main class="pb-8 pb-md-11 mt-md-n6">
    <div class="container-md">
      <div class="row">
        <div class="col-12 col-md-8">

          <div class="card card-bleed border-bottom border-bottom-md-0 shadow-light-lg mb-4 pb-2">

            <!-- Collapse -->
            <div class="collapse d-md-block" id="sidenavCollapse">
              <div class="card-body">

                <!-- Heading -->

                <h4 class="font-weight-bold">
                  Transfer Pembayaran (Konfirmasi Manual)
                </h4>

                <small>
                  Silakan lakukan transfer sejumlah 
                  <span class="font-weight-bold">
                    Rp <?php echo number_format($cart_sum['totprice']+$this->session->userdata('sessdigitrand')); ?>
                  </span>
                  ke salah satu Nomor Rekening dibawah ini. Setelah melakukan pembayaran, lakukan Konfirmasi dengan melampirkan bukti pembayaran
                  melalui Whatsapp.                  
                </small>

                <hr class="mx-n4">

                <!-- List group -->
                <div class="list-group list-group-flush">
<?php
$this->db->from('ref_bank');
$this->db->where('active', '1');
$bank_datas = $this->db->get()->result_array();

foreach ($bank_datas as $bank_data):?>
                  <div class="list-group-item">
                    <div class="row mb-4 ml-0">
                      <img src="<?php echo base_url().'uploads/bank/'.$bank_data['photo'].'.png' ?>" alt="..." height="60" >
                    </div>
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Text -->
                        <small class="text-gray-700">
                          Bank
                        </small>

                        <!-- Heading -->
                        <h5 class="mb-0">
                          <?php echo $bank_data['bank']; ?>
                        </h5>
                      </div>

                      <div class="col-auto">
                        <!-- Text -->
                        <small class="text-gray-700">
                          No. Rekening
                        </small>

                        <!-- Heading -->
                        <h5 class="mb-0">
                          <?php echo $bank_data['no_rek']; ?>
                        </h5>
                      </div>

                      <div class="col-auto">
                        <!-- Text -->
                        <small class="text-gray-700">
                          Penerima
                        </small>

                        <!-- Heading -->
                        <h5 class="mb-0">
                          <?php echo $bank_data['nm_rek']; ?>
                        </h5>
                      </div>
                    </div>
                  </div>
<?php endforeach; ?> 
                </div>

              </div>
            </div>

          </div>

          <!-- Card -->
          <div class="card card-bleed shadow-light-lg mb-6">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col">
                  <!-- Heading -->
                  <h4 class="mb-0">
                    Detail Pesanan
                  </h4>

                </div>
              </div>
            </div>
            <div class="card-body">

              <!-- List group -->
              <div class="list-group list-group-flush">
<?php

$this->db->select('thumbnail,nm_class, group_concat(nm_mentor) nm_mentor, discount_price');
$this->db->from('tr_chart a');
$this->db->join('tr_class b', 'a.id_class = b.id_class', 'left');
$this->db->join('tr_class_mentor c', 'b.id_class = c.id_class', 'left');
$this->db->join('tr_class_member d', 'concat(a.id_class,a.id_user) = concat(d.id_class,d.cuser)', 'left');
$this->db->join('tr_payment e', 'd.kd_booking = e.kd_booking');
$this->db->where('id_user', $id_user);
$this->db->where('d.kd_booking', $kd_booking);
$this->db->where('d.status', '0');
$cart_datas = $this->db->get()->result_array();

foreach ($cart_datas as $cart_data):?>
                <div class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-auto">

                      <img class="avatar-img rounded" src="<?php echo base_url().'uploads/thumbnail_class/'.$cart_data['thumbnail'].'.jpg' ?>" alt="..."
                        style="height: 100px; width: 150px;">

                    </div>
                    <div class="col ml-md-n5">

                      <!-- Heading -->
                      <h4 class="mb-0">
                        <?php echo $cart_data['nm_class']; ?>
                      </h4>

                      <!-- Text -->
                      <small class="text-gray-700 mt-1  mb-2">
                        Mentor <?php echo $cart_data['nm_mentor']; ?>
                      </small>

                    </div>
                    <div class="col-md-auto">

                      <!-- Badge -->
                      <span class="badge badge-pill badge-primary-soft">
                        <span class="h6 text-uppercase font-weight-bold">Rp. <?php echo number_format($cart_data['discount_price']); ?></span>
                      </span>
                    </div>
                  </div>
                </div>
<?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-4">

          <!-- Card -->
          <div class="card card-bleed border-bottom border-bottom-md-0 shadow-light-lg mb-4">

            <!-- Collapse -->
            <div class="collapse d-md-block" id="sidenavCollapse">
              <div class="card-body mx-n2">

                <!-- Heading -->
                <h4 class="font-weight-bold mb-3">
                  Pembayaran
                </h4>

                <hr class="mx-n4">

                <div class="row">
                  <div class="col">
                    <p class="text-muted">
                      Sub Total
                    </p>
                  </div>
                  <div class="col-auto">
                    <h5 class="text-dark">Rp <?php echo number_format($cart_sum['totprice']); ?></h5>
                  </div>
                </div>

                <div class="row my-n2">
                  <div class="col">
                    <p class="text-muted">
                      Kode Unik
                    </p>
                  </div>
                  <div class="col-auto">
                    <h5 class="text-primary"><?php echo number_format($this->session->userdata('sessdigitrand')); ?></h5>
                  </div>
                </div>

                <hr class="mt-n1">

                <div class="row mb-n2">
                  <div class="col">
                    <h5 class="text-dark">
                      Total Pembayaran
                    </h5>
                  </div>
                  <div class="col-auto">
                    <h5 class="text-dark font-weight-bold">Rp <?php echo number_format($cart_sum['totprice']+$this->session->userdata('sessdigitrand')); ?></h5>
                  </div>
                </div>
              </div>
              
            </div>
            
          </div>

          <div class="card card-bleed border-bottom border-bottom-md-0 shadow-light-lg mb-4">

            <!-- Collapse -->
            <div class="collapse d-md-block" id="sidenavCollapse">
              <div class="card-body mx-n2">

                <!-- Heading -->

                <h4 class="font-weight-bold">
                  Konfirmasi Pembayaran
                </h4>

                <hr class="mx-n4">

                <!-- List group -->
                <div class="list-group list-group-flush">
                  <div class="list-group-item">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <img src="<?php echo base_url().'assets/frontend/bensmart/img/icons/social/79dc31280371b8ffbe56ec656418e122.png' ?>" alt="..."
                          width="50px" />
                      </div>
                      <div class="col ml-n6">

                        <!-- Heading -->
                        <p class="mb-0">
                          Whatsapp
                        </p>

                        <!-- Text -->
                        <small class="text-gray-700">
                          +62 882-2530-8030
                        </small>

                      </div>
                    </div>
                  </div>
                </div>

                <div class="join-container mx-n4 mt-2 mb-n5">
                  <a type="button" onClick="clickconfirm()" class="btn col-12 btn-sm mt-3 btn-success rounded-bottom"
                    style="border-radius: 0px 0px 30px 5px; color:white;">
                    Konfirmasi Pembayaran
                  </a>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>

    </div> <!-- / .row -->
    </div> <!-- / .container -->
  </main>

  <!-- CURVE
    ================================================== -->
  <div class="position-relative">
    <div class="shape shape-bottom shape-fluid-x svg-shim text-dark">
      <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0 48h2880V0h-720C1442.5 52 720 0 720 0H0v48z" fill="currentColor" /></svg>
    </div>
  </div>
  
<script type="text/javascript">

	function clickconfirm(){
		var nama = '<?php echo $user_details['firstname']." ".$user_details['lastname']; ?>';
		var email = '<?php echo $user_details['email']; ?>';

		window.open("https://api.whatsapp.com/send?phone=6288225308030&text=Halo,%20Saya%20"+nama+"%20sudah%20melakukan%20pembayaran%20kelas.%20%20Akses%20kelas%20untuk%20"+email+"%20Berikut%20saya%20lampirkan%20foto%20bukti%20pembayaran:");
		location.href = "<?php echo site_url('home/confirmation_success'); ?>";
	}
</script>
