<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<!-- Banner Selamat Datang -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card bg-gradient-primary text-white border-0 shadow-sm" style="background: linear-gradient(135deg, #4e73df 0%, #224abe 100%); border-radius: 15px;">
            <div class="card-body p-4 d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="font-weight-bold mb-1">Halo, <?= session()->get('nama_lengkap') ?>! 👋</h3>
                    <p class="mb-0" style="opacity: 0.9; font-size: 1.05rem;">
                        Selamat datang kembali di panel Administrator. Berikut adalah ringkasan performa barbershop Anda hari ini.
                    </p>
                </div>
                <div class="d-none d-md-block" style="font-size: 4rem; opacity: 0.2;">
                    <i class="fas fa-chart-line"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Kartu Statistik -->
<div class="row">
    <!-- Pendapatan Hari Ini -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100 py-2" style="border-left: 5px solid #1cc88a !important; border-radius: 15px;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1" style="letter-spacing: 1px;">
                            Pendapatan (Hari Ini)
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-dark">
                            Rp <?= number_format($pendapatan_hari_ini, 0, ',', '.') ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-wallet fa-2x text-gray-300" style="color: #dddfeb;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Transaksi Hari Ini -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100 py-2" style="border-left: 5px solid #36b9cc !important; border-radius: 15px;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1" style="letter-spacing: 1px;">
                            Transaksi (Hari Ini)
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-dark">
                            <?= $total_transaksi ?> <small>Pelanggan</small>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-cut fa-2x text-gray-300" style="color: #dddfeb;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Karyawan -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100 py-2" style="border-left: 5px solid #f6c23e !important; border-radius: 15px;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1" style="letter-spacing: 1px;">
                            Total Karyawan
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-dark">
                            <?= $total_karyawan ?> <small>Orang</small>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300" style="color: #dddfeb;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Cabang -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100 py-2" style="border-left: 5px solid #e74a3b !important; border-radius: 15px;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1" style="letter-spacing: 1px;">
                            Cabang Terdaftar
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-dark">
                            <?= $total_cabang ?> <small>Lokasi</small>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-store fa-2x text-gray-300" style="color: #dddfeb;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Info Login Aktif -->
<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-sm mt-2" style="border-radius: 15px;">
            <div class="card-body p-4">
                <div class="d-flex align-items-center">
                    <div class="mr-3">
                        <img src="<?= base_url('uploads/admin/' . session()->get('foto')) ?>" class="img-fluid rounded-circle shadow-sm" style="width: 50px; height: 50px; object-fit: cover;">
                    </div>
                    <div>
                        <h6 class="mb-0 font-weight-bold text-dark">Sesi Aktif Administrator</h6>
                        <small class="text-muted"><i class="far fa-clock mr-1"></i> Terakhir dimuat pada <?= date('d M Y, H:i') ?></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>