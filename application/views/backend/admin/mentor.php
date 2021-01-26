<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?>
                <a href = "<?php echo site_url('master/mentor_form/add_mentor_form'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i>Tambah Mentor</a>
            </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
              <h4 class="mb-3 header-title">Data Mentor</h4>
              <div class="table-responsive-sm mt-4">
                <table id="basic-datatable" class="table table-striped table-centered mb-0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Foto</th>
                      <th>Nama Mentor</th>
                      <th>Email</th>
                      <th>Telp</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                       foreach ($mentor->result_array() as $key => $data_mentor): ?>
                          <tr>
                              <td><?php echo $key+1; ?></td>
							  <td>
                                  <img src="<?php echo $this->master_model->get_user_photo_url($data_mentor['id_user']);?>" alt="" height="50" width="50" class="img-fluid rounded-circle img-thumbnail">
                              </td>
                              <td><?php echo $data_mentor['fullname']; ?></td>
                              <td><?php echo $data_mentor['email']; ?></td>
                              <td><?php echo $data_mentor['phone']; ?></td>
                              <td>
                                  <div class="dropright dropright">
                                    <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="<?php echo site_url('master/mentor_form/edit_mentor_form/'.$data_mentor['id_mentor']) ?>">Edit</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('master/mentor/delete/'.$data_mentor['id_mentor']); ?>');">Delete</a></li>
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
