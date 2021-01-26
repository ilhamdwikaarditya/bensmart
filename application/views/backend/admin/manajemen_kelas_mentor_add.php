<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?> </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title mb-3">Form Tambah Mentor</h4>

                <form class="required-form" action="<?php echo site_url('manajemen_kelas/manajemen_kelas/add_mentor/'.$id_class); ?>" enctype="multipart/form-data" method="post">
                    <div id="progressbarwizard">
                        <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
                            <li class="nav-item">
                                <a href="#basic_info" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                    <i class="mdi mdi-face-profile mr-1"></i>
                                    <span class="d-none d-sm-inline">Mentor</span>
                                </a>
                            </li>
                            
                        </ul>
                        <div class="tab-content b-0 mb-0">

                            <div id="bar" class="progress mb-3" style="height: 7px;">
                                <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success"></div>
                            </div>

                            <div class="tab-pane" id="basic_info">
                                <div class="row">
                                    <div class="col-12">
										<div class="form-group row mb-3">
											<label class="col-md-3 col-form-label" for="mentor">Pilih Mentor<span class="required">*</span></label>
											<div class="col-md-9">
											<select class="form-control select2" data-toggle="select2" name="id_mentor" id="id_mentor" onchange="setnamamentor(this)">
											  <option value="0">None</option>
											  <?php foreach ($mentor as $datamentor): ?>
													  <option value="<?php echo $datamentor['id_mentor']; ?>"><?php echo $datamentor['fullname']; ?></option>
											  <?php endforeach; ?>
											</select>
											</div>
										</div>
                                        <input type="hidden" class="form-control" id="nm_mentor" name="nm_mentor">
                                        <div class="text-center">
                                            
                                            <div class="mb-3">
                                                <button type="button" class="btn btn-primary" onclick="checkRequiredFields()" name="button">Submit</button>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </div>
                        </div> <!-- tab-content -->
                    </div> <!-- end #progressbarwizard-->
                </form>

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div>
	
	 <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
              <h4 class="mb-3 header-title">List Mentor</h4>
              <div class="table-responsive-sm mt-4">
                <table id="basic-datatable" class="table table-striped table-centered mb-0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Foto</th>
                      <th>Mentor</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
						<?php
                       foreach ($mentor_kelas->result_array() as $key => $datamentorkelas): ?>
                          <tr>
                              <td><?php echo $key+1; ?></td>
                              <td>
                                  <img src="<?php echo $this->master_model->get_user_photo_url($datamentorkelas['id_user']);?>" alt="" height="50" width="50" class="img-fluid rounded-circle img-thumbnail">
                              </td>
                              <td><?php echo $datamentorkelas['nm_mentor']; ?></td>
                              <td>
                                <div class="dropright dropright">
                                    <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" href="#" onclick="confirm_modal('<?php echo site_url('manajemen_kelas/manajemen_kelas/delete/'.$datamanajemenkelas['id_class']); ?>');">
                                        Delete
                                    </button>
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
<script>
	function setnamamentor(val)
	{
		$("#nm_mentor").val(val.options[val.selectedIndex].text);
	}
</script>