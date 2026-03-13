<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm" style="border-radius: 15px;">
            <div class="card-header bg-gradient-primary text-white border-0 p-4" style="background: linear-gradient(135deg, #4e73df 0%, #224abe 100%); border-radius: 15px 15px 0 0;">
                <h4 class="card-title font-weight-bold m-0"><i class="fas fa-calculator mr-2"></i>Catat Transaksi Layanan</h4>
                <p class="mb-0 mt-1" style="font-size: 0.9rem; opacity: 0.8;">Pilih karyawan dan layanan yang diberikan kepada pelanggan.</p>
            </div>
            
            <form action="<?= base_url('kasir/transaksi/save') ?>" method="post">
                <div class="card-body p-4">
                    
                    <div class="form-group mb-4">
                        <label class="font-weight-bold text-dark" style="font-size: 1.1rem;">1. Karyawan / Barber</label>
                        <select name="id_karyawan" class="form-control form-control-lg bg-light border-0 shadow-none" required>
                            <option value="">-- Pilih Karyawan yang Bertugas --</option>
                            <?php foreach($karyawan as $k): ?>
                                <option value="<?= $k['id'] ?>"><?= $k['nama_lengkap'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label class="font-weight-bold text-dark" style="font-size: 1.1rem;">2. Jenis Cukur / Varian</label>
                                <select name="id_varian" class="form-control form-control-lg bg-light border-0 shadow-none" required>
                                    <option value="">-- Pilih Varian Harga --</option>
                                    <?php foreach($varian as $v): ?>
                                        <option value="<?= $v['id'] ?>"><?= $v['nama_varian'] ?> - Rp <?= number_format($v['harga'], 0, ',', '.') ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label class="font-weight-bold text-dark" style="font-size: 1.1rem;">3. Persentase Karyawan</label>
                                <select name="id_persentase" class="form-control form-control-lg bg-light border-0 shadow-none" required>
                                    <option value="">-- Pilih Bagi Hasil --</option>
                                    <?php foreach($persentase as $p): ?>
                                        <option value="<?= $p['id'] ?>"><?= $p['nilai_persentase'] ?> %</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-2">
                        <label class="font-weight-bold text-dark" style="font-size: 1.1rem;">4. Layanan Tambahan <small class="text-muted">(Opsional)</small></label>
                        <select name="id_biaya_tambahan" class="form-control form-control-lg bg-light border-0 shadow-none">
                            <option value="">-- Tidak ada layanan tambahan --</option>
                            <?php foreach($biaya_tambahan as $b): ?>
                                <option value="<?= $b['id'] ?>"><?= $b['nama_biaya'] ?> - Rp <?= number_format($b['harga'], 0, ',', '.') ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>
                
                <div class="card-footer bg-transparent border-0 px-4 pb-4 pt-0 text-right">
                    <button type="submit" class="btn btn-success btn-lg shadow-sm px-5 rounded-pill" style="font-weight: 600;"><i class="fas fa-check-circle mr-2"></i>Simpan Transaksi</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>