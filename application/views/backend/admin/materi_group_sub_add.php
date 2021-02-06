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

                <h4 class="header-title mb-3">Tambah Sub Grup Materi</h4>

                <form class="required-form" action="<?php echo site_url('master/materi_group_sub/add'); ?>" enctype="multipart/form-data" method="post">
                    <div id="progressbarwizard">
                        <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
                            <li class="nav-item">
                                <a href="#basic_info" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                    <i class="mdi mdi-face-profile mr-1"></i>
                                    <span class="d-none d-sm-inline">Sub Grup Materi</span>
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="#finish" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                    <i class="mdi mdi-checkbox-marked-circle-outline mr-1"></i>
                                    <span class="d-none d-sm-inline"><?php echo get_phrase('finish'); ?></span>
                                </a>
                            </li> -->
                        </ul>
                        <div class="tab-content b-0 mb-0">

                            <div id="bar" class="progress mb-3" style="height: 7px;">
                                <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success"></div>
                            </div>

                            <div class="tab-pane" id="basic_info">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="nm_materi_group_sub">Nama<span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="nm_materi_group_sub" name="nm_materi_group_sub" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="kd_materi_group_sub">Kode<span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="kd_materi_group_sub" name="kd_materi_group_sub" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="id_materi_group">Grup Materi<span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <select class="form-control select2" data-toggle="select2" name="id_materi_group" id="id_materi_group" onchange="checkDataType(this.value)">
                                                    <!-- <option value="0">-- Pilih Grup Materi --</option> -->
                                                    <?php foreach ($materi_group as $row) : ?>
                                                        <option value="<?php echo $row['id_materi_group']; ?>" required><?php echo $row['nm_materi_group']; ?> - ( <?php echo $row['nm_jenjang']; ?> )</option>
                                                    <?php endforeach; ?>
                                                </select>
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

<script type="text/javascript">
    function checkDataType(id_materi_group) {
        if (id_materi_group > 0) {
            $('#thumbnail-picker-area').hide();
            $('#icon-picker-area').hide();
        } else {
            $('#thumbnail-picker-area').show();
            $('#icon-picker-area').show();
        }
    }
</script>