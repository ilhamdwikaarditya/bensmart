<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?>
                <a href = "<?php echo site_url('admins/mapel_form/add_mapel_form'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i>Add <?php echo $page_title; ?></a>
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
                      <th>Kode</th>
                      <th>Cdate</th>
                      <th>Cuser</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                       foreach ($mapel->result_array() as $key => $mapel): ?>
                          <tr>
                              <td><?php echo $key+1; ?></td>
                              <td><?php echo $mapel['id_mapel'] ?></td>
                              <td><?php echo $mapel['nm_mapel'] ?></td>
                              <td><?php echo $mapel['kd_mapel'] ?></td>
                              <td><?php echo $mapel['cdate'] ?></td>
                              <td><?php echo $mapel['cuser'] ?></td>
                              <td>
                                  <div class="dropright dropright">
                                    <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="<?php echo site_url('admins/mapel_form/edit_mapel_form/'.$mapel['id_mapel']) ?>">Edit</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admins/mapel/delete/'.$mapel['id_mapel']); ?>');">Delete</a></li>
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
