<?php
isset($id_class_materi_detail) ? "" : $id_class_materi_detail = "0";
?>
<style>
  .rating {
    display: inline-block;
    position: relative;
    height: 50px;
    line-height: 50px;
    font-size: 50px;
  }

  .rating label {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    cursor: pointer;
  }

  .rating label:last-child {
    position: static;
  }

  .rating label:nth-child(1) {
    z-index: 5;
  }

  .rating label:nth-child(2) {
    z-index: 4;
  }

  .rating label:nth-child(3) {
    z-index: 3;
  }

  .rating label:nth-child(4) {
    z-index: 2;
  }

  .rating label:nth-child(5) {
    z-index: 1;
  }

  .rating label input {
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
  }

  .rating label .icon {
    float: left;
    color: transparent;
  }

  .rating label:last-child .icon {
    color: #f2f2f2;
  }

  .rating:not(:hover) label input:checked~.icon,
  .rating:hover label:hover input~.icon {
    color: #ffcc00;
  }

  .rating label input:focus:not(:checked)~.icon:last-child {
    color: #f2f2f2;
    text-shadow: 0 0 5px #ffcc00;
  }
</style>
<!-- HEADER
    ================================================== -->
<header class="bg-dark pt-9 pb-11 d-none d-md-block">
  <div class="container-md">
    <div class="row align-items-center">
      <div class="col">
        <!-- Heading -->
        <h2 class="font-weight-bold text-white mb-2">
          <?php echo $course['nm_class'] ?>
        </h2>
        <h5 class="align-items-center pb-2 text-gray-700"><?php echo $course['jmlmateri']; ?> Materi, Durasi:
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
          ?>
        </h5>
      </div>
      <div class="col-auto">
        <!-- Button -->
        <a class="btn btn-xs btn-gray-300-20" href="<?php echo base_url() . 'user/kelas_diikuti/' ?>">
          <i class="fe fe-arrow-left"></i> Kembali
        </a>
      </div>
      <?php
      $cekrating = $this->manajemen_kelas_model->cek_rating_kelas($course['id_class'], $this->session->userdata('id_user'))->row_array();
      if (empty($cekrating)) { ?>
        <div class="col-auto">
          <!-- Button -->
          <a type="button" data-toggle="modal" data-target="#ratingModal" class="btn btn-xs btn-gray-300-20" href="<?php echo base_url() . 'user/kelas_diikuti/' ?>">
            Rating Kelas <i class="fe fe-star"></i>
          </a>
        </div>
      <?php }
      ?>

    </div> <!-- / .row -->
  </div> <!-- / .container -->
</header>

<!-- MAIN
    ================================================== -->
<main class="pb-8 pb-md-11 mt-md-n9">
  <div class="container-md">
    <div class="row">
      <div class="col-12 col-md-3">

        <!-- Card -->
        <div class="card card-bleed border-bottom border-bottom-md-0 shadow-light-lg">

          <!-- Collapse -->
          <div class="collapse d-md-block" id="sidenavCollapse">
            <div class="card-body">
              <!-- Heading -->
              <h6 class="font-weight-bold text-uppercase mb-3" style="font-size:15px">
                <!-- <a class="list-link text-reset" href="<?php echo base_url('user/dashboard'); ?>"> -->
                  Daftar Materi
                <!-- </a> -->
              </h6>
              <hr>
              <?php
              $materi_group = $this->manajemen_kelas_model->get_materi_section('class', $course['id_class'])->result_array();
              foreach ($materi_group as $index => $materi) : ?>
                <!-- Heading -->
                <h6 class="font-weight-bold text-uppercase mb-3">
                  <?php echo $materi['nm_class_materi_section'] ?>
                </h6>

                <!-- List -->
                <ul class="card-list list text-gray-700 mb-6">
                  <?php
                  $materi_detail = $this->manajemen_kelas_model->get_materi_detail('section', $materi['id_class_materi_section'])->result_array();
                  foreach ($materi_detail as $index => $detail) : ?>
                    <li class="list-item">
                      <?php if ($detail['id_class_materi_detail'] == $id_class_materi_detail) { ?>
                        <a class="list-link text-primary" onclick="filter(<?php echo $detail['id_class_materi_detail'] ?>)">
                          <?php echo $detail['nm_class_materi_detail'];
                          $cekmateri = $this->manajemen_kelas_model->cek_materi_kelas_detail($detail['id_class_materi_detail'], $this->session->userdata('id_user'))->row_array();
                          if (!empty($cekmateri)) { ?>
                            <i class="fe fe-check-circle d-none d-md-inline ml-3 text-success"></i>
                          <?php }
                          ?>
                        </a>
                      <?php } else { ?>
                        <a class="list-link text-reset" onclick="filter(<?php echo $detail['id_class_materi_detail'] ?>)">
                          <?php echo $detail['nm_class_materi_detail'];
                          $cekmateri = $this->manajemen_kelas_model->cek_materi_kelas_detail($detail['id_class_materi_detail'], $this->session->userdata('id_user'))->row_array();
                          if (!empty($cekmateri)) { ?>
                            <i class="fe fe-check-circle d-none d-md-inline ml-3 text-success"></i>
                          <?php }
                          ?>
                        </a>
                      <?php } ?>
                    </li>
                  <?php endforeach; ?>
                </ul>
              <?php endforeach; ?>

            </div>
          </div>

        </div>

      </div>
      <div class="col-12 col-md-9">
        <!-- Card -->
        <div class="card card-bleed shadow-light-lg mb-3">
          <div class="card-header">
            <div class="row">
              <?php
              $cekmateri = $this->manajemen_kelas_model->cek_materi_kelas_detail($id_class_materi_detail, $this->session->userdata('id_user'))->row_array();
              $materiku = $this->manajemen_kelas_model->get_materi_kelas_detail($id_class_materi_detail)->row_array(); ?>
              <div class="col">
                <h3 class="align-self-center"><?php echo $materiku['nm_class_materi_detail'] ?></h3>
              </div>
              <div class="col-auto">
                <?php
                if (empty($cekmateri)) { ?>
                  <a href="<?php echo base_url() . 'user/tandai_materi/' . $course['id_class'] . '/' . $id_class_materi_detail . '/' . $this->session->userdata('id_user') ?>" class="btn btn-primary btn-xs ml-auto">
                    Tandai Selesai<i class="fe fe-check-circle d-none d-md-inline ml-3"></i>
                  </a>
                <?php }
                ?>
              </div>
            </div>
          </div>
          <div class="card-body">
            <!-- Form -->
            <?php
            $url_materi = explode('=', $materiku['url_materi']);
            if (!empty($materiku['url_materi']) || $materiku['url_materi'] == '0') {
            ?>
              <iframe width="700" height="345" src="https://www.youtube.com/embed/<?php echo $url_materi['1'] ?>" frameborder="0" allowfullscreen>
              </iframe>
            <?php } else {
              echo "";
            } ?>
            <hr>
            <p class=""><?php echo $materiku['desc'] ?></p>
            <hr>
            <?php
            $dokumen_detail = $this->manajemen_kelas_model->get_materi_dokumen($id_class_materi_detail)->result_array();
            foreach ($dokumen_detail as $index => $dokumen) : ?>
              <a href="<?php echo site_url('uploads/materi_detail_dokumen/' . $dokumen['file_materi_dokumen']); ?>" target="_blank" onclick="" class="text-dark mb-2"><i class="fe fe-file-text mr-1 text-primary"></i><?php echo $dokumen['nm_materi_dokumen'] ?></a><br>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div> <!-- / .row -->
  </div> <!-- / .container -->
</main>

<!-- Modal Rating -->
<div class="modal fade" id="ratingModal" tabindex="-1" role="dialog" aria-labelledby="ratingModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ratingModalLabel">Rating</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo site_url('user/rating_materi/' . $course['id_class'] . '/' . $id_class_materi_detail); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <center><label>Berika Review Terbaikmu</label>
              <h4 class="rating">
                <label>
                  <input type="radio" name="rating" value="1" />
                  <span class="icon">★</span>
                </label>
                <label>
                  <input type="radio" name="rating" value="2" />
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                </label>
                <label>
                  <input type="radio" name="rating" value="3" />
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                </label>
                <label>
                  <input type="radio" name="rating" value="4" />
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                </label>
                <label>
                  <input type="radio" name="rating" value="5" />
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                </label>
              </h4>
            </center>
          </div>
          <div class="form-group">
            <label for="title">Keterangan</label>
            <textarea class="form-control" type="text" name="comment" id="comment" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-xs">Kirim Rating</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type='text/javascript'>
  $(':radio').change(function() {
    console.log('New star rating: ' + this.value);
  });

  function filter(id) {
    var url = get_url(id);
    window.location.replace(url);
  }

  function get_url(id) {
    var urlPrefix = '<?php echo site_url('user/kelas_diikuti_isi/' . $course['id_class'] . '?'); ?>'
    var urlSuffix = "";
    var selectedMateri = "";
    selectedMateri = id;

    urlSuffix = "materi=" + selectedMateri;
    var url = urlPrefix + urlSuffix;
    return url;
  }
</script>