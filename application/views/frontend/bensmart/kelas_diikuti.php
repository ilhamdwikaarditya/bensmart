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

            <!-- Heading -->
            <h4 class="mb-0">
              Informasi Kelas
            </h4>

          </div>
          <div class="card-body">
            <!-- Form -->
            <?php foreach ($my_class as $course) : ?>
              <div class="card card-row shadow-light-lg mb-6">
                <div class="row no-gutters">
                  <!-- GAMBAR -->
                  <div class="col-12 col-md-4">
                    <div class="limit">
                      <img src="<?php echo base_url() . 'uploads/thumbnail_class/' . $course['thumbnail'] . '.jpg' ?>" alt="..." class="card-img-left" style="display: block; margin: 0 auto;">
                    </div>
                    <style type="text/css">
                      .limit {
                        width: 100%;
                        height: 100;
                        max-height: 100;
                        overflow: hidden;
                      }

                      .limit img {
                        width: 100%;
                        height: 100%;
                      }
                    </style>
                  </div>
                  <!-- TEXT -->
                  <div class="col-12 col-md-8">
                    <div class="px-6">
                      <div class="justify-content-between">
                        <a href="<?php echo base_url() . 'user/kelas_diikuti_isi/' . $course['id_class'] ?>" class="font-weight-bold mt-2" style="text-decoration:none;">
                          <h4 style="color:black;"><?php echo $course['nm_class'] ?></h4>
                        </a>
                      </div>

                      <h6 class="text-muted mt-0" style="font-size: 14px;">
                        <?php echo strip_tags(html_entity_decode($course['desc_short'])) ?> . . .
                      </h6>
                      <div class="d-flex justify-content-center">
                        <div class="col-6 col-md-6">
                          <div class="row align-items-center">
                            <p>
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle ml-5" viewBox="0 0 20 20">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                              </svg>
                            <h6 class="align-items-center pb-2 ml-1 text-gray-700" style="font-size: 13px;"><?php echo $course['nm_jenjang'] ?></h6>
                            </p>
                          </div>

                          <div class="row align-items-center mt-n4">
                            <p>
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person ml-5" viewBox="0 0 20 20">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                              </svg>
                            <h6 class="align-items-center pb-2 ml-1 text-gray-700" style="font-size: 13px;">
                              <?php
                              $class_mentor = $this->manajemen_kelas_model->get_mentor_kelas($course['id_class'])->result_array();
                              foreach ($class_mentor as $index => $mentor) : ?>
                                <?php echo $mentor['nm_mentor']; ?><br>
                              <?php endforeach; ?>
                            </h6>
                            </p>
                          </div>
                        </div>

                        <div class="col-6 col-md-6">
                          <div class="row align-items-center">
                            <p>
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-play-circle ml-5" viewBox="0 0 20 20">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445z" />
                              </svg>
                            <h6 class="align-items-center pb-2 ml-1 text-gray-700" style="font-size: 13px;"><?php echo $course['jmlmateri']; ?> Materi, <br>Durasi:
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
                            </h6>
                            </p>
                          </div>

                          <div class="row align-items-center mt-n4">
                            <p>
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star ml-5" viewBox="0 0 20 20">
                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                              </svg>
                            <h6 class="align-items-center pb-2 ml-1 text-gray-700" style="font-size: 13px;">
                              <?php
                                $cek = $this->db->query("select a.id_class, count(b.id_class_rating) as cek_rating, sum(b.rating)/count(b.id_class_rating) as rating
                                from tr_class a
                                left join tr_class_rating b on a.id_class = b.id_class
                                where b.active = '1' and a.id_class = ".$course['id_class'].";");
                                $cek_rating = $cek->row()->cek_rating;
                                $rating = $cek->row()->rating;
                                // $cek_rating = $this->manajemen_kelas_model->rating_kelas($course['id_class'])->result_array();
                                ?>
                                <?php if ($cek_rating == 0) {
                                  echo "0.0 ( 0 Ulasan )";
                                } else {
                                  echo number_format($rating,1)." ( ".$cek_rating." Ulasan )";
                                }
                                ?>
                            </h6>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> <!-- / .row -->
              </div>
            <?php endforeach; ?>
          </div>
        </div>

      </div>
    </div> <!-- / .row -->
  </div> <!-- / .container -->
</main>