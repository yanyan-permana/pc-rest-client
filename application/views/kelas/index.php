<section class="main">
    <div class="container">
        <?php if ($this->session->flashdata('pesan_sukses')) : ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('pesan_sukses') ?>.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="mb-3">Data <?= $title; ?></h2>
                    </div>
                    <div class="col-md-6">
                        <a href="<?= site_url('kelas/create') ?>" class="btn btn-primary float-end">
                            Tambah
                        </a>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;

                        foreach ($kelas as $key => $value) :
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value['nama'] ?></td>
                                <td><a href="<?= site_url('kelas/edit/' . $value['id']) ?>">Edit</a> | <a href="javascript::void" id="btn-hapus" data-id="<?= $value['id'] ?>">Hapus</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).on('click', '#btn-hapus', function() {
        Swal.fire({
            title: 'Kamu yakin?',
            text: "Data kelas akan terhapus.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya',
            cancelButtonText: "Tidak",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= site_url('kelas/delete') ?>',
                    type: 'POST',
                    data: {
                        id: $(this).data('id')
                    },
                    success: function() {
                        Swal.fire({
                            title: 'Terhapus',
                            text: "Data kelas berhasil terhapus.",
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    }
                });
            }
        })

    });
</script>