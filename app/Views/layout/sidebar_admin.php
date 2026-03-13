<li class="nav-item">
  <a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?= current_url() == base_url('admin/dashboard') ? 'active' : '' ?>">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>Dashboard</p>
  </a>
</li>
<li class="nav-item">
  <a href="<?= base_url('admin/setting') ?>" class="nav-link <?= current_url() == base_url('admin/setting') ? 'active' : '' ?>">
    <i class="nav-icon fas fa-cogs"></i>
    <p>Setting Toko</p>
  </a>
</li>
<li class="nav-item">
  <a href="<?= base_url('admin/dataadmin') ?>" class="nav-link <?= current_url() == base_url('admin/dataadmin') ? 'active' : '' ?>">
    <i class="nav-icon fas fa-user-shield"></i>
    <p>Data Admin</p>
  </a>
</li>
<li class="nav-item">
  <a href="<?= base_url('admin/cabang') ?>" class="nav-link <?= current_url() == base_url('admin/cabang') ? 'active' : '' ?>">
    <i class="nav-icon fas fa-store"></i>
    <p>Cabang Toko</p>
  </a>
</li>
<li class="nav-item">
  <a href="<?= base_url('admin/karyawan') ?>" class="nav-link <?= current_url() == base_url('admin/karyawan') ? 'active' : '' ?>">
    <i class="nav-icon fas fa-users"></i>
    <p>Karyawan</p>
  </a>
</li>
<li class="nav-item">
  <a href="<?= base_url('admin/varian') ?>" class="nav-link <?= current_url() == base_url('admin/varian') ? 'active' : '' ?>">
    <i class="nav-icon fas fa-cut"></i>
    <p>Varian Harga</p>
  </a>
</li>
<li class="nav-item">
  <a href="<?= base_url('admin/biayatambahan') ?>" class="nav-link <?= current_url() == base_url('admin/biayatambahan') ? 'active' : '' ?>">
    <i class="nav-icon fas fa-plus-circle"></i>
    <p>Biaya Tambahan</p>
  </a>
</li>
<li class="nav-item">
  <a href="<?= base_url('admin/persentase') ?>" class="nav-link <?= current_url() == base_url('admin/persentase') ? 'active' : '' ?>">
    <i class="nav-icon fas fa-percentage"></i>
    <p>Persentase</p>
  </a>
</li>
<li class="nav-item">
  <a href="<?= base_url('admin/datakasir') ?>" class="nav-link <?= current_url() == base_url('admin/datakasir') ? 'active' : '' ?>">
    <i class="nav-icon fas fa-cash-register"></i>
    <p>Data Kasir</p>
  </a>
</li>
<li class="nav-item">
  <a href="<?= base_url('admin/laporan') ?>" class="nav-link <?= strpos(current_url(), base_url('admin/laporan')) === 0 ? 'active' : '' ?>">
    <i class="nav-icon fas fa-file-alt"></i>
    <p>Laporan</p>
  </a>
</li>