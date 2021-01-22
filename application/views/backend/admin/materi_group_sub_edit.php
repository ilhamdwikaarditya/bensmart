<?php
$materi_group_sub_data = $this->master_model->get_materi_group_sub_by_id($id_materi_group_sub)->row_array();
// $social_links = json_decode($materi_group_sub_data['social_links'], true);
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

                <form class="required-form" action="<?php echo site_url('master/materi_group_sub/edit/' . $id_materi_group_sub); ?>" enctype="multipart/form-data" method="post">
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
                                            <label class="col-md-3 col-form-label" for="nm_materi_group_sub">Nama<span class="required">*</span> </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="nm_materi_group_sub" name="nm_materi_group_sub" value="<?php echo $materi_group_sub_data['nm_materi_group_sub']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="kd_materi_group_sub">Kode<span class="required">*</span> </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="kd_materi_group_sub" name="kd_materi_group_sub" value="<?php echo $materi_group_sub_data['kd_materi_group_sub']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="parent">Materi Group<span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <select class="form-control select2" data-toggle="select2" name="id_materi_group" id="id_materi_group">
                                                    <option value="0"><?php echo get_phrase('none'); ?></option>
                                                    <?php foreach ($materi_group as $row) : ?>
                                                        <option value="<?php echo $row['id_materi_group']; ?>" <?php if ($materi_group_sub_data['id_materi_group'] == $row['id_materi_group']) echo 'selected'; ?>><?php echo $row['nm_materi_group']; ?> - ( <?php echo $row['nm_jenjang']; ?> )</option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <h2 class="mt-0"><i class="mdi mdi-check-all"></i></h2>
                                            <h3 class="mt-0">Thank You !</h3>

                                            <p class="w-75 mb-2 mx-auto"><?php echo get_phrase('you_are_just_one_click_away'); ?></p>

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