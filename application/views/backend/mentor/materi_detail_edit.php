<?php
// $param2 IS FOR MATERI SECTION ID AND $param3 IS FOR MATERI DETAIL
$materi_section = $this->manajemen_kelas_model->get_materi_section('section', $param3)->result_array();
$materi_detail = $this->manajemen_kelas_model->get_materi_detail('detail', $param2)->row_array();
$class = $this->manajemen_kelas_model->get_materi_section('section', $param3)->row_array();
?>

<!-- ACTUAL LESSON ADDING FORM -->
<form action="<?php echo site_url('manajemen_kelas/materi_detail/' . $class['id_class'] . '/edit' . '/' . $param2); ?>" method="post" enctype="multipart/form-data">

    <input type="hidden" name="id_class" value="<?php echo $param3; ?>">

    <div class="form-group">
        <label>Materi Detail</label>
        <input type="text" name="nm_class_materi_detail" id="nm_class_materi_detail" class="form-control" required value="<?php echo $materi_detail['nm_class_materi_detail']; ?>">
    </div>

    <div class="form-group">
        <label for="section_id">Materi Section</label>
        <select class="form-control select2" data-toggle="select2" name="id_class_materi_section" id="id_class_materi_section" required>
            <?php foreach ($materi_section as $section) : ?>
                <option value="<?php echo $section['id_class_materi_section']; ?>" <?php if ($materi_detail['id_class_materi_section'] == $section['id_class_materi_section']) echo 'selected'; ?>><?php echo $section['nm_class_materi_section']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="title">Posisi</label>
        <input class="form-control" type="number" name="position" id="position" required value="<?php echo $materi_detail['position']; ?>">
    </div>

    <div class="form-group">
        <label for="title">Url Materi</label>
        <input class="form-control" type="text" name="url_materi" id="url_materi" onkeyup="ajax_get_video_details(this.value)" required value="<?php echo $materi_detail['url_materi']; ?>">
        <label class="form-label" id="perloader" style="margin-top: 4px; display: none;"><i class="mdi mdi-spin mdi-loading">&nbsp;</i>Analyzing The Url</label>
        <label class="form-label" id="invalid_url" style="margin-top: 4px; color: red; display: none;"><?php echo 'Url Tidak Valid' . '. ' . 'Sumber Video Anda Harus Berupa Youtube'; ?></label>
    </div>

    <div class="form-group">
        <label for="title">Durasi</label>
        <input class="form-control" type="text" name="duration" id="duration" required value="<?php echo $materi_detail['duration']; ?>">
    </div>

    <div class="form-group">
        <label for="title">Deskripsi</label>
        <textarea class="form-control" type="text" name="desc" id="desc" required><?php echo $materi_detail['desc']; ?></textarea>
    </div>

    <div class="text-center">
        <button class="btn btn-success" type="submit" name="button">Ubah Materi Detail</button>
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