<?php
// $param2 IS FOR COURSE ID AND $param3 IS FOR LESSON TYPE
$materi_detail = $this->manajemen_kelas_model->get_materi_detail('detail', $param2)->result_array();
$materi_section = $this->manajemen_kelas_model->get_materi_section('section', $param3)->result_array();
?>

<!-- ACTUAL LESSON ADDING FORM -->
<form action="<?php echo site_url('manajemen_kelas/materi_detail_dokumen/' . $param2 . '/add'); ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_class_materi_detail" id="id_class_materi_detail" value="<?php echo $param2; ?>">
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