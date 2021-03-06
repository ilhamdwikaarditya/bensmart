<style>
.checked {
  color: #fdcc0d;
}
</style>


<body>
  <section>
    <div class="container">
      <div class="row mt-8">
        <!-- Card Left -->
        <div class="col-lg-8 mb-5">
          <div class="card shadow-light-lg px-5 py-5">
            <div class="card-header-class">
              <h1 class="font-weight-bold">
                <?php echo $course['nm_class'] ?>
              </h1>

              <div class="row ml-0 mt-n2 mb-5">
                <h5>
                  <span class="font-weight-bold">4.0 </span>

                </h5>

                <div class="star mt-0 ml-2">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                </div>

                <h5 class="text-muted mt-0 ml-2">(4.000 reviews)</h5>

              </div>
            </div>

            <div class="card-body-class">
              <p>
                <?php echo strip_tags(html_entity_decode($course['desc_class'])); ?>
              </p>
            </div>
            <hr>

            <section>

              <div class="row ml-0">
                <h3 class="font-weight-bold">
                  Daftar Materi
                </h3>
              </div>

              <div class="row justify-content-center">

                <div class="col-12">

                  <!-- Card -->
                  <div class="card accordion" id="featuresAccordion">
                    <div class="card-body shadow-light">

                      <!-- List group -->
                      <div class="list-group list-group-flush mb-0">
                        <?php
                        $materi_group = $this->manajemen_kelas_model->get_materi_section('class', $course['id_class'])->result_array();
                        foreach ($materi_group as $index => $materi) : ?>
                          <div class="list-group-item">
                            <!-- Toggle -->
                            <a class="d-flex align-items-center text-reset text-decoration-none" data-toggle="collapse" href="#featuresOne-<?php echo $materi['id_class_materi_section'] ?>" role="button" aria-expanded="true" aria-controls="featuresOne">
                              <div class="mr-auto">

                                <!-- Title -->
                                <p class="font-weight-bold mb-2">
                                  <?php echo $materi['nm_class_materi_section'] ?>
                                </p>
                                <!-- Text -->
                                <!-- <p class="font-size-sm text-muted mb-0">
                                  Our new key fobs make it so easy!
                                </p> -->
                              </div>

                              <!-- Chevron -->
                              <span class="collapse-chevron text-muted ml-4">
                                <i class="fe fe-lg fe-chevron-down"></i>
                              </span>
                            </a> <!-- / .row -->

                            <!-- Collapse -->
                            <div class="collapse show bg-light" id="featuresOne-<?php echo $materi['id_class_materi_section'] ?>" data-parent="#featuresAccordion">
                              <?php
                              $materi_detail = $this->manajemen_kelas_model->get_materi_detail('section', $materi['id_class_materi_section'])->result_array();
                              foreach ($materi_detail as $index => $detail) : ?>
                                <div class="py-5 py-md-2">
                                  <p class="ml-5">
                                    <?php echo $detail['nm_class_materi_detail'] ?>
                                  </p>
                                </div>
                              <?php endforeach; ?>
                            </div>
                          </div>
                        <?php endforeach; ?>

                      </div>

                    </div>
                  </div>

                </div>
              </div> <!-- / .row -->

            </section>

            <hr>

            <div class="section">

              <h3 class="font-weight-bold">
                Mentor Kelas
              </h3>

              <?php
              $class_mentor = $this->manajemen_kelas_model->get_mentor_kelas($course['id_class'])->result_array();
              foreach ($class_mentor as $index => $mentor) : ?>
                <div class="d-flex bd-highlight mb-3">
                  <div class="mr-auto bd-highlight">
                    <div class="avatar avatar-xxl justify-content-center">
                      <!-- <img src="<?php echo base_url() . 'assets/frontend/bensmart/img/avatars/avatar-4.jpg' ?>" alt="..." class="card-img-top"> -->
                      <img src="<?php echo base_url() . 'uploads/user_image/' . $mentor['photo'] . '.jpg' ?>" alt="..." class="card-img-top">
                    </div>

                    <div class="d-flex bd-highlight justify-content-center">
                      <p class="mr-1">4.7</p>
                      <span class="fa fa-star checked mt-1 mb-0"></span>
                    </div>
                  </div>

                  <div class="ml-5 bd-highlight">
                    <h4 class="mb-0 ">
                      <?php echo $mentor['nm_mentor']; ?>
                    </h4>

                    <p class="text-muted mb-1" style="font-size: 16px; font-style: italic;">
                      "<?php echo strip_tags(html_entity_decode($mentor['quotes'])) ?>"
                    </p>

                    <p style="font-size: 17px;">
                      <?php echo strip_tags(html_entity_decode($mentor['bio'])) ?>
                    </p>
                  </div>
                </div>
              <?php endforeach; ?>

            </div>

          </div>

        </div>

        <!-- Card Right -->
        <div class="col-lg-4" data-aos="fade-up">

          <!-- Card -->
          <div class="card shadow-light-lg mb-6 mb-md-4 lift lift-lg">

            <!-- Image -->
            <img src="<?php echo base_url() . 'uploads/thumbnail_class/' . $course['thumbnail'] . '.jpg' ?>" alt="..." class="card-img-top">
            <!-- <img src="<?php echo base_url() . 'assets/frontend/bensmart/img/covers/cover-13.jpg' ?>" alt="..." class="card-img-top"> -->

            <!-- Shape -->
            <div class="position-relative">
              <div class="shape shape-bottom shape-fluid-x svg-shim text-white">
                <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M0 48h2880V0h-720C1442.5 52 720 0 720 0H0v48z" fill="currentColor" />
                </svg>
              </div>
            </div>

            <!-- Body -->
            <div class="card-body position-relative">

              <!-- Badge -->
              <div class="position-relative text-right mt-n7 mr-n5 mb-2 px-3">
                <span class="badge badge-pill badge-primary">
                  <span class="h6 fst-italic"><s>Rp <?php echo number_format($course['price'], 0, ",", ".") ?></s></span>
                  <span class="h5 font-weight">Rp <?php echo number_format($course['discount_price'], 0, ",", ".") ?></span>
                </span>
              </div>

              <!-- Heading -->

              <h4 class="font-weight-bold">
                Apa yang akan kamu dapatkan?
              </h4>

              <div class="row align-items-center">
                <p>
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-card-heading ml-5" viewBox="0 0 20 20">
                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                    <path d="M3 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0-5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-1z" />
                  </svg>
                <p class="align-items-center ml-1">Sertifikat Kelulusan</p>
                </p>
              </div>

              <div class="row align-items-center mt-n2">
                <p>
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-play-circle ml-5" viewBox="0 0 20 20">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445z" />
                  </svg>
                <p class="align-items-center ml-1"><?php echo $course['jmlmateri']; ?> Materi, Durasi:
                  <?php
                  $hitduration = explode(":", $course['sumduration']);
                  $jam   = $hitduration[0];
                  $menit = $hitduration[1];
                  $detik = $hitduration[2];
                  if ($jam == '00') {
                    echo $menit . " Menit";
                  } else {
                    echo $jam . " Jam " . $menit . " Menit";
                  }
                  ?></p>
                </p>
              </div>

              <div class="row align-items-center mt-n2">
                <p>
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clock-history ml-5" viewBox="0 0 20 20">
                    <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                    <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
                    <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
                  </svg>
                <p class="align-items-center  ml-1">Akses Materi Selamanya</p>
                </p>
              </div>

              <a type="button" onClick="buychart()" class="mt-4 btn-primary btn-block btn-sm text-center btn-primary text-decoration-none">
                Beli Kelas
              </a>

              <a type="button" onClick="addchart()" class="btn-secondary btn-block btn-sm text-center btn-primary text-decoration-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart4 pb-0" viewBox="0 0 20 20">
                  <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                </svg>
                Tambahkan ke Keranjang

              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
<script type="text/javascript">
	function addchart(){
		var sessuser = '<?php echo $this->session->userdata('id_user'); ?>';

		if(sessuser == ''){
			var text = "Anda belum Login";
			info_modal(text);
			return false;
		}
		var flag = '<?php echo $course['flag']; ?>';
		var id   = '<?php echo $course['id_class']; ?>';
		var texting = "Berhasil dimasukan keranjang";
		var baseUrl = "<?php echo base_url() ?>user/add_chart/";
		$.ajax({
			url: baseUrl,
			dataType: 'json',
			method: 'POST',
			data: {flag:flag,id:id},
			success: function(datas){
				info_modal(texting);
			},
			error: function (xhr, ajaxOptions, thrownError) {
				//alert("Ups Ada sedikit kesalahan.. Segera Hubungi Administrator ");
			}
		});
	}
	
	function buychart(){
		var sessuser = '<?php echo $this->session->userdata('id_user'); ?>';

		if(sessuser == ''){
			var text = "Anda belum Login";
			info_modal(text);
			return false;
		}
		var flag = '<?php echo $course['flag']; ?>';
		var id   = '<?php echo $course['id_class']; ?>';
		var texting = "Berhasil dimasukan keranjang";
		var baseUrl = "<?php echo base_url() ?>user/add_chart/";
		$.ajax({
			url: baseUrl,
			dataType: 'json',
			method: 'POST',
			data: {flag:flag,id:id},
			success: function(datas){
				location.href = "<?php echo site_url('home/shopping_cart'); ?>";
			},
			error: function (xhr, ajaxOptions, thrownError) {
				//alert("Ups Ada sedikit kesalahan.. Segera Hubungi Administrator ");
			}
		});
	}
</script>