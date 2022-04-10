<section class="main">
    <div class="container">
        <div class="card">
            <h5 class="card-header">Home</h5>
            <div class="card-body">
                <h5 class="card-title">REST Client</h5>
                <p class="card-text">Ini adalah web CRUD Rest Client menggunakan codeigniter 3.</p>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Lanjut ke Menu
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="<?= site_url('angkatan') ?>">Angkatan</a></li>
                        <li><a class="dropdown-item" href="<?= site_url('kelas') ?>">Kelas</a></li>
                        <li><a class="dropdown-item" href="<?= site_url('jenis_pembayaran') ?>">Jenis Pembayaran</a></li>
                        <li><a class="dropdown-item" href="<?= site_url('mahasiswa') ?>">Mahasiswa</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>