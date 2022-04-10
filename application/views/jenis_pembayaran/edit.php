<section class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="mb-3">Edit <?= $title; ?></h2>
                        <form action="<?= site_url('jenis_pembayaran/update') ?>" method="post">
                            <input type="hidden" name="id" value="<?= $jenis_pembayaran['id'] ?>">
                            <div class="mb-3">
                                <label for="kelas_id" class="form-label">Kelas</label>
                                <select class="form-select" name="kelas_id" id="kelas_id">
                                    <option value="">Pilih kelas</option>
                                    <?php foreach ($kelas as $key => $value) : ?>
                                        <option value="<?= $value['id'] ?>" <?= $jenis_pembayaran['kelas_id'] == $value['id'] ? 'selected' : '' ?>><?= $value['nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if ($error_kelas_id != '') : ?>
                                    <small class="text-danger fw-bold fst-italic"><?= $error_kelas_id ?></small>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama biaya</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan nama" value="<?php echo set_value('nama') == '' ? $jenis_pembayaran['nama'] : set_value('nama'); ?>">
                                <?php if ($error_nama != '') : ?>
                                    <small class="text-danger fw-bold fst-italic"><?= $error_nama ?></small>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label for="biaya" class="form-label">Biaya</label>
                                <input type="text" class="form-control" name="biaya" id="biaya" placeholder="Masukan biaya" value="<?php echo  number_format($jenis_pembayaran['biaya'], 0, ',', '.'); ?>">
                                <?php if ($error_biaya != '') : ?>
                                    <small class="text-danger fw-bold fst-italic"><?= $error_biaya ?></small>
                                <?php endif; ?>
                            </div>
                            <button type="submit" class="btn btn-primary float-end ms-1">Update</button>
                            <a href="<?= site_url('jenis_pembayaran') ?>" class="btn btn-secondary float-end">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    let biaya = document.getElementById('biaya');

    biaya.addEventListener('keyup', function() {
        // formatRupiah(biaya.value);
        biaya.value = formatRupiah(this.value);
        // biaya.value = this.value.split('.').join('');
    })

    function formatRupiah(angka, prefix) {
        let number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>