<section class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="mb-3">Edit <?= $title; ?></h2>
                        <form action="<?= site_url('kelas/update') ?>" method="post">
                            <input type="hidden" name="id" value="<?= $kelas['id'] ?>">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan nama kelas" value="<?php echo set_value('nama') == '' ? $kelas['nama'] : set_value('nama'); ?>">
                                <?php if ($error_nama != '') : ?>
                                    <small class="text-danger fw-bold fst-italic"><?= $error_nama ?></small>
                                <?php endif; ?>
                            </div>
                            <button type="submit" class="btn btn-primary float-end ms-1">Update</button>
                            <a href="<?= site_url('kelas') ?>" class="btn btn-secondary float-end">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>