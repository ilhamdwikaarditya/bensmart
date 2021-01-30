<?php
// $param2 IS FOR MATERI SECTION ID AND $param3 IS FOR MATERI DETAIL
$materi_section = $this->manajemen_kelas_model->get_materi_section('section', $param3)->result_array();
$materi_detail = $this->manajemen_kelas_model->get_materi_detail('detail', $param2)->row_array();
$class = $this->manajemen_kelas_model->get_materi_section('section', $param3)->row_array();
?>

<!-- ACTUAL LESSON ADDING FORM -->

<input type="hidden" name="id_class" value="<?php echo $param3; ?>">

<div class="form-group">
    <label for="title">Alasan Ditolak</label>
    <textarea class="form-control" type="text" name="desc" id="desc" required readonly><?php echo $materi_detail['reason_rejected']; ?></textarea>
</div>

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
            // alert(video_url);
            $.ajax({
                url: '<?php echo site_url('mentor/ajax_get_video_details'); ?>',
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