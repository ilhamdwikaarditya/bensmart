<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?>
                    <a href="<?php echo site_url('manajemen_kelas/manajemen_kelas_form/add_manajemen_kelas_form'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i>Tambah Kelas</a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">Data Kelas</h4>
                <div class="table-responsive-sm mt-4" style="overflow-x:auto;">
                    <table id="basic-datatable" class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Thumbnail</th>
                                <th>Kelas</th>
                                <th>Harga</th>
                                <th>Diskon</th>
                                <th>Mapel</th>
                                <th>Jenjang</th>
                                <th>Materi</th>
                                <th>Mentor</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($manajemen_kelas->result_array() as $key => $datamanajemenkelas) : ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td>
                                        <img src="<?php echo $this->manajemen_kelas_model->get_thumbnail_url($datamanajemenkelas['id_class']); ?>" alt="" height="50" width="50" class="img-fluid rounded-circle img-thumbnail">
                                    </td>
                                    <td style="white-space: wordwrap"><?php echo $datamanajemenkelas['nm_class'] ?></td>
                                    <td><?php echo number_format($datamanajemenkelas['price']); ?></td>
                                    <td><?php echo number_format($datamanajemenkelas['discount']); ?></td>
                                    <td style="white-space: nowrap"><?php echo $datamanajemenkelas['nm_mapel'] ?></td>
                                    <td><?php echo $datamanajemenkelas['kd_jenjang']; ?></td>
                                    <td style="white-space: nowrap"><?php echo $datamanajemenkelas['nm_materi_group_sub'] ?></td>
                                    <td><?php echo $datamanajemenkelas['nm_mentor']; ?></td>
                                    <td><?php
                                        if ($datamanajemenkelas['active'] == '1') {
                                            echo 'Aktif';
                                        } else if($datamanajemenkelas['active'] == '2'){
                                            echo 'Non Aktif';
                                        } else if($datamanajemenkelas['active'] == '3'){
                                            echo 'Diterbitkan';
                                        }
                                        ?></td>
                                    <td>
                                        <div class="dropright dropright">
                                            <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="<?php echo site_url('manajemen_kelas/manajemen_kelas_form/mentor_manajemen_kelas_form/' . $datamanajemenkelas['id_class']); ?>">Tentukan Mentor</a></li>
                                                <li><a class="dropdown-item" href="<?php echo site_url('manajemen_kelas/manajemen_kelas_form/detmateri_manajemen_kelas_form/' . $datamanajemenkelas['id_class']); ?>">Detail Materi</a></li>
                                                <li><a class="dropdown-item" href="<?php echo site_url('manajemen_kelas/manajemen_kelas_form/edit_manajemen_kelas_form/' . $datamanajemenkelas['id_class']); ?>">Ubah</a></li>
                                                <?php
                                                if ($datamanajemenkelas['active'] == '1') { ?>
                                                    <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('manajemen_kelas/manajemen_kelas/publish/' . $datamanajemenkelas['id_class']); ?>');">Terbitkan Kelas</a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('manajemen_kelas/manajemen_kelas/nonactive/' . $datamanajemenkelas['id_class']); ?>');">Non Aktifkan</a></li>
                                                <?php } else if($datamanajemenkelas['active'] == '2') { ?>
                                                    <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('manajemen_kelas/manajemen_kelas/active/' . $datamanajemenkelas['id_class']); ?>');">Aktifkan</a></li>
                                                <?php } else if($datamanajemenkelas['active'] == '3') { ?>
                                                    <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('manajemen_kelas/manajemen_kelas/nonactive/' . $datamanajemenkelas['id_class']); ?>');">Non Aktifkan</a></li>
                                                <?php } ?>
                                                
                                            </ul>
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