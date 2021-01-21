<?php
    $mentor_data = $this->db->get_where('ref_mentor', array('id_mentor' => $mentor_id))->row_array();
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

                <h4 class="header-title mb-3">Form Edit Mentor</h4>

                <form class="required-form" action="<?php echo site_url('admin/mentor/edit/'.$mentor_id); ?>" enctype="multipart/form-data" method="post">
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
                                            <label class="col-md-3 col-form-label" for="first_name"><?php echo get_phrase('first_name'); ?> <span class="required">*</span> </label>
                                            <div class="col-md-9">
												<select class="form-control select2" data-toggle="select2" name="id_user" id="id_user">
													<option value="0"><?php echo get_phrase('none'); ?></option>
													<?php foreach ($user as $datauser): ?>
														<option value="<?php echo $datauser['id_user']; ?>" <?php if($mentor_data['id_user'] == $datauser['id_user']) echo 'selected'; ?>><?php echo $datauser['fullname']; ?></option>
													<?php endforeach; ?>
											    </select>
											</div>
                                        </div>
										<div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="linkedin_link">Bio</label>
                                            <div class="col-md-9">
                                                <textarea name="bio" id = "summernote-basic" class="form-control"><?php echo $mentor_data['bio']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="quotes">Quotes <span class="required">*</span> </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="quotes" name="quotes" value="<?php echo $mentor_data['quotes']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <h2 class="mt-0"><i class="mdi mdi-check-all"></i></h2>
                                            <h3 class="mt-0">Terimakasih !</h3>
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
