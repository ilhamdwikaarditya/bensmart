<?php
    $course_details = $this->manajemen_kelas_model->get_manajemen_kelas($param3)->row_array();
    $section_details = $this->manajemen_kelas_model->get_materi_section('section', $param2)->row_array();
?>
<form action="<?php echo site_url('mentor/materi_section/'.$param3.'/edit/'.$param2); ?>" method="post">
    <div class="form-group">
        <label for="title">Materi Section</label>
        <input class="form-control" type="text" name="nm_class_materi_section" id="nm_class_materi_section" value="<?php echo $section_details['nm_class_materi_section']; ?>" required>
        <small class="text-muted">Tuliskan Nama Materi Section</small>
    </div>
    <div class="form-group">
        <label for="title">Posisi</label>
        <input class="form-control" type="text" name="position" id="position" value="<?php echo $section_details['position']; ?>" required>
        <small class="text-muted">Tuliskan Posisi Materi Section</small>
    </div>
    <div class="text-right">
        <button class = "btn btn-success" type="submit" name="button">Submit</button>
    </div>
</form>
