<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-4 col-md-6 col-12 mb-4">
        <div class="card bg-gradient-primary text-white h-100 p-3" style="background: linear-gradient(135deg, #4e73df 0%, #224abe 100%); border-radius: 15px;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase mb-1 font-weight-bold" style="letter-spacing: 1px; font-size: 0.8rem; opacity: 0.8;">Administrator</h6>
                        <h3 class="mb-0 font-weight-bold">Halo, <?= session()->get('nama_lengkap') ?></h3>
                    </div>
                    <div class="icon" style="font-size: 3rem; opacity: 0.3;">
                        <i class="fas fa-user-shield"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-4">
                <h4 class="font-weight-bold text-dark"><i class="fas fa-magic text-primary mr-2"></i>Selamat Datang di Kasir Barbar</h4>
                <p class="text-muted mt-2" style="font-size: 1.05rem;">
                    Sistem Manajemen Barbershop Anda siap digunakan. Gunakan menu navigasi di sebelah kiri untuk mengelola data cabang, karyawan, varian harga, hingga melihat laporan pendapatan secara *real-time*.
                </p>
                <hr>
                <div class="d-flex align-items-center mt-3">
                    <div class="mr-3">
                        <img src="<?= base_url('uploads/admin/' . session()->get('foto')) ?>" class="img-fluid rounded-circle shadow-sm" style="width: 60px; height: 60px; object-fit: cover;">
                    </div>
                    <div>
                        <h6 class="mb-0 font-weight-bold text-dark">Sesi Aktif</h6>
                        <small class="text-muted">Login pada <?= date('d M Y, H:i') ?></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>