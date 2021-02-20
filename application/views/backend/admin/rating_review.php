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
                <h4 class="mb-3 header-title">Data Rating dan Review</h4>
                <div class="table-responsive-sm mt-4" style="overflow-x:auto;">
                    <table id="basic-datatable" class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kelas</th>
                                <th>Nama</th>
                                <th>Rating</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($manajemen_rating_review->result_array() as $key => $rating_review) : ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td style="white-space: wordwrap"><?php echo $rating_review['nm_class'] ?></td>
                                    <td style="white-space: nowrap"><?php echo $rating_review['name'] ?></td>
                                    <td style="white-space: wordwrap"><?php echo $rating_review['rating'] ?></td>
                                    <td style="white-space: wordwrap"><?php echo $rating_review['comment'] ?></td>
                                    <td><?php
                                        if ($rating_review['active'] == '0') {
                                            echo 'Non Aktif';
                                        } else if ($rating_review['active'] == '1') {
                                            echo 'Aktif';
                                        }
                                        ?></td>
                                    <td>
                                        <div class="dropright dropright">
                                            <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <?php
                                                if ($rating_review['active'] == '0') { ?>
                                                    <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('manajemen_kelas/rating_review/active/' . $rating_review['id_class_rating']); ?>');">Aktifkan</a></li>
                                                <?php } else if ($rating_review['active'] == '1') { ?>
                                                    <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('manajemen_kelas/rating_review/nonactive/' . $rating_review['id_class_rating']); ?>');">Non Aktifkan</a></li>
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