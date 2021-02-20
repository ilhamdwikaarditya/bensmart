<?php
	$level = $this->session->userdata('id_level');
	$user_details = $this->user_model->get_user($id_user,$level)->row_array();
?>
<!-- HEADER
    ================================================== -->
  <header class="bg-dark pt-9 pb-9 d-none d-md-block">
    <div class="container-md">
      <div class="row align-items-center">
        <div class="col">

          <!-- Heading -->
          <h1 class="font-weight-bold text-white mb-2">
            Checkout Kelas
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

          <!-- Card -->
          <div class="card card-bleed shadow-light-lg mb-6">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col">
                  <!-- Heading -->
                  <h4 class="mb-0">
                    Daftar Pesanan
                  </h4>

                </div>
              </div>
            </div>
            <div class="card-body">

              <!-- List group -->
              <div class="list-group list-group-flush">
<?php

$this->db->select('GROUP_CONCAT(b.id_class) listclass');
$this->db->from('tr_chart a');
$this->db->join('tr_class b', 'a.id_class = b.id_class', 'left');
$this->db->join('tr_class_mentor c', 'b.id_class = c.id_class', 'left');
$this->db->where('id_user', $id_user);
$this->db->where('status_checked', 'checked');
$this->db->where('booked', '0');
$listclass = $this->db->get()->row_array();

$this->db->select('IFNULL(sum(discount_price),0) totprice');
$this->db->from('tr_chart a');
$this->db->join('tr_class b', 'a.id_class = b.id_class', 'left');
$this->db->where('id_user', $id_user);
$this->db->where('status_checked', 'checked');
$this->db->where('booked', '0');
$cart_sum = $this->db->get()->row_array();

$digitrand = str_pad(rand(0, pow(10, 3)-1), 3, '0', STR_PAD_LEFT);
if($this->session->userdata('sessdigitrand')){ }else{ $this->session->set_userdata('sessdigitrand', $digitrand); }

$this->db->select('thumbnail,nm_class, group_concat(nm_mentor) nm_mentor, discount_price');
$this->db->from('tr_chart a');
$this->db->join('tr_class b', 'a.id_class = b.id_class', 'left');
$this->db->join('tr_class_mentor c', 'b.id_class = c.id_class', 'left');
$this->db->where('id_user', $id_user);
$this->db->where('status_checked', 'checked');
$this->db->where('booked', '0');

$cart_datas = $this->db->get()->result_array();

foreach ($cart_datas as $cart_data):?>
                <div class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-auto">

                      <img class="avatar-img rounded" src="<?php echo base_url().'uploads/thumbnail_class/'.$cart_data['thumbnail'].'.jpg' ?>" alt="..."
                        style="height: 100px; width: 150px;">

                    </div>
                    <div class="col ml-n5">

                      <!-- Heading -->
                      <h4 class="mb-0">
                        <?php echo $cart_data['nm_class']; ?>
                      </h4>
						
					  <small class="text-gray-700 mt-1 mb-2">
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
<input id="listclass" type="hidden" value="<?php echo $listclass['listclass']; ?>" readonly>
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
              <form>
                <div class="row">
                  <div class="col-12 col-md-6">

                    <!-- Name -->
                    <div class="form-group">
                      <label for="name">Nama Lengkap</label>
                      <input class="form-control" id="name" type="text" value="<?php echo $user_details['firstname']." ".$user_details['lastname']; ?>" readonly>
                    </div>

                  </div>
                  <div class="col-12 col-md-6">

                    <!-- Email -->
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input class="form-control" id="email" type="email" value="<?php echo $user_details['email']; ?>" readonly>
                    </div>

                  </div>
                </div>
              </form>

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
                    <h5 class="text-primary"><?php echo $this->session->userdata('sessdigitrand'); ?></h5>
                  </div>
                </div>

                <hr class="mt-n1">

                <div class="row mb-n2">
                  <div class="col">
                    <h5 class="text-dark">
                      Total
                    </h5>
                  </div>
                  <div class="col-auto">
                    <h5 class="text-dark font-weight-bold">Rp <?php echo number_format($cart_sum['totprice']+$this->session->userdata('sessdigitrand')); ?></h5>
                  </div>
                </div>
                <div class="join-container mx-n4 mt-2 mb-n5">
                  <a type="button" onClick="nextpay()" class="btn col-12 btn-sm mt-3 btn-primary rounded-bottom" style="border-radius: 0px 0px 30px 5px; color:#fff" >
                    Lanjutkan Pembayaran
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
	function nextpay(){
		var listclass = $("#listclass").val();
		var totprice = '<?php echo $cart_sum['totprice']+$this->session->userdata('sessdigitrand'); ?>';
		var baseUrl = "<?php echo base_url() ?>user/add_class_member/";
		var textduplicate = "Kelas sudah dalam pemesanan";
		$.ajax({
			url: baseUrl,
			dataType: 'json',
			method: 'POST',
			data: {listclass:listclass,totprice:totprice},
			success: function(datas){
				location.href = "<?php echo site_url('home/confirmation_payment'); ?>";
			},
			error: function (xhr, ajaxOptions, thrownError) {
				info_modal(textduplicate);
			}
		});
	}
</script>