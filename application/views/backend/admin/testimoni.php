<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?>
                <a href = "<?php echo site_url('master/testimoni_form/add_testimoni_form'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i>Tambah testimoni</a>
            </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
              <h4 class="mb-3 header-title">Data Testimoni</h4>
              <div class="table-responsive-sm mt-4">
                <table id="basic-datatable" class="table table-striped table-centered mb-0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama</th>
                      <th>Testimoni</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                       foreach ($testimoni->result_array() as $key => $datatestimoni): ?>
                          <tr>
                              <td><?php echo $key+1; ?></td>
                              <td><?php echo $datatestimoni['nm_testimoni']; ?></td>
                              <td><?php echo $datatestimoni['desc_testimoni']; ?></td>
                              <td>
                                  <div class="dropright dropright">
                                    <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="<?php echo site_url('master/testimoni_form/edit_testimoni_form/'.$datatestimoni['id_testimoni']) ?>">Ubah</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('master/testimoni/delete/'.$datatestimoni['id_testimoni']); ?>');">Hapus</a></li>
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
