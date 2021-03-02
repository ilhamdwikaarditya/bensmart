<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?>
                    <!-- <a href="<?php echo site_url('manajemen_kelas/manajemen_kelas_form/add_manajemen_kelas_form'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i>Tambah Kelas</a> -->
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">Data Pembayaran Kelas</h4>
                <div class="table-responsive-sm mt-4" style="overflow-x:auto;">
                    <table id="basic-datatable" class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Booking</th>
                                <th>amount</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Bukti</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($pembayaran_kelas->result_array() as $key => $pembayaran) : ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td style="white-space: wordwrap"><?php echo $pembayaran['kd_booking'] ?></td>
                                    <td style="white-space: wordwrap"><?php echo number_format($pembayaran['amount']) ?></td>
                                    <td style="white-space: nowrap"><?php echo $pembayaran['email'] ?></td>
                                    <td><?php
                                        if ($pembayaran['status'] == '0') {
                                            echo 'Belum Bayar';
                                        } else if ($pembayaran['active'] == '1') {
                                            echo 'Sudah Bayar';
                                        }
                                        ?></td>
                                    <td>
                                        <a href="<?php echo site_url('uploads/bukti_pembayaran/'.$pembayaran['bukti_pembayaran'].'.jpg'); ?>" target="_blank"><img src="<?php echo $this->manajemen_kelas_model->get_bukti_pembayaran($pembayaran['kd_booking']); ?>" alt="" height="50" width="50" class="img-fluid rounded-circle img-thumbnail"></a>
                                    </td>
                                    <!-- <td style="white-space: nowrap"><button>Lihat</button></td> -->
                                    <td>
                                        <div class="dropright dropright">
                                            <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <?php
                                                if ($pembayaran['status'] == '0') { ?>
                                                    <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('manajemen_kelas/pembayaran_kelas/verification/' . $pembayaran['id_class_member']); ?>');">Verifikasi</a></li>
                                                    <li><a class="dropdown-item" href="javascript::void(0)" onclick="showAjaxModal('<?php echo site_url('modal/popup/pembayaran_kelas_upload/' . $pembayaran['kd_booking']); ?>', 'Upload Bukti Pembayaran')">Upload Bukti</a></li>
                                                <?php } else if ($pembayaran['status'] == '1') { ?>
                                                    <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('manajemen_kelas/pembayaran_kelas/unverification/' . $pembayaran['id_class_member']); ?>');">Batalkan Verifikasi</a></li>
                                                    <li><a class="dropdown-item" href="javascript::void(0)" onclick="showAjaxModal('<?php echo site_url('modal/popup/pembayaran_kelas_upload/' . $pembayaran['kd_booking']); ?>', 'Upload Bukti Pembayaran')">Upload Bukti</a></li>
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