<?php
// $param2 IS FOR COURSE ID AND $param3 IS FOR LESSON TYPE
$materi_detail = $this->manajemen_kelas_model->get_materi_detail('detail', $param2)->result_array();
$materi_section = $this->manajemen_kelas_model->get_materi_section('section', $param3)->result_array();
?>

<!-- ACTUAL LESSON ADDING FORM -->
<form action="<?php echo site_url('manajemen_kelas/materi_detail/' . $param1 . '/add_dokumen'); ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_class_materi_detail" id="id_class_materi_detail" value="<?php echo $param1; ?>">
    <div class="form-group">
        <label>Nama Dokumen</label>
        <input type="text" name="nm_materi_dokumen" id="nm_materi_dokumen" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="title"> Dokumen</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="file_materi_dokumen" name="file_materi_dokumen" onchange="changeTitleOfImageUploader(this)">
                <label class="custom-file-label" for="thumbnail">Pilih File</label>
            </div>
        </div>
    </div>

    <div class="text-center">
        <button class="btn btn-success" type="submit" name="button">Tambah Dokumen</button>
    </div>
</form>

<?php
$dokumen_counter = 0;
foreach ($materi_detail as $key => $detail) : ?>
    <br />
    <div class="col-xl-12">
        <div class="card bg-light text-seconday on-hover-action mb-5" id="section-<?php echo $detail['id_class_materi_detail']; ?>">
            <div class="card-body">
                <h5 class="card-title" class="mb-3" style="min-height: 45px;"><span class="font-weight-light">List Dokumen
                        <div class="row justify-content-center alignToTitle float-right display-none" id="widgets-of-section-<?php echo $param2; ?>">
                        </div>
                </h5>
                <div class="clearfix"></div>
                <?php
                $documents = $this->manajemen_kelas_model->get_materi_detail_dokumen('dokumen', $param2)->result_array();
                foreach ($documents as $index => $document) : ?>
                    <div class="col-md-12">
                        <!-- Portlet card -->
                        <div class="card text-secondary on-hover-action mb-2" id="<?php echo 'lesson-' . $document['id_class_materi_dokumen']; ?>">
                            <div class="card-body thinner-card-body">
                                <div class="card-widgets display-none" id="widgets-of-lesson-<?php echo $document['id_class_materi_dokumen']; ?>">
                                    <a href="javascript::" onclick="showAjaxModal('<?php echo site_url('modal/popup/materi_detail_dokumen_edit/' . $document['id_class_materi_dokumen'] . '/' . $document['id_class_materi_detail']); ?>', 'Edit Materi Detail Dokumen')"><i class="mdi mdi-pencil-outline"></i></a>
                                    <a href="javascript::" onclick="confirm_modal('<?php echo site_url('manajemen_kelas/materi_detail_dokumen/' . $param2 . '/delete' . '/' . $document['id_class_materi_dokumen']); ?>');"><i class="mdi mdi-window-close"></i></a>
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
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<script type="text/javascript">
    $(document).ready(function() {
        initSelect2(['#section_id', '#lesson_type', '#lesson_provider', '#lesson_provider_for_mobile_application']);
        initTimepicker();

        // HIDING THE SEARCHBOX FROM SELECT2
        $('select').select2({
            minimumResultsForSearch: -1
        });
    });

    function ajax_get_video_details(video_url) {
        $('#perloader').show();
        if (checkURLValidity(video_url)) {
            $.ajax({
                url: '<?php echo site_url('admin/ajax_get_video_details'); ?>',
                type: 'POST',
                data: {
                    video_url: video_url
                },
                success: function(response) {
                    jQuery('#duration').val(response);
                    $('#perloader').hide();
                    $('#invalid_url').hide();
                }
            });
        } else {
            $('#invalid_url').show();
            $('#perloader').hide();
            jQuery('#duration').val('');

        }
    }

    function checkURLValidity(video_url) {
        var youtubePregMatch = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
        var vimeoPregMatch = /^(http\:\/\/|https\:\/\/)?(www\.)?(vimeo\.com\/)([0-9]+)$/;
        if (video_url.match(youtubePregMatch)) {
            return true;
        } else if (vimeoPregMatch.test(video_url)) {
            return true;
        } else {
            return false;
        }
    }
</script>

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