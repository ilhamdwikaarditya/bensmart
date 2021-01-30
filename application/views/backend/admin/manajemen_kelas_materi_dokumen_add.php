<?php
$materi_detail = $this->manajemen_kelas_model->get_materi_detail('detail', $id_class_materi_detail)->result_array();
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

                <h4 class="header-title mb-3">Form Tambah Materi Dokumen
                    <a href="javascript::" onclick="window.history.back()" class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i class=" mdi mdi-keyboard-backspace"></i> Kembali</a>
                </h4>

                <div id="progressbarwizard">
                    <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
                        <li class="nav-item">
                            <a href="#materi" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                <i class="mdi mdi-face-profile mr-1"></i>
                                <span class="d-none d-sm-inline">Materi Dokumen</span>
                            </a>
                        </li>

                    </ul>
                    <div class="tab-content b-0 mb-0">

                        <div class="tab-pane" id="materi">
                            <div class="row justify-content-center">
                                <div class="col-xl-12 mb-4 text-center mt-3">
                                    <!-- <a href="javascript::void(0)" class="btn btn-outline-primary btn-rounded btn-sm ml-1" onclick="showAjaxModal('<?php echo site_url('modal/popup/materi_detail_dokumen_add/' . $id_class_materi_detail); ?>', 'Tambah Materi Dokumen Baru')"><i class="mdi mdi-plus"></i> Tambah Materi Dokumen</a> -->
                                </div>

                                <div class="col-xl-8">
                                    <div class="row">
                                        <?php
                                        $dokumen_counter = 0;
                                        foreach ($materi_detail as $key => $detail) : ?>
                                            <div class="col-xl-12">
                                                <div class="card bg-light text-seconday on-hover-action mb-5" id="section-<?php echo $detail['id_class_materi_detail']; ?>">
                                                    <div class="card-body">
                                                        <h5 class="card-title" class="mb-3" style="min-height: 45px;"><span class="font-weight-light"><?php echo 'List Dokumen' ?></span> <?php echo $detail['nm_class_materi_detail']; ?>
                                                        </h5>
                                                        <div class="clearfix"></div>
                                                        <?php
                                                        // $documents = $this->crud_model->get_lessons('section', $detail['id'])->result_array();
                                                        $documents = $this->manajemen_kelas_model->get_materi_detail_dokumen('detail', $detail['id_class_materi_detail'])->result_array();
                                                        foreach ($documents as $index => $document) : ?>
                                                            <div class="col-md-12">
                                                                <!-- Portlet card -->
                                                                <div class="card text-secondary on-hover-action mb-2" id="<?php echo 'lesson-' . $document['id_class_materi_dokumen']; ?>">
                                                                    <?php if ($detail['active'] == '1') { ?>
                                                                        <div class="card-body thinner-card-body bg-warning">
                                                                            <div class="card-widgets display-none" id="widgets-of-lesson-<?php echo $document['id_class_materi_dokumen']; ?>">
                                                                                <!-- <a href="javascript::" onclick="showAjaxModal('<?php echo site_url('modal/popup/materi_detail_edit/' . $document['id_class_materi_detail'] . '/' . $document['id_class_materi_detail']); ?>', 'Edit Materi Detail')"><i class="mdi mdi-eye"></i></a> -->
                                                                                <a href="<?php echo site_url('uploads/materi_detail_dokumen//'.$document['file_materi_dokumen']); ?>" target="_blank" onclick=""><i class="mdi mdi-eye"></i></a>
                                                                            </div>
                                                                            <h5 class="card-title mb-0">
                                                                                <span class="font-weight-light">
                                                                                    <?php
                                                                                    $dokumen_counter++; // Keeps track of number of lesson
                                                                                    ?>
                                                                                    <?php echo 'Dokumen' . ' ' . $dokumen_counter; ?>
                                                                                </span>: <?php echo $document['nm_materi_dokumen']; ?>
                                                                            </h5>
                                                                        </div>
                                                                    <?php } else if ($detail['active'] == '2') { ?>
                                                                        <div class="card-body thinner-card-body bg-danger">
                                                                            <div class="card-widgets display-none" id="widgets-of-lesson-<?php echo $document['id_class_materi_dokumen']; ?>">
                                                                                <!-- <a href="javascript::" onclick="showAjaxModal('<?php echo site_url('modal/popup/materi_detail_edit/' . $document['id_class_materi_detail'] . '/' . $document['id_class_materi_detail']); ?>', 'Edit Materi Detail')"><i class="mdi mdi-eye"></i></a> -->
                                                                                <a href="<?php echo site_url('uploads/materi_detail_dokumen//'.$document['file_materi_dokumen']); ?>" target="_blank" onclick=""><i class="mdi mdi-eye"></i></a>
                                                                                <a href="javascript::" onclick="confirm_modal('<?php echo site_url('manajemen_kelas/materi_detail_dokumen/' . $id_class_materi_detail . '/delete' . '/' . $document['id_class_materi_dokumen']); ?>');"><i class="mdi mdi-window-close"></i></a>
                                                                            </div>
                                                                            <h5 class="card-title mb-0">
                                                                                <span class="font-weight-light">
                                                                                    <?php
                                                                                    $dokumen_counter++; // Keeps track of number of lesson
                                                                                    ?>
                                                                                    <?php echo 'Dokumen' . ' ' . $dokumen_counter; ?>
                                                                                </span>: <?php echo $document['nm_materi_dokumen']; ?>
                                                                            </h5>
                                                                        </div>
                                                                    <?php } else if ($detail['active'] == '3') { ?>
                                                                        <div class="card-body thinner-card-body bg-success">
                                                                            <div class="card-widgets display-none" id="widgets-of-lesson-<?php echo $document['id_class_materi_dokumen']; ?>">
                                                                                <!-- <a href="javascript::" onclick="showAjaxModal('<?php echo site_url('modal/popup/materi_detail_edit/' . $document['id_class_materi_detail'] . '/' . $document['id_class_materi_detail']); ?>', 'Edit Materi Detail')"><i class="mdi mdi-eye"></i></a> -->
                                                                                <a href="<?php echo site_url('uploads/materi_detail_dokumen//'.$document['file_materi_dokumen']); ?>" target="_blank" onclick=""><i class="mdi mdi-eye"></i></a>
                                                                            </div>
                                                                            <h5 class="card-title mb-0">
                                                                                <span class="font-weight-light">
                                                                                    <?php
                                                                                    $dokumen_counter++; // Keeps track of number of lesson
                                                                                    ?>
                                                                                    <?php echo 'Dokumen' . ' ' . $dokumen_counter; ?>
                                                                                </span>: <?php echo $document['nm_materi_dokumen']; ?>
                                                                            </h5>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div> <!-- end card-->
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div> <!-- end card-body-->
                                                </div> <!-- end card-->
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- tab-content -->
                </div> <!-- end #progressbarwizard-->

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        initSummerNote(['#description']);
        togglePriceFields('is_free_course');
    });
</script>

<script type="text/javascript">
    var blank_outcome = jQuery('#blank_outcome_field').html();
    var blank_requirement = jQuery('#blank_requirement_field').html();
    jQuery(document).ready(function() {
        jQuery('#blank_outcome_field').hide();
        jQuery('#blank_requirement_field').hide();
        calculateDiscountPercentage($('#discounted_price').val());
    });

    function appendOutcome() {
        jQuery('#outcomes_area').append(blank_outcome);
    }

    function removeOutcome(outcomeElem) {
        jQuery(outcomeElem).parent().parent().remove();
    }

    function appendRequirement() {
        jQuery('#requirement_area').append(blank_requirement);
    }

    function removeRequirement(requirementElem) {
        jQuery(requirementElem).parent().parent().remove();
    }

    function ajax_get_sub_category(category_id) {
        console.log(category_id);
        $.ajax({
            url: '<?php echo site_url('admin/ajax_get_sub_category/'); ?>' + category_id,
            success: function(response) {
                jQuery('#sub_category_id').html(response);
            }
        });
    }

    function priceChecked(elem) {
        if (jQuery('#discountCheckbox').is(':checked')) {

            jQuery('#discountCheckbox').prop("checked", false);
        } else {

            jQuery('#discountCheckbox').prop("checked", true);
        }
    }

    function topCourseChecked(elem) {
        if (jQuery('#isTopCourseCheckbox').is(':checked')) {

            jQuery('#isTopCourseCheckbox').prop("checked", false);
        } else {

            jQuery('#isTopCourseCheckbox').prop("checked", true);
        }
    }

    function isFreeCourseChecked(elem) {

        if (jQuery('#' + elem.id).is(':checked')) {
            $('#price').prop('required', false);
        } else {
            $('#price').prop('required', true);
        }
    }

    function calculateDiscountPercentage(discounted_price) {
        if (discounted_price > 0) {
            var actualPrice = jQuery('#price').val();
            if (actualPrice > 0) {
                var reducedPrice = actualPrice - discounted_price;
                var discountedPercentage = (reducedPrice / actualPrice) * 100;
                if (discountedPercentage > 0) {
                    jQuery('#discounted_percentage').text(discountedPercentage.toFixed(2) + "%");

                } else {
                    jQuery('#discounted_percentage').text('<?php echo '0%'; ?>');
                }
            }
        }
    }

    $('.on-hover-action').mouseenter(function() {
        var id = this.id;
        $('#widgets-of-' + id).show();
    });
    $('.on-hover-action').mouseleave(function() {
        var id = this.id;
        $('#widgets-of-' + id).hide();
    });
</script>