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
            <div class="list-group list-group-flush">
              <?php
              foreach ($my_class as $course) : ?>
                <a href="<?php echo base_url() . 'user/kelas_diikuti_isi/' . $course['id_class'] ?>" class="font-weight-bold mt-2 py-1 lift lift-lg" style="text-decoration:none;">
                  <div class="list-group-item">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <img class="avatar-img rounded" src="<?php echo base_url() . 'uploads/thumbnail_class/' . $course['thumbnail'] . '.jpg' ?>" alt="..." style="height: 100px; width: 150px;">
                      </div>
                      <div class="col ml-n5">
                        <!-- Heading -->
                        <!-- <h4 style="color:black;"><?php echo $course['nm_class'] ?></h4> -->
                        <h4 class="mb-0" style="color:black;">
                          <?php echo $course['nm_class']; ?>
                        </h4>
                        <small class="text-gray-700 mt-1 mb-2">
                          Mentor :
                          <?php
                          $class_mentor = $this->manajemen_kelas_model->get_mentor_kelas($course['id_class'])->result_array();
                          foreach ($class_mentor as $index => $mentor) : ?>
                            <?php echo $mentor['nm_mentor']; ?>;
                          <?php endforeach; ?>
                        </small><br>
                        <?php
                        $id_user = $this->session->userdata('id_user');
                        $this->db->select("a.id_class, a.nm_class, count(e.id_class_materi_detail) totselesai, count(d.id_class_materi_detail) totkelas ");
                        $this->db->from("tr_class a");
                        $this->db->join("tr_class_member b", "a.id_class = b.id_class", "LEFT");
                        $this->db->join("tr_class_materi_section c", "a.id_class = c.id_class", "LEFT");
                        $this->db->join("tr_class_materi_detail d", "c.id_class_materi_section = d.id_class_materi_section", "LEFT");
                        $this->db->join("tr_class_materi_member e", "d.id_class_materi_detail = e.id_class_materi_detail", "LEFT");
                        $this->db->where("b.cuser", $id_user);
                        $this->db->where("a.id_class", $course['id_class']);
                        $this->db->group_by("b.id_class");
                        $class_datas = $this->db->get()->result_array();
                        foreach ($class_datas as $class_data) {
                          $idclass = $class_data['id_class'];
                          $nmclass = $class_data['nm_class'];
                          $totsele = $class_data['totselesai'];
                          $totkelas = $class_data['totkelas'];
                        ?>
                          <small class="text-gray-700 mt-1 mb-2">
                            <span class="font-weight-bold"><?php echo $totsele; ?> dari <?php echo $totkelas; ?></span> Materi telah selesai
                          </small>
                        <?php
                        }
                        ?>
                      </div>
                      <div class="col-md-auto">
                        <!-- Badge -->
                        <?php
                        foreach ($class_datas as $class_data_badge) {
                          $totsele = $class_data_badge['totselesai'];
                          $totkelas = $class_data_badge['totkelas'];
                        ?>
                          <?php if ($totsele == $totkelas) { ?>
                            <span class="badge badge-pill badge-success-soft">
                              <span class="h6 font-weight-bold">Selesai</span>
                            </span>
                          <?php } else { ?>
                            <span class="badge badge-pill badge-primary-soft">
                              <span class="h6 font-weight-bold">Sedang Belajar</span>
                            </span>
                          <?php } ?>
                        <?php
                        } ?>
                      </div>
                    </div>
                  </div>
                </a>
              <?php endforeach; ?>
            </div>

          </div>
        </div>

      </div>
    </div> <!-- / .row -->
  </div> <!-- / .container -->
</main>