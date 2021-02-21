  <!-- HEADER
    ================================================== -->
  <header class="bg-dark pt-9 pb-9 d-none d-md-block">
    <div class="container-md">
      <div class="row align-items-center">
        <div class="col">

          <!-- Heading -->
          <h1 class="font-weight-bold text-white mb-2">
            Keranjang Belanja
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
$this->db->select('IFNULL(sum(discount_price),0) totprice');
$this->db->from('tr_chart a');
$this->db->join('tr_class b', 'a.id_class = b.id_class', 'left');
$this->db->where('id_user', $id_user);
$this->db->where('status_checked', 'checked');
$this->db->where('booked', '0');
$cart_sum = $this->db->get()->row_array();

$this->db->from('tr_chart a');
$this->db->join('tr_class b', 'a.id_class = b.id_class', 'left');
$this->db->where('id_user', $id_user);
$this->db->where('booked', '0');
$cart_datas = $this->db->get()->result_array();
if(!empty($cart_datas)){
    foreach ($cart_datas as $cart_data):?>
      <div class="list-group-item">
        <div class="row align-items-center">
          <div class="col-auto">
            <input type="checkbox" class="checkbox" onChange="readcheckbox(this,'<?php echo $cart_data['id_class']; ?>')" value="<?php echo $cart_data['discount_price']; ?>" <?php echo $cart_data['status_checked']; ?>> <!--checked or not -->
          </div>
          <div class="col-auto ml-n5">

            <img class="avatar-img rounded" src="<?php echo base_url().'uploads/thumbnail_class/'.$cart_data['thumbnail'].'.jpg' ?>" alt="..."
              style="height: 100px; width: 150px;">

          </div>
          <div class="col ml-n5">

            <!-- Heading -->
            <h4 class="mb-0">
              <?php echo $cart_data['nm_class']; ?>
            </h4>

            <span class="badge badge-pill badge-primary-soft">
              <span class="h6 text-uppercase font-weight-bold">Rp. <?php echo number_format($cart_data['discount_price']); ?></span>
            </span>

          </div>
          <div class="col-md-auto">

            <!-- Badge -->
          <a type="button" onClick="DeleteCart('<?php echo $cart_data['id_class']; ?>')">
            <span class="badge badge-pill badge-dark-soft">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
              <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
            </svg>
            </span>
          </a>
          </div>
        </div>
      </div>
    <?php endforeach;
} else { ?>
  <div class="list-group-item">
        <div class="row align-items-center">
          <div class="col-auto">
            <p>Tidak ada data dalam keranjang.</p>
          </div>
        </div>
      </div>
<?php }?>

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
                  Ringkasan Pesanan
                </h4>

                <hr class="mx-n4">

                <div class="row">
                  <div class="col">
                    <p class="text-muted" style="font-size: 15px;" id="countingclass">
                      Sub Total
                    </p>
                  </div>
                  <div class="col-auto">
                    <h5 class="text-dark" id="pricechecked">Rp <?php echo number_format($cart_sum['totprice']); ?></h5>
                  </div>
                </div>

                <hr class="mt-n1">

                <div class="row">
                  <div class="col">
                    <h5 class="text-dark">
                      Total
                    </h5>
                  </div>
                  <div class="col-auto">
                    <h5 class="text-dark font-weight-bold" id="totprice">Rp <?php echo number_format($cart_sum['totprice']); ?></h5>
                  </div>
                </div>
                <?php if(!empty($cart_datas)){ ?>
                  <div class="join-container mx-n4 mb-n5">
                  <a href="<?php echo site_url('home/checkout_class'); ?>" class="btn col-12 btn-sm btn-primary mt-3 rounded-bottom"
                    style="border-radius: 0px 0px 30px 5px;">
                    Checkout
                  </a>
                </div>
                <?php } else { ?>
                  <div class="join-container mx-n4 mb-n5">
                  <a href="" class="btn col-12 btn-sm btn-primary mt-3 rounded-bottom"
                    style="border-radius: 0px 0px 30px 5px;pointer-events: none;">
                    Checkout
                  </a>
                </div>
                <?php } ?>
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
	var formatter = new Intl.NumberFormat('ID', {
		currency: 'IDR',
	});
	
	$(".checkbox").change(function () {
		var count = 0;
		var table_abc = document.getElementsByClassName("checkbox");
		for (var i = 0; table_abc[i]; ++i) {

			if (table_abc[i].checked) {
				var value = table_abc[i].value;
				count += Number(table_abc[i].value);
			}
		}

		$("#pricechecked").html("Rp "+formatter.format(count));
		$("#totprice").html("Rp "+formatter.format(count));
		
	});
	
	function DeleteCart(id){

		var flag = "class";
		var texting = "Berhasil dihapus";
		var baseUrl = "<?php echo base_url() ?>user/delete_chart/";
		$.ajax({
			url: baseUrl,
			dataType: 'json',
			method: 'POST',
			data: {flag:flag,id:id},
			success: function(datas){
				window.location.reload();
			},
			error: function (xhr, ajaxOptions, thrownError) {
				//alert("Ups Ada sedikit kesalahan.. Segera Hubungi Administrator ");
			}
		});
	}
	
	function readcheckbox(checkboxElem,val) {
		if (checkboxElem.checked) {
			var status_checked = 'checked';
		} else {
			var status_checked = '';
		}
		
		var baseUrl = "<?php echo base_url() ?>user/update_check_cart/";
		$.ajax({
			url: baseUrl,
			dataType: 'json',
			method: 'POST',
			data: {id_class:val,status_checked:status_checked},
		});
	}
</script>
