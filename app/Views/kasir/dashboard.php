<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row mb-4">
    <div class="col-12">
        <div class="card bg-gradient-primary text-white border-0 shadow-sm" style="background: linear-gradient(135deg, #1cc88a 0%, #13855c 100%); border-radius: 15px;">
            <div class="card-body p-4 d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-uppercase mb-1 font-weight-bold" style="letter-spacing: 1px; font-size: 0.85rem; opacity: 0.9;">Aplikasi Kasir</h6>
                    <h3 class="font-weight-bold mb-1">Halo, <?= session()->get('nama_lengkap') ?>! 👋</h3>
                    <p class="mb-0 mt-2" style="opacity: 0.9; font-size: 1.05rem;">
                        Selamat bertugas hari ini! Jangan lupa selalu senyum dan berikan pelayanan terbaik kepada pelanggan.
                    </p>
                </div>
                <div class="d-none d-md-block" style="font-size: 4rem; opacity: 0.2;">
                    <i class="fas fa-cash-register"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100" style="border-radius: 15px; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
            <div class="card-body p-4 text-center">
                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                    <i class="fas fa-calculator fa-2x text-primary"></i>
                </div>
                <h4 class="font-weight-bold text-dark">Catat Transaksi</h4>
                <p class="text-muted">Mulai catat transaksi potong rambut pelanggan dengan cepat dan mudah.</p>
                <a href="<?= base_url('kasir/transaksi') ?>" class="btn btn-primary px-4 rounded-pill shadow-sm mt-2">Buka Aplikasi Kasir</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100" style="border-radius: 15px; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
            <div class="card-body p-4 text-center">
                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                    <i class="fas fa-hand-holding-usd fa-2x text-warning"></i>
                </div>
                <h4 class="font-weight-bold text-dark">Pinjaman Karyawan</h4>
                <p class="text-muted">Kelola dan catat data pinjaman (kasbon) dari karyawan barbershop.</p>
                <a href="<?= base_url('kasir/pinjaman') ?>" class="btn btn-warning text-white px-4 rounded-pill shadow-sm mt-2">Kelola Pinjaman</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>