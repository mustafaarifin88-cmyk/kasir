<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header border-0 pb-0 pt-4 px-4">
                <h4 class="card-title font-weight-bold text-primary"><i class="fas fa-store-alt mr-2"></i>Informasi Barbershop</h4>
            </div>
            <form action="<?= base_url('admin/setting/update') ?>" method="post" enctype="multipart/form-data">
                <div class="card-body p-4">
                    <input type="hidden" name="id" value="<?= isset($setting) ? $setting['id'] : '' ?>">
                    
                    <div class="form-group mb-4">
                        <label class="font-weight-bold text-dark">Nama Barbershop</label>
                        <input type="text" name="nama_barbershop" class="form-control form-control-lg bg-light border-0 shadow-none" value="<?= isset($setting) ? $setting['nama_barbershop'] : '' ?>" required>
                    </div>
                    
                    <div class="form-group mb-4">
                        <label class="font-weight-bold text-dark">Nama Pimpinan / Pemilik</label>
                        <input type="text" name="nama_pimpinan" class="form-control form-control-lg bg-light border-0 shadow-none" value="<?= isset($setting) ? $setting['nama_pimpinan'] : '' ?>" required>
                    </div>
                    
                    <div class="form-group mb-4">
                        <label class="font-weight-bold text-dark">Alamat Lengkap</label>
                        <textarea name="alamat" class="form-control bg-light border-0 shadow-none" rows="4" required><?= isset($setting) ? $setting['alamat'] : '' ?></textarea>
                    </div>
                    
                    <div class="form-group mb-4">
                        <label class="font-weight-bold text-dark d-block">Logo Barbershop</label>
                        <?php if(isset($setting) && $setting['logo']): ?>
                            <div class="mb-3">
                                <img src="<?= base_url('uploads/logo/' . $setting['logo']) ?>" class="img-thumbnail shadow-sm" style="width: 120px; height: 120px; object-fit: contain; border-radius: 15px;">
                            </div>
                        <?php endif; ?>
                        <div class="custom-file mt-2">
                            <input type="file" name="logo" class="custom-file-input" id="customFile" accept="image/*">
                            <label class="custom-file-label text-muted" for="customFile">Pilih logo baru (opsional)...</label>
                        </div>
                    </div>
                </div>
                
                <div class="card-footer bg-transparent border-0 px-4 pb-4 pt-0 text-right">
                    <button type="submit" class="btn btn-primary btn-lg shadow-sm px-5"><i class="fas fa-save mr-2"></i>Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>