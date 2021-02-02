<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?>
                <a href = "<?php echo site_url('manajemen_kelas/manajemen_bundling_form/add_manajemen_bundling_form'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i>Tambah Paket</a>
            </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
              <h4 class="mb-3 header-title">Data Paket Pembelajaran</h4>
              <div class="table-responsive-sm mt-4">
                <table id="basic-datatable" class="table table-striped table-centered mb-0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Thumbnail</th>
                      <th>Paket</th>
                      <th>Harga</th>
                      <th>Diskon</th>
                      <th>Mata pelajaran</th>
                      <th>Jenjang</th>
                      <th>Materi</th>
                      <th>Mentor</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                       foreach ($manajemen_bundling->result_array() as $key => $data): ?>
                          <tr>
                              <td><?php echo $key+1; ?></td>
                              <td>
                                  <img src="<?php echo $this->manajemen_kelas_model->get_thumbnail_url($data['id_bundling']);?>" alt="" height="50" width="50" class="img-fluid rounded-circle img-thumbnail">
                              </td>
                              <td><?php echo $data['nm_bundling']; ?></td>
                              <td><?php echo number_format($data['price']); ?></td>
                              <td><?php echo number_format($data['discount']); ?></td>
                              <td><?php echo $data['nm_mapel']; ?></td>
                              <td><?php echo $data['nm_jenjang']; ?></td>
                              <td><?php echo $data['nm_materi_group_sub']; ?></td>
                              <td><?php echo $data['nm_mentor']; ?></td>
                              
                              <td>
                                  <div class="dropright dropright">
                                    <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="<?php echo site_url('manajemen_kelas/manajemen_kelas_form/mentor_manajemen_kelas_form/'.$data['id_bundling']); ?>">Tentukan Mentor</a></li>
                                        <li><a class="dropdown-item" href="<?php echo site_url('manajemen_kelas/manajemen_kelas_form/detmateri_manajemen_kelas_form/'.$data['id_bundling']); ?>">Detail Materi</a></li>
                                        <li><a class="dropdown-item" href="<?php echo site_url('manajemen_kelas/manajemen_kelas_form/edit_manajemen_kelas_form/'.$data['id_bundling']); ?>">Edit</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('manajemen_kelas/manajemen_kelas/delete/'.$data['id_bundling']); ?>');">Delete</a></li>
                                    </ul>
                                </div>
                              </td>
                          </tr>
                      <?php endforeach; ?>
                  </tbody>
              </table>
              </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
