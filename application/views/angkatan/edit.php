<section class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="mb-3">Edit <?= $title; ?></h2>
                        <form action="<?= site_url('angkatan/update') ?>" method="post">
                            <input type="hidden" name="id" value="<?= $angkatan['id'] ?>">
                            <div class="mb-3">
                                <label for="tahun" class="form-label">Tahun</label>
                                <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Masukan tahun" value="<?php echo set_value('tahun') == '' ? $angkatan['tahun'] : set_value('tahun'); ?>">
                                <?php if ($error_tahun != '') : ?>
                                    <small class="text-danger fw-bold fst-italic"><?= $error_tahun ?></small>
                                <?php endif; ?>
                            </div>
                            <button type="submit" class="btn btn-primary float-end ms-1">Update</button>
                            <a href="<?= site_url('angkatan') ?>" class="btn btn-secondary float-end">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>