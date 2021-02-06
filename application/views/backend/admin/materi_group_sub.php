<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?>
                <a href = "<?php echo site_url('master/materi_group_sub_form/add_materi_group_sub_form'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i>Tambah Sub Grub Materi</a>
            </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
              <h4 class="mb-3 header-title"><?php echo $page_title; ?></h4>
              <div class="table-responsive-sm mt-4" style="overflow-x:auto;">
                <table id="basic-datatable" class="table table-striped table-centered mb-0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama</th>
                      <th>Kode</th>
                      <th>Materi Group</th>
                      <th>Jenjang</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                       foreach ($materi_group_sub->result_array() as $key => $materi_group_sub): ?>
                          <tr>
                              <td><?php echo $key+1; ?></td>
                              <td style="white-space: nowrap"><?php echo $materi_group_sub['nm_materi_group_sub'] ?></td>
                              <td><?php echo $materi_group_sub['kd_materi_group_sub'] ?></td>
                              <td style="white-space: nowrap"><?php echo $materi_group_sub['nm_materi_group'] ?></td>
                              <td style="white-space: nowrap"><?php echo $materi_group_sub['nm_jenjang'] ?></td>
                              <td>
                                  <div class="dropright dropright">
                                    <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="<?php echo site_url('master/materi_group_sub_form/edit_materi_group_sub_form/'.$materi_group_sub['id_materi_group_sub']) ?>">Ubah</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('master/materi_group_sub/delete/'.$materi_group_sub['id_materi_group_sub']); ?>');">Hapus</a></li>
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
