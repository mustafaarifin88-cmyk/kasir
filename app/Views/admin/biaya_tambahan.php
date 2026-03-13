<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center border-0 pt-4 px-4 pb-0">
        <h4 class="card-title font-weight-bold text-primary m-0"><i class="fas fa-plus-square mr-2"></i>Biaya Tambahan Layanan</h4>
        <button type="button" class="btn btn-primary shadow-sm" data-toggle="modal" data-target="#modalTambah">
            <i class="fas fa-plus mr-1"></i> Tambah Layanan
        </button>
    </div>
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover table-borderless align-middle">
                <thead class="text-muted" style="border-bottom: 2px solid #f0f2f5;">
                    <tr>
                        <th width="5%" class="pl-3">No</th>
                        <th>Nama Layanan (Misal: Cuci Rambut)</th>
                        <th>Tarif Tambahan</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($biaya as $row): ?>
                    <tr style="border-bottom: 1px solid #f0f2f5;">
                        <td class="pl-3 align-middle"><?= $no++ ?></td>
                        <td class="align-middle font-weight-bold text-dark"><?= $row['nama_biaya'] ?></td>
                        <td class="align-middle">
                            <span class="badge badge-info px-3 py-2 text-white shadow-sm" style="border-radius: 8px; font-size: 0.9rem;">
                                Rp <?= number_format($row['harga'], 0, ',', '.') ?>
                            </span>
                        </td>
                        <td class="align-middle text-center">
                            <button class="btn btn-warning btn-sm shadow-sm mr-1 rounded-circle" data-toggle="modal" data-target="#modalEdit<?= $row['id'] ?>" style="width: 35px; height: 35px;"><i class="fas fa-pen text-white"></i></button>
                            <a href="<?= base_url('admin/biayatambahan/delete/' . $row['id']) ?>" class="btn btn-danger btn-sm shadow-sm rounded-circle" onclick="return confirm('Yakin hapus data ini?')" style="width: 35px; height: 35px; display: inline-flex; align-items: center; justify-content: center;"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>

                    <div class="modal fade" id="modalEdit<?= $row['id'] ?>" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0 shadow">
                                <form action="<?= base_url('admin/biayatambahan/update/' . $row['id']) ?>" method="post">
                                    <div class="modal-header border-0 pb-0">
                                        <h5 class="modal-title font-weight-bold text-primary">Edit Biaya Tambahan</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body p-4">
                                        <div class="form-group mb-3">
                                            <label class="text-dark font-weight-bold">Nama Layanan</label>
                                            <input type="text" name="nama_biaya" class="form-control bg-light border-0" value="<?= $row['nama_biaya'] ?>" required>
                                        </div>
                                        <div class="form-group mb-0">
                                            <label class="text-dark font-weight-bold">Tarif Harga (Rp)</label>
                                            <input type="number" name="harga" class="form-control bg-light border-0" value="<?= $row['harga'] ?>" required>
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
            <form action="<?= base_url('admin/biayatambahan/save') ?>" method="post">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title font-weight-bold text-primary">Tambah Layanan Baru</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body p-4">
                    <div class="form-group mb-3">
                        <label class="text-dark font-weight-bold">Nama Layanan</label>
                        <input type="text" name="nama_biaya" class="form-control bg-light border-0" placeholder="Misal: Cuci Rambut, Pijat" required>
                    </div>
                    <div class="form-group mb-0">
                        <label class="text-dark font-weight-bold">Tarif Harga (Rp)</label>
                        <input type="number" name="harga" class="form-control bg-light border-0" placeholder="Masukkan angka saja" required>
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
<?= $this->endSection() ?>