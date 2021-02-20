<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?>
                <a href = "<?php echo site_url('master/bank_form/add_bank_form'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i>Tambah bank</a>
            </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
              <h4 class="mb-3 header-title">Data bank</h4>
              <div class="table-responsive-sm mt-4">
                <table id="basic-datatable" class="table table-striped table-centered mb-0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama Bank</th>
                      <th>Rekening</th>
                      <th>Atas nama</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                       foreach ($bank->result_array() as $key => $databank): ?>
                          <tr>
                              <td><?php echo $key+1; ?></td>
                              <td><?php echo $databank['bank']; ?></td>
                              <td><?php echo $databank['no_rek']; ?></td>
                              <td><?php echo $databank['nm_rek']; ?></td>
                              <td>
                                  <div class="dropright dropright">
                                    <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="<?php echo site_url('master/bank_form/edit_bank_form/'.$databank['id_bank']) ?>">Ubah</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('master/bank/delete/'.$databank['id_bank']); ?>');">Hapus</a></li>
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
