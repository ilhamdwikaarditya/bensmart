<!-- HEADER
    ================================================== -->
    <header class="bg-dark pt-9 pb-11 d-none d-md-block">
      <div class="container-md">
        <div class="row align-items-center">
          <div class="col">

            <!-- Heading -->
            <h1 class="font-weight-bold text-white mb-2">
              Dashboard Member
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
				  <div class="row">
					<div class="col">
					  <h3 class="mb-0">
						Invoice
					  </h3>
					</div>
					
				  </div>
				</div>
				<div class="bg-light py-5 px-5">

              <div class="card shadow-light-lg mx-2 my-2 px-6 py-6">
                <div class="row align-items-center ">
                  <div class="col">
                    <img src="<?php echo base_url() . 'assets/frontend/bensmart/img/logo_text_bensmart.png' ?>" class="navbar-brand-img mb-2" alt="..." height="20px">
                    <h4>#<?php echo $kd_booking; ?></h4>
                  </div>
<?php
$this->db->select("firstname,lastname,email,CASE WHEN a.status = '0' THEN 'BELUM DIBAYAR' ELSE 'SUDAH DIBAYAR' END status ");
$this->db->from('tr_class_member a');
$this->db->join('tr_payment b', 'a.kd_booking = b.kd_booking');
$this->db->join('ref_user c', 'b.cuser = c.id_user');
$this->db->where('b.cuser', $id_user);
$this->db->where('b.kd_booking', $kd_booking);
$headinv = $this->db->get()->row_array();
?>
                  <div class="col-auto">
                    Status :
                    <span class="font-weight-bold">
                      <?php echo $headinv['status']; ?>
                    </span>
                  </div>
                </div>
                <hr>
                <div class="row align-items-center mb-6">
                  <div class="col">
                    <p>
                      <small>
                        Bill From :
                      </small>
                      <br>
                      <span class="font-weight-bold"><?php echo get_settings('system_title'); ?></span>
                      <br>
                      <small><?php echo get_settings('system_email'); ?></small>
                      <br>
                      <small>kelasonline.bensmart.id</small>
                    </p>
                  </div>

                  <div class="col-auto">
                    <p>
                      <small>
                        Bill To :
                      </small>
                      <br>
                      <span class="font-weight-bold"><?php echo $headinv['firstname']." ".$headinv['lastname'] ?></span>
                      <br>
                      <small><?php echo $headinv['email']; ?></small>
                    </p>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title"><strong>Order Summary</strong></h4>
                      </div>
                      <div class="panel-body">
                        <div class="table-responsive">
                          <table class="table table-condensed">
                            <thead>
                              <tr>
                                <td><strong>Nama Produk</strong></td>
                                <td class="text-center"><strong></strong></td>
                                <td class="text-right"><strong>Harga</strong></td>
                              </tr>
                            </thead>
                            <tbody>
<?php
$this->db->select('nm_class, amount');
$this->db->from('tr_chart a');
$this->db->join('tr_class b', 'a.id_class = b.id_class', 'left');
$this->db->join('tr_class_member c', 'b.id_class = c.id_class', 'left');
$this->db->join('tr_payment d', 'c.kd_booking = d.kd_booking');
$this->db->where('id_user', $id_user);
$this->db->where('d.kd_booking', $kd_booking);

$detinvs = $this->db->get()->result_array();
$totamount = 0;
foreach ($detinvs as $detinv):
$totamount += $detinv['amount'];
?>
                              <tr>
                                <td><?php echo $detinv['nm_class']; ?></td>
                                <td class="text-center"></td>
                                <td class="text-right"><?php echo number_format($detinv['amount']); ?></td>
                              </tr>
                              <tr>
                                <td class="no-line"></td>
                                <td class="no-line text-center"><strong>Total</strong></td>
                                <td class="no-line text-right"><?php echo number_format($totamount); ?></td>
                              </tr>
<?php endforeach; ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
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
