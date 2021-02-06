<?php
// $mentor_data = $this->db->get_where('ref_mentor', array('id_mentor' => $mentor_id))->row_array();
$this->db->from('ref_mentor a');
$this->db->join('ref_user b', 'a.id_user = b.id_user', 'left');
$this->db->where('id_mentor', $mentor_id);
$mentor_data = $this->db->get()->row_array();
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

                <h4 class="header-title mb-3">Form Ubah Mentor</h4>

                <form class="required-form" action="<?php echo site_url('master/mentor/edit/' . $mentor_id); ?>" enctype="multipart/form-data" method="post">
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
                                    <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?php echo $mentor_data['id_user']; ?>" required>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="quotes">Nama Depan<span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $mentor_data['firstname']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="quotes">Nama Belakang<span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $mentor_data['lastname']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="quotes">Nomor Telepon<span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control" id="phone" name="phone" value="<?php echo $mentor_data['phone']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="quotes">Alamat<span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="address" name="address" value="<?php echo $mentor_data['address']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="quotes">Email<span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $mentor_data['email']; ?>" required>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="linkedin_link">Bio</label>
                                            <div class="col-md-9">
                                                <textarea name="bio" id="summernote-basic" class="form-control"><?php echo $mentor_data['bio']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="quotes">Quotes <span class="required">*</span> </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="quotes" name="quotes" value="<?php echo $mentor_data['quotes']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <br />
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