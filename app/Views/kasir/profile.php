<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm" style="border-radius: 15px;">
            <div class="card-header bg-white border-0 pt-4 px-4 pb-0 text-center">
                <h4 class="card-title font-weight-bold text-primary m-0 w-100"><i class="fas fa-user-circle mr-2"></i>Edit Profil Saya</h4>
            </div>
            <form action="<?= base_url('kasir/profile/update') ?>" method="post" enctype="multipart/form-data">
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <img src="<?= base_url('uploads/kasir/' . session()->get('foto')) ?>" class="img-thumbnail rounded-circle shadow-sm" style="width: 120px; height: 120px; object-fit: cover;">
                    </div>
                    
                    <div class="form-group mb-3">
                        <label class="text-dark font-weight-bold">Nama Lengkap</label>
                        <input type="text" class="form-control bg-light border-0" value="<?= $user['nama_lengkap'] ?>" readonly style="cursor: not-allowed;">
                        <small class="text-muted">Nama lengkap hanya bisa diubah oleh Administrator.</small>
                    </div>

                    <div class="form-group mb-3">
                        <label class="text-dark font-weight-bold">Username</label>
                        <input type="text" class="form-control bg-light border-0" value="<?= $user['username'] ?>" readonly style="cursor: not-allowed;">
                    </div>
                    
                    <div class="form-group mb-3">
                        <label class="text-dark font-weight-bold">Password Baru <small class="text-muted">(Opsional)</small></label>
                        <input type="password" name="password" class="form-control bg-light border-0" placeholder="Kosongkan jika tidak ingin mengganti password">
                    </div>
                    
                    <div class="form-group mb-0">
                        <label class="text-dark font-weight-bold">Ganti Foto Profil <small class="text-muted">(Opsional)</small></label>
                        <input type="file" name="foto" class="form-control bg-light border-0" accept="image/*" style="padding-bottom: 35px;">
                    </div>
                </div>
                
                <div class="card-footer bg-transparent border-0 px-4 pb-4 pt-0 text-center">
                    <button type="submit" class="btn btn-primary px-5 rounded-pill shadow-sm"><i class="fas fa-save mr-2"></i>Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>