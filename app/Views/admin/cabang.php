<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center border-0 pt-4 px-4 pb-0">
        <h4 class="card-title font-weight-bold text-primary m-0"><i class="fas fa-store mr-2"></i>Data Cabang Toko</h4>
        <button type="button" class="btn btn-primary shadow-sm" data-toggle="modal" data-target="#modalTambah">
            <i class="fas fa-plus mr-1"></i> Tambah Cabang
        </button>
    </div>
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover table-borderless align-middle">
                <thead class="text-muted" style="border-bottom: 2px solid #f0f2f5;">
                    <tr>
                        <th width="5%" class="pl-3">No</th>
                        <th width="30%">Nama Cabang Toko</th>
                        <th>Alamat Lengkap</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($cabang as $row): ?>
                    <tr style="border-bottom: 1px solid #f0f2f5;">
                        <td class="pl-3 align-middle"><?= $no++ ?></td>
                        <td class="align-middle font-weight-bold text-dark">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary text-white rounded p-2 mr-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <?= $row['nama_cabang'] ?>
                            </div>
                        </td>
                        <td class="align-middle text-muted"><?= $row['alamat'] ?></td>
                        <td class="align-middle text-center">
                            <button class="btn btn-warning btn-sm shadow-sm mr-1 rounded-circle" data-toggle="modal" data-target="#modalEdit<?= $row['id'] ?>" style="width: 35px; height: 35px;"><i class="fas fa-pen text-white"></i></button>
                            <a href="<?= base_url('admin/cabang/delete/' . $row['id']) ?>" class="btn btn-danger btn-sm shadow-sm rounded-circle" onclick="return confirm('Yakin hapus data ini?')" style="width: 35px; height: 35px; display: inline-flex; align-items: center; justify-content: center;"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>

                    <div class="modal fade" id="modalEdit<?= $row['id'] ?>" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0 shadow">
                                <form action="<?= base_url('admin/cabang/update/' . $row['id']) ?>" method="post">
                                    <div class="modal-header border-0 pb-0">
                                        <h5 class="modal-title font-weight-bold text-primary">Edit Cabang Toko</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body p-4">
                                        <div class="form-group mb-3">
                                            <label class="text-dark font-weight-bold">Nama Cabang</label>
                                            <input type="text" name="nama_cabang" class="form-control bg-light border-0" value="<?= $row['nama_cabang'] ?>" required>
                                        </div>
                                        <div class="form-group mb-0">
                                            <label class="text-dark font-weight-bold">Alamat Lengkap</label>
                                            <textarea name="alamat" class="form-control bg-light border-0" rows="3" required><?= $row['alamat'] ?></textarea>
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
            <form action="<?= base_url('admin/cabang/save') ?>" method="post">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title font-weight-bold text-primary">Tambah Cabang Baru</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body p-4">
                    <div class="form-group mb-3">
                        <label class="text-dark font-weight-bold">Nama Cabang</label>
                        <input type="text" name="nama_cabang" class="form-control bg-light border-0" placeholder="Contoh: Cabang Sudirman" required>
                    </div>
                    <div class="form-group mb-0">
                        <label class="text-dark font-weight-bold">Alamat Lengkap</label>
                        <textarea name="alamat" class="form-control bg-light border-0" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
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