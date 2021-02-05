<?php
    $manajemen_kelas_data = $this->db->get_where('tr_class', array('id_class' => $id_class))->row_array();
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

                <h4 class="header-title mb-3">Form edit kelas</h4>

                <form class="required-form" action="<?php echo site_url('manajemen_kelas/manajemen_kelas/edit/'.$id_class); ?>" enctype="multipart/form-data" method="post">
                    <div id="progressbarwizard">
                        <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
                            <li class="nav-item">
                                <a href="#basic_info" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                    <i class="mdi mdi-face-profile mr-1"></i>
                                    <span class="d-none d-sm-inline">Detail Kelas</span>
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
                                            <label class="col-md-3 col-form-label" for="nm_class">Nama Kelas<span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="nm_class" name="nm_class" value="<?php echo $manajemen_kelas_data['nm_class']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="desc_class">Deskripsi Kelas</label>
                                            <div class="col-md-9">
                                                <textarea name="desc_class" id="summernote-basic" class="form-control"><?php echo $manajemen_kelas_data['desc_class']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="thumbnail">Foto Kelas</label>
                                            <div class="col-md-9">
                                                <div class="d-flex">
                                                  <div class="">
                                                      <img class = "rounded-circle img-thumbnail" src="<?php echo $this->manajemen_kelas_model->get_thumbnail_url($manajemen_kelas_data['id_class']);?>" alt="" style="height: 50px; width: 50px;">
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
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </div>

                            <div class="tab-pane" id="login_credentials">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="price">Harga<span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="number" id="price" name="price" class="form-control" value="<?php echo $manajemen_kelas_data['price']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="discount">Discount<span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="number" id="discount" name="discount"  class="form-control" placeholder="5000" value="<?php echo $manajemen_kelas_data['discount']; ?>" required>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </div>
							
							<div class="tab-pane" id="materi">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row mb-3">
											<label class="col-md-3 col-form-label" for="id_mapel">Mata pelajaran<span class="required">*</span></label>
											<div class="col-md-9">
											<select class="form-control select2" data-toggle="select2" name="id_mapel" id="id_mapel">
											  <option value="0">None</option>
											  <?php foreach ($mapel as $datamapel): ?>
													<option value="<?php echo $datamapel['id_mapel']; ?>" <?php if($manajemen_kelas_data['id_mapel'] == $datamapel['id_mapel']) echo 'selected'; ?>><?php echo $datamapel['nm_mapel']; ?></option>
											  <?php endforeach; ?>
											</select>
											</div>
										</div>
										<div class="form-group row mb-3">
											<label class="col-md-3 col-form-label" for="jenjang">Jenjang<span class="required">*</span></label>
											<div class="col-md-9">
											<select class="form-control select2" data-toggle="select2" name="id_jenjang" id="id_jenjang">
											  <option value="0">None</option>
											  <?php foreach ($jenjang as $datajenjang): ?>
													  <option value="<?php echo $datajenjang['id_jenjang']; ?>" <?php if($manajemen_kelas_data['id_jenjang'] == $datajenjang['id_jenjang']) echo 'selected'; ?>><?php echo $datajenjang['nm_jenjang']; ?></option>
											  <?php endforeach; ?>
											</select>
											</div>
										</div>
										<div class="form-group row mb-3">
											<label class="col-md-3 col-form-label" for="id_materi_group">Materi Group<span class="required">*</span></label>
											<div class="col-md-9">
											<select class="groupmateri form-control select2" data-toggle="select2" name="id_materi_group" id="id_materi_group">
											  <option value="0">None</option>
											  <?php foreach ($materi_group as $datamateri_group): ?>
													  <option value="<?php echo $datamateri_group['id_materi_group']; ?>" <?php if($manajemen_kelas_data['id_materi_group'] == $datamateri_group['id_materi_group']) echo 'selected'; ?>><?php echo $datamateri_group['nm_materi_group']; ?></option>
											  <?php endforeach; ?>
											</select>
											</div>
										</div>
										<div class="form-group row mb-3">
											<label class="col-md-3 col-form-label" for="id_materi_group_sub">Materi Sub Group<span class="required">*</span></label>
											<div class="col-md-9">
											<select class="subgroup form-control select2" data-toggle="select2" name="id_materi_group_sub" id="id_materi_group_sub">
											  <option value="0">None</option>
											  <?php foreach ($materi_group_sub as $datamateri_group_sub): ?>
													  <option value="<?php echo $datamateri_group_sub['id_materi_group_sub']; ?>" <?php if($manajemen_kelas_data['id_materi_group_sub'] == $datamateri_group_sub['id_materi_group_sub']) echo 'selected'; ?>><?php echo $datamateri_group_sub['nm_materi_group_sub']; ?></option>
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

                            <ul class="list-inline mb-0 wizard">
                                <li class="previous list-inline-item">
                                    <a href="javascript::" class="btn btn-info">Previous</a>
                                </li>
                                <li class="next list-inline-item float-right">
                                    <a href="javascript::" class="btn btn-info">Next</a>
                                </li>
                            </ul>

                        </div> <!-- tab-content -->
                    </div> <!-- end #progressbarwizard-->
                </form>

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#id_jenjang').change(function(){
            var id_jenjang = $(this).val();  
            $.ajax({
                url : "<?php echo base_url();?>Manajemen_kelas/get_chain/",
                method : "POST",
                data : {param: id_jenjang, table: 'ref_materi_group', where: 'id_jenjang'},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;
						html += "<option value='0'>None</option>";
                    for(i=0; i<data.length; i++){
                        
                        html += "<option value='"+data[i].id_materi_group+"'>"+data[i].nm_materi_group+"</option>";
                    }
                    $('.groupmateri').html(html);
                }
            });
        });
		
		$('#id_materi_group').change(function(){
            var id_materi_group = $(this).val();  
            $.ajax({
                url : "<?php echo base_url();?>Manajemen_kelas/get_chain/",
                method : "POST",
                data : {param: id_materi_group, table: 'ref_materi_group_sub', where: 'id_materi_group'},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;
						html += "<option value='0'>None</option>";
                    for(i=0; i<data.length; i++){
                        html += "<option value='"+data[i].id_materi_group_sub+"'>"+data[i].nm_materi_group_sub+"</option>";
                    }
                    $('.subgroup').html(html);
                }
            });
        });
		
    });
</script>

