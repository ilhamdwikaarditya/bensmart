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

                <h4 class="header-title mb-3">Form Paket Belajar</h4>

                <form class="required-form" action="<?php echo site_url('manajemen_kelas/manajemen_kelas/add'); ?>" enctype="multipart/form-data" method="post">
                    <div id="progressbarwizard">
                        <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
                            <li class="nav-item">
                                <a href="#basic_info" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                    <i class="mdi mdi-face-profile mr-1"></i>
                                    <span class="d-none d-sm-inline">Detail Paket</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#login_credentials" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                    <i class="mdi mdi-lock mr-1"></i>
                                    <span class="d-none d-sm-inline">Detail Harga</span>
                                </a>
                            </li>
							<li class="nav-item">
                                <a href="#materi" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                    <i class="mdi mdi-checkbox-marked-circle-outline mr-1"></i>
                                    <span class="d-none d-sm-inline">Detail Materi</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#finish" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                    <i class="mdi mdi-checkbox-marked-circle-outline mr-1"></i>
                                    <span class="d-none d-sm-inline">Finish</span>
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
                                            <label class="col-md-3 col-form-label" for="nm_bundling">Nama Paket Belajar<span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="nm_bundling" name="nm_bundling" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="desc_bundling">Deskripsi Paket Kelas</label>
                                            <div class="col-md-9">
                                                <textarea name="desc_bundling" id = "summernote-basic" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="thumbnail">Foto Paket Kelas</label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail" accept="image/*" onchange="changeTitleOfImageUploader(this)">
                                                        <label class="custom-file-label" for="thumbnail">Pilih Foto</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </div>

                            <div class="tab-pane" id="login_credentials">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="price">Harga<span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="number" id="price" name="price" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="discount">Discount<span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="number" id="discount" name="discount"  class="form-control" placeholder="5000" required>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </div>
							
							<div class="tab-pane" id="materi">
                                <div class="row">
                                    <div class="col-12">
										<div class="form-group row mb-3">
											<label class="col-md-3 col-form-label" for="jenjang">Jenjang<span class="required">*</span></label>
											<div class="col-md-9">
											<select class="form-control select2" data-toggle="select2" name="id_jenjang" id="id_jenjang">
											  <option value="0">None</option>
											  <?php foreach ($jenjang as $datajenjang): ?>
													  <option value="<?php echo $datajenjang['id_jenjang']; ?>"><?php echo $datajenjang['nm_jenjang']; ?></option>
											  <?php endforeach; ?>
											</select>
											</div>
										</div>
										<div class="form-group row mb-3">
											<label class="col-md-3 col-form-label" for="id_materi_group">Materi Group<span class="required">*</span></label>
											<div class="col-md-9">
											<select class="form-control select2" data-toggle="select2" name="id_materi_group" id="id_materi_group">
											  <option value="0">None</option>
											  <?php foreach ($materi_group as $datamateri_group): ?>
													  <option value="<?php echo $datamateri_group['id_materi_group']; ?>"><?php echo $datamateri_group['nm_materi_group']; ?></option>
											  <?php endforeach; ?>
											</select>
											</div>
										</div>
										<div class="form-group row mb-3">
											<label class="col-md-3 col-form-label" for="id_materi_group_sub">Materi Sub Group<span class="required">*</span></label>
											<div class="col-md-9">
											<select class="form-control select2" data-toggle="select2" name="id_materi_group_sub" id="id_materi_group_sub">
											  <option value="0">None</option>
											  <?php foreach ($materi_group_sub as $datamateri_group_sub): ?>
													  <option value="<?php echo $datamateri_group_sub['id_materi_group_sub']; ?>"><?php echo $datamateri_group_sub['nm_materi_group_sub']; ?></option>
											  <?php endforeach; ?>
											</select>
											</div>
										</div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </div>
							
                            <div class="tab-pane" id="finish">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="text-center">
                                            <h2 class="mt-0"><i class="mdi mdi-check-all"></i></h2>
                                            <h3 class="mt-0">Terimakasih !</h3>

                                            <p class="w-75 mb-2 mx-auto">Kamu tinggal satu klik lagi :)</p>

                                            <div class="mb-3">
                                                <button type="button" class="btn btn-primary" onclick="checkRequiredFields()" name="button">Submit</button>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </div>

                            <ul class="list-inline mb-0 wizard text-center">
                                <li class="previous list-inline-item">
                                    <a href="javascript::" class="btn btn-info"> <i class="mdi mdi-arrow-left-bold"></i> </a>
                                </li>
                                <li class="next list-inline-item">
                                    <a href="javascript::" class="btn btn-info"> <i class="mdi mdi-arrow-right-bold"></i> </a>
                                </li>
                            </ul>

                        </div> <!-- tab-content -->
                    </div> <!-- end #progressbarwizard-->
                </form>

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div>
</div>
