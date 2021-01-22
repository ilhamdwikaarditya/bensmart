<?php
    $jenjang_data = $this->db->get_where('ref_jenjang', array('id_jenjang' => $id_jenjang))->row_array();
    // $social_links = json_decode($jenjang_data['social_links'], true);
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

                <h4 class="header-title mb-3">Jenjang Edit Form</h4>

                <form class="required-form" action="<?php echo site_url('master/jenjang/edit/'.$id_jenjang); ?>" enctype="multipart/form-data" method="post">
                    <div id="progressbarwizard">
                        <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
                            <li class="nav-item">
                                <a href="#basic_info" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                    <i class="mdi mdi-face-profile mr-1"></i>
                                    <span class="d-none d-sm-inline"><?php echo get_phrase('basic_info'); ?></span>
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
                                            <label class="col-md-3 col-form-label" for="nm_jenjang">Nama<span class="required">*</span> </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="nm_jenjang" name="nm_jenjang" value="<?php echo $jenjang_data['nm_jenjang']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="kd_jenjang">Kode<span class="required">*</span> </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="kd_jenjang" name="kd_jenjang" value="<?php echo $jenjang_data['kd_jenjang']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <br/>

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
</div>
