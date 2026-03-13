<li class="nav-item">
  <a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?= current_url() == base_url('admin/dashboard') ? 'active' : '' ?>">
    <i class="nav-icon fas fa-home"></i>
    <p>Dashboard</p>
  </a>
</li>
<li class="nav-item">
  <a href="<?= base_url('admin/setting') ?>" class="nav-link <?= current_url() == base_url('admin/setting') ? 'active' : '' ?>">
    <i class="nav-icon fas fa-store-alt"></i>
    <p>Setting Toko</p>
  </a>
</li>
<li class="nav-item mt-2">
  <h6 class="nav-header text-uppercase text-muted" style="font-size: 0.75rem; letter-spacing: 1px;">Master Data</h6>
</li>
<li class="nav-item">
  <a href="<?= base_url('admin/dataadmin') ?>" class="nav-link <?= current_url() == base_url('admin/dataadmin') ? 'active' : '' ?>">
    <i class="nav-icon fas fa-user-shield"></i>
    <p>Data Admin</p>
  </a>
</li>
<li class="nav-item">
  <a href="<?= base_url('admin/datakasir') ?>" class="nav-link <?= current_url() == base_url('admin/datakasir') ? 'active' : '' ?>">
    <i class="nav-icon fas fa-laptop-code"></i>
    <p>Data Kasir</p>
  </a>
</li>
<li class="nav-item">
  <a href="<?= base_url('admin/cabang') ?>" class="nav-link <?= current_url() == base_url('admin/cabang') ? 'active' : '' ?>">
    <i class="nav-icon fas fa-map-marker-alt"></i>
    <p>Cabang Toko</p>
  </a>
</li>
<li class="nav-item">
  <a href="<?= base_url('admin/karyawan') ?>" class="nav-link <?= current_url() == base_url('admin/karyawan') ? 'active' : '' ?>">
    <i class="nav-icon fas fa-users"></i>
    <p>Karyawan</p>
  </a>
</li>
<li class="nav-item mt-2">
  <h6 class="nav-header text-uppercase text-muted" style="font-size: 0.75rem; letter-spacing: 1px;">Konfigurasi Harga</h6>
</li>
<li class="nav-item">
  <a href="<?= base_url('admin/varian') ?>" class="nav-link <?= current_url() == base_url('admin/varian') ? 'active' : '' ?>">
    <i class="nav-icon fas fa-tag"></i>
    <p>Varian Harga</p>
  </a>
</li>
<li class="nav-item">
  <a href="<?= base_url('admin/biayatambahan') ?>" class="nav-link <?= current_url() == base_url('admin/biayatambahan') ? 'active' : '' ?>">
    <i class="nav-icon fas fa-plus-square"></i>
    <p>Biaya Tambahan</p>
  </a>
</li>
<li class="nav-item">
  <a href="<?= base_url('admin/persentase') ?>" class="nav-link <?= current_url() == base_url('admin/persentase') ? 'active' : '' ?>">
    <i class="nav-icon fas fa-chart-pie"></i>
    <p>Persentase</p>
  </a>
</li>
<li class="nav-item mt-2">
  <h6 class="nav-header text-uppercase text-muted" style="font-size: 0.75rem; letter-spacing: 1px;">Laporan & Rekap</h6>
</li>
<li class="nav-item">
  <a href="<?= base_url('admin/laporan') ?>" class="nav-link <?= strpos(current_url(), base_url('admin/laporan')) === 0 ? 'active' : '' ?>">
    <i class="nav-icon fas fa-file-invoice-dollar"></i>
    <p>Laporan Gajian</p>
  </a>
</li>