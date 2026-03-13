<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center border-0 pt-4 px-4 pb-0">
        <h4 class="card-title font-weight-bold text-primary m-0"><i class="fas fa-chart-pie mr-2"></i>Persentase Bagi Hasil</h4>
        <button type="button" class="btn btn-primary shadow-sm" data-toggle="modal" data-target="#modalTambah">
            <i class="fas fa-plus mr-1"></i> Tambah Persentase
        </button>
    </div>
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover table-borderless align-middle">
                <thead class="text-muted" style="border-bottom: 2px solid #f0f2f5;">
                    <tr>
                        <th width="5%" class="pl-3">No</th>
                        <th>Nilai Persentase Karyawan</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($persentase as $row): ?>
                    <tr style="border-bottom: 1px solid #f0f2f5;">
                        <td class="pl-3 align-middle"><?= $no++ ?></td>
                        <td class="align-middle">
                            <span class="badge badge-primary px-4 py-2 shadow-sm" style="border-radius: 8px; font-size: 1rem;">
                                <?= $row['nilai_persentase'] ?> %
                            </span>
                        </td>
                        <td class="align-middle text-center">
                            <button class="btn btn-warning btn-sm shadow-sm mr-1 rounded-circle" data-toggle="modal" data-target="#modalEdit<?= $row['id'] ?>" style="width: 35px; height: 35px;"><i class="fas fa-pen text-white"></i></button>
                            <a href="<?= base_url('admin/persentase/delete/' . $row['id']) ?>" class="btn btn-danger btn-sm shadow-sm rounded-circle" onclick="return confirm('Yakin hapus data ini?')" style="width: 35px; height: 35px; display: inline-flex; align-items: center; justify-content: center;"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>

                    <div class="modal fade" id="modalEdit<?= $row['id'] ?>" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered modal-sm">
                            <div class="modal-content border-0 shadow">
                                <form action="<?= base_url('admin/persentase/update/' . $row['id']) ?>" method="post">
                                    <div class="modal-header border-0 pb-0">
                                        <h5 class="modal-title font-weight-bold text-primary">Edit Persentase</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body p-4">
                                        <div class="form-group mb-0">
                                            <label class="text-dark font-weight-bold">Nilai (%)</label>
                                            <div class="input-group">
                                                <input type="number" name="nilai_persentase" class="form-control bg-light border-0" value="<?= $row['nilai_persentase'] ?>" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text bg-light border-0 font-weight-bold text-dark">%</span>
                                                </div>
                                            </div>
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
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content border-0 shadow">
            <form action="<?= base_url('admin/persentase/save') ?>" method="post">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title font-weight-bold text-primary">Tambah Persentase</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body p-4">
                    <div class="form-group mb-0">
                        <label class="text-dark font-weight-bold">Nilai (%)</label>
                        <div class="input-group">
                            <input type="number" name="nilai_persentase" class="form-control bg-light border-0" placeholder="Misal: 50" required>
                            <div class="input-group-append">
                                <span class="input-group-text bg-light border-0 font-weight-bold text-dark">%</span>
                            </div>
                        </div>
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