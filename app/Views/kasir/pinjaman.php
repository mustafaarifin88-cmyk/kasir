<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="card border-0 shadow-sm" style="border-radius: 15px;">
    <div class="card-header d-flex justify-content-between align-items-center border-0 pt-4 px-4 pb-0">
        <h4 class="card-title font-weight-bold text-primary m-0"><i class="fas fa-wallet mr-2"></i>Data Pinjaman Karyawan</h4>
        <button type="button" class="btn btn-primary shadow-sm rounded-pill px-3" data-toggle="modal" data-target="#modalTambah">
            <i class="fas fa-plus mr-1"></i> Catat Pinjaman
        </button>
    </div>
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover table-borderless align-middle">
                <thead class="text-muted" style="border-bottom: 2px solid #f0f2f5;">
                    <tr>
                        <th width="5%" class="pl-3">No</th>
                        <th>Tanggal</th>
                        <th>Nama Karyawan</th>
                        <th>Jumlah Pinjaman</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($pinjaman as $row): ?>
                    <tr style="border-bottom: 1px solid #f0f2f5;">
                        <td class="pl-3 align-middle"><?= $no++ ?></td>
                        <td class="align-middle text-muted"><?= date('d M Y', strtotime($row['tanggal'])) ?></td>
                        <td class="align-middle font-weight-bold text-dark"><?= $row['nama_lengkap'] ?></td>
                        <td class="align-middle">
                            <span class="badge badge-danger px-3 py-2 shadow-sm" style="border-radius: 8px; font-size: 0.9rem;">
                                Rp <?= number_format($row['jumlah_pinjaman'], 0, ',', '.') ?>
                            </span>
                        </td>
                        <td class="align-middle text-center">
                            <button class="btn btn-warning btn-sm shadow-sm mr-1 rounded-circle" data-toggle="modal" data-target="#modalEdit<?= $row['id'] ?>" style="width: 35px; height: 35px;"><i class="fas fa-pen text-white"></i></button>
                            <a href="<?= base_url('kasir/pinjaman/delete/' . $row['id']) ?>" class="btn btn-danger btn-sm shadow-sm rounded-circle" onclick="return confirm('Yakin menghapus data pinjaman ini?')" style="width: 35px; height: 35px; display: inline-flex; align-items: center; justify-content: center;"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>

                    <div class="modal fade" id="modalEdit<?= $row['id'] ?>" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0 shadow">
                                <form action="<?= base_url('kasir/pinjaman/update/' . $row['id']) ?>" method="post">
                                    <div class="modal-header border-0 pb-0">
                                        <h5 class="modal-title font-weight-bold text-primary">Edit Pinjaman</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body p-4">
                                        <div class="form-group mb-3">
                                            <label class="text-dark font-weight-bold">Tanggal</label>
                                            <input type="date" name="tanggal" class="form-control bg-light border-0" value="<?= $row['tanggal'] ?>" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="text-dark font-weight-bold">Nama Karyawan</label>
                                            <select name="id_karyawan" class="form-control bg-light border-0" required>
                                                <?php foreach($karyawan as $k): ?>
                                                    <option value="<?= $k['id'] ?>" <?= $k['id'] == $row['id_karyawan'] ? 'selected' : '' ?>><?= $k['nama_lengkap'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group mb-0">
                                            <label class="text-dark font-weight-bold">Jumlah Pinjaman (Rp)</label>
                                            <input type="number" name="jumlah_pinjaman" class="form-control bg-light border-0" value="<?= $row['jumlah_pinjaman'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-0 pt-0">
                                        <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary px-4 shadow-sm">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <form action="<?= base_url('kasir/pinjaman/save') ?>" method="post">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title font-weight-bold text-primary">Catat Pinjaman Baru</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body p-4">
                    <div class="form-group mb-3">
                        <label class="text-dark font-weight-bold">Tanggal Pinjam</label>
                        <input type="date" name="tanggal" class="form-control bg-light border-0" value="<?= date('Y-m-d') ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="text-dark font-weight-bold">Nama Karyawan</label>
                        <select name="id_karyawan" class="form-control bg-light border-0" required>
                            <option value="">-- Pilih Karyawan --</option>
                            <?php foreach($karyawan as $k): ?>
                                <option value="<?= $k['id'] ?>"><?= $k['nama_lengkap'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group mb-0">
                        <label class="text-dark font-weight-bold">Jumlah Pinjaman (Rp)</label>
                        <input type="number" name="jumlah_pinjaman" class="form-control bg-light border-0" placeholder="Masukkan jumlah uang" required>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4 shadow-sm">Simpan Pinjaman</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>