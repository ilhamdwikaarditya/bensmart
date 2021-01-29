<?php
// $param2 IS FOR COURSE ID AND $param3 IS FOR LESSON TYPE
$materi_section = $this->manajemen_kelas_model->get_materi_section('class', $param2)->result_array();
?>

<!-- ACTUAL LESSON ADDING FORM -->
<form action="<?php echo site_url('mentor/materi_detail/'.$param2.'/add'); ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_class" id="id_class" value="<?php echo $param2; ?>">
    <div class="form-group">
        <label>Materi Detail</label>
        <input type="text" name="nm_class_materi_detail" id="nm_class_materi_detail" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Materi Section</label>
        <select class="form-control select2" data-toggle="select2" name="id_class_materi_section" id="id_class_materi_section" required>
            <?php foreach ($materi_section as $section): ?>
                <option value="<?php echo $section['id_class_materi_section']; ?>"><?php echo $section['nm_class_materi_section']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="title">Posisi</label>
        <input class="form-control" type="number" name="position" id="position" required>
    </div>

    <div class="form-group">
        <label for="title">Durasi</label>
        <input class="form-control" type="number" name="duration" id="duration" required>
    </div>

    <div class="form-group">
        <label for="title">Url Materi</label>
        <input class="form-control" type="text" name="url_materi" id="url_materi" required>
    </div>

    <div class="form-group">
        <label for="title">Deskripsi</label>
        <textarea class="form-control" type="text" name="desc" id="desc" required></textarea>
    </div>

    <div class="text-center">
        <button class = "btn btn-success" type="submit" name="button">Tambah Materi Detail</button>
    </div>
</form>

<script type="text/javascript">
$(document).ready(function() {
    initSelect2(['#section_id','#lesson_type', '#lesson_provider', '#lesson_provider_for_mobile_application']);
    initTimepicker();

    // HIDING THE SEARCHBOX FROM SELECT2
    $('select').select2({
        minimumResultsForSearch: -1
    });
});
function ajax_get_video_details(video_url) {
    $('#perloader').show();
    if(checkURLValidity(video_url)){
        $.ajax({
            url: '<?php echo site_url('admin/ajax_get_video_details');?>',
            type : 'POST',
            data : {video_url : video_url},
            success: function(response)
            {
                jQuery('#duration').val(response);
                $('#perloader').hide();
                $('#invalid_url').hide();
            }
        });
    }else {
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
    }
    else if (vimeoPregMatch.test(video_url)) {
        return true;
    }
    else {
        return false;
    }
}
</script>
