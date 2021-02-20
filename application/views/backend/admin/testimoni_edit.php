<?php
    $testimoni_data = $this->db->get_where('ref_testimoni', array('id_testimoni' => $testimoni_id))->row_array();
?>
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

                <h4 class="header-title mb-3">Form Ubah Testimoni</h4>

                <form class="required-form" action="<?php echo site_url('master/testimoni/edit/'.$testimoni_id); ?>" enctype="multipart/form-data" method="post">
                    <div id="progressbarwizard">
                        <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
                            <li class="nav-item">
                                <a href="#basic_info" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                    <i class="mdi mdi-face-profile mr-1"></i>
                                    <span class="d-none d-sm-inline">Testimoni</span>
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
                                            <label class="col-md-3 col-form-label" for="nm_testimoni">Nama <span class="required">*</span> </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="nm_testimoni" name="nm_testimoni" value="<?php echo $testimoni_data['nm_testimoni']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="desc_testimoni">Testimoni <span class="required">*</span> </label>
											<div class="col-md-9">
                                                <textarea name="desc_testimoni" id="summernote-basic" class="form-control"><?php echo $testimoni_data['desc_testimoni']; ?></textarea>
                                            </div>
                                        </div>
										<div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="photo">Foto</label>
                                            <div class="col-md-9">
                                                <div class="d-flex">
                                                  <div class="">
                                                      <img class = "rounded-circle img-thumbnail" src="<?php echo $this->master_model->get_testimoni_photo_url($testimoni_data['id_testimoni']);?>" alt="" style="height: 50px; width: 50px;">
                                                  </div>
                                                  <div class="flex-grow-1 mt-1 pl-3">
                                                      <div class="input-group">
                                                          <div class="custom-file">
                                                              <input type="file" class="custom-file-input" name = "photo" id="photo" onchange="changeTitleOfImageUploader(this)" accept="image/*">
                                                              <label class="custom-file-label ellipsis" for="photo">Pilih Foto</label>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <br/>

                                            <div class="mb-3">
                                                <button type="button" class="btn btn-primary" onclick="checkRequiredFields()" name="button">Simpan</button>
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
</div>
