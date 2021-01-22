<?php
$materi_group_data = $this->master_model->get_materi_group_by_id($id_materi_group)->row_array();
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

                <h4 class="header-title mb-3">Materi Group Edit Form</h4>

                <form class="required-form" action="<?php echo site_url('master/materi_group/edit/' . $id_materi_group); ?>" enctype="multipart/form-data" method="post">
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
                                            <label class="col-md-3 col-form-label" for="nm_materi_group">Nama Materi Group<span class="required">*</span> </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="nm_materi_group" name="nm_materi_group" value="<?php echo $materi_group_data['nm_materi_group']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="parent">Jenjang<span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <select class="form-control select2" data-toggle="select2" name="id_jenjang" id="id_jenjang">
                                                    <option value="0"><?php echo get_phrase('none'); ?></option>
                                                    <?php foreach ($jenjang as $row) : ?>
                                                        <option value="<?php echo $row['id_jenjang']; ?>" <?php if ($materi_group_data['id_jenjang'] == $row['id_jenjang']) echo 'selected'; ?>><?php echo $row['nm_jenjang']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <br/>

                                            
                                            <div class="mb-3">
                                                <button type="button" class="btn btn-primary" onclick="checkRequiredFields()" name="button"><?php echo get_phrase('submit'); ?></button>
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