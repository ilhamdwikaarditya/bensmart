<form action="<?php echo site_url('manajemen_kelas/materi_section/'.$param2.'/add'); ?>" method="post">
    <div class="form-group">
        <label for="title">Materi Section</label>
        <input class="form-control" type="text" name="nm_class_materi_section" id="nm_class_materi_section" required>
        <small class="text-muted">Tuliskan Nama Materi Section</small>
    </div>
    <div class="form-group">
        <label for="title">Posisi</label>
        <input class="form-control" type="number" name="position" id="position" required>
        <small class="text-muted">Tuliskan Posisi Materi Section</small>
    </div>
    <div class="text-right">
        <button class = "btn btn-success" type="submit" name="button">Submit</button>
    </div>
</form>
