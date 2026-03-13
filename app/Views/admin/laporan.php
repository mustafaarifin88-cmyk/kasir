<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="card mb-4 border-0 shadow-sm" style="border-radius: 15px;">
    <div class="card-body p-4 bg-light" style="border-radius: 15px;">
        <form action="<?= base_url('admin/laporan') ?>" method="get">
            <div class="row align-items-end">
                <div class="col-md-3 mb-3 mb-md-0">
                    <label class="font-weight-bold text-dark">Filter Karyawan</label>
                    <select name="id_karyawan" class="form-control border-0 shadow-none">
                        <option value="">-- Semua Karyawan --</option>
                        <?php foreach($karyawan as $k): ?>
                            <option value="<?= $k['id'] ?>" <?= ($id_karyawan == $k['id']) ? 'selected' : '' ?>><?= $k['nama_lengkap'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-3 mb-3 mb-md-0">
                    <label class="font-weight-bold text-dark">Mulai Tanggal</label>
                    <input type="date" name="start_date" class="form-control border-0 shadow-none" value="<?= $start_date ?>">
                </div>
                <div class="col-md-3 mb-3 mb-md-0">
                    <label class="font-weight-bold text-dark">Sampai Tanggal</label>
                    <input type="date" name="end_date" class="form-control border-0 shadow-none" value="<?= $end_date ?>">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary btn-block shadow-sm"><i class="fas fa-search mr-1"></i> Tampilkan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php if(isset($_GET['start_date'])): ?>
<div class="card border-0 shadow-sm mb-4" style="border-radius: 15px;">
    <div class="card-header bg-white border-0 pt-4 px-4 pb-0 d-flex justify-content-between align-items-center">
        <h5 class="font-weight-bold text-dark m-0">Ringkasan Gajian Karyawan</h5>
        <a href="<?= base_url('admin/laporan/cetakPdf?id_karyawan='.$id_karyawan.'&start_date='.$start_date.'&end_date='.$end_date) ?>" target="_blank" class="btn btn-danger shadow-sm rounded-pill px-4">
            <i class="fas fa-file-pdf mr-1"></i> Cetak PDF
        </a>
    </div>
    
    <div class="card-body p-4">
        <h6 class="font-weight-bold text-primary mt-3 mb-3 border-bottom pb-2">Pendapatan Karyawan (Hasil Potong + Tambahan)</h6>
        <div class="table-responsive mb-4">
            <table class="table table-hover table-borderless align-middle">
                <thead class="bg-light text-muted" style="border-radius: 10px;">
                    <tr>
                        <th class="pl-3">Tanggal</th>
                        <th>Nama Karyawan</th>
                        <th>Jenis Cukur</th>
                        <th>Tambahan Layanan</th>
                        <th class="text-right pr-3">Pendapatan Karyawan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $total_gaji = 0;
                    if(empty($transaksi)): ?>
                        <tr><td colspan="5" class="text-center text-muted py-3">Tidak ada data transaksi.</td></tr>
                    <?php else: foreach($transaksi as $t): 
                        $total_gaji += $t['total_pendapatan'];
                    ?>
                        <tr style="border-bottom: 1px solid #f0f2f5;">
                            <td class="pl-3"><?= date('d/m/Y', strtotime($t['tanggal'])) ?></td>
                            <td class="font-weight-bold text-dark"><?= $t['nama_lengkap'] ?></td>
                            <td><span class="badge badge-info px-2 py-1"><?= $t['nama_varian'] ?></span></td>
                            <td><span class="badge badge-secondary px-2 py-1"><?= $t['nama_biaya'] ?? '-' ?></span></td>
                            <td class="text-right pr-3 text-success font-weight-bold">Rp <?= number_format($t['total_pendapatan'], 0, ',', '.') ?></td>
                        </tr>
                    <?php endforeach; endif; ?>
                    <tr class="bg-light">
                        <td colspan="4" class="text-right font-weight-bold pl-3">Total Pendapatan Karyawan</td>
                        <td class="text-right pr-3 font-weight-bold text-success" style="font-size: 1.1rem;">Rp <?= number_format($total_gaji, 0, ',', '.') ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h6 class="font-weight-bold text-danger mb-3 border-bottom pb-2">Potongan Pinjaman Karyawan</h6>
        <div class="table-responsive mb-4">
            <table class="table table-hover table-borderless align-middle">
                <thead class="bg-light text-muted">
                    <tr>
                        <th class="pl-3">Tanggal Pinjam</th>
                        <th>Nama Karyawan</th>
                        <th class="text-right pr-3">Jumlah Pinjaman</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $total_pinjaman = 0;
                    if(empty($pinjaman)): ?>
                        <tr><td colspan="3" class="text-center text-muted py-3">Tidak ada data pinjaman.</td></tr>
                    <?php else: foreach($pinjaman as $p): 
                        $total_pinjaman += $p['jumlah_pinjaman'];
                    ?>
                        <tr style="border-bottom: 1px solid #f0f2f5;">
                            <td class="pl-3"><?= date('d/m/Y', strtotime($p['tanggal'])) ?></td>
                            <td class="font-weight-bold text-dark"><?= $p['nama_lengkap'] ?></td>
                            <td class="text-right pr-3 text-danger font-weight-bold">Rp <?= number_format($p['jumlah_pinjaman'], 0, ',', '.') ?></td>
                        </tr>
                    <?php endforeach; endif; ?>
                    <tr class="bg-light">
                        <td colspan="2" class="text-right font-weight-bold pl-3">Total Pinjaman Karyawan</td>
                        <td class="text-right pr-3 font-weight-bold text-danger" style="font-size: 1.1rem;">Rp <?= number_format($total_pinjaman, 0, ',', '.') ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="row mt-5">
            <div class="col-md-6 offset-md-6">
                <div class="card bg-gradient-primary text-white border-0" style="background: linear-gradient(135deg, #4e73df 0%, #224abe 100%); border-radius: 15px;">
                    <div class="card-body">
                        <h5 class="font-weight-bold mb-3 border-bottom border-light pb-2">Kalkulasi Akhir Gajian</h5>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total Hak Pendapatan</span>
                            <span class="font-weight-bold">Rp <?= number_format($total_gaji, 0, ',', '.') ?></span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total Potongan Pinjaman</span>
                            <span class="font-weight-bold text-warning">- Rp <?= number_format($total_pinjaman, 0, ',', '.') ?></span>
                        </div>
                        <hr class="border-light opacity-50">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="font-weight-bold" style="font-size: 1.1rem;">Pendapatan Bersih (Gaji Diterima)</span>
                            <span class="font-weight-bold" style="font-size: 1.5rem;">Rp <?= number_format($total_gaji - $total_pinjaman, 0, ',', '.') ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?= $this->endSection() ?>