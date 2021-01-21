<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?>
                <a href = "<?php echo site_url('master/materi_group_form/add_materi_group_form'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i>Add Materi Group</a>
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
              <div class="table-responsive-sm mt-4">
                <table id="basic-datatable" class="table table-striped table-centered mb-0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Id</th>
                      <th>Nama</th>
                      <th>Jenjang</th>
                      <th>Cdate</th>
                      <th>Cuser</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                       foreach ($materi_group->result_array() as $key => $materi_group): ?>
                          <tr>
                              <td><?php echo $key+1; ?></td>
                              <td><?php echo $materi_group['id_materi_group'] ?></td>
                              <td><?php echo $materi_group['nm_materi_group'] ?></td>
                              <td><?php echo $materi_group['nm_jenjang'] ?></td>
                              <td><?php echo $materi_group['cdate'] ?></td>
                              <td><?php echo $materi_group['cuser'] ?></td>
                              <td>
                                  <div class="dropright dropright">
                                    <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="<?php echo site_url('master/materi_group_form/edit_materi_group_form/'.$materi_group['id_materi_group']) ?>">Edit</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('master/materi_group/delete/'.$materi_group['id_materi_group']); ?>');">Delete</a></li>
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
