<li class="nav-item">
  <a href="<?= base_url('kasir/dashboard') ?>" class="nav-link <?= current_url() == base_url('kasir/dashboard') ? 'active' : '' ?>">
    <i class="nav-icon fas fa-home"></i>
    <p>Dashboard</p>
  </a>
</li>
<li class="nav-item">
  <a href="<?= base_url('kasir/profile') ?>" class="nav-link <?= current_url() == base_url('kasir/profile') ? 'active' : '' ?>">
    <i class="nav-icon fas fa-user-circle"></i>
    <p>Edit Profil</p>
  </a>
</li>
<li class="nav-item mt-2">
  <h6 class="nav-header text-uppercase text-muted" style="font-size: 0.75rem; letter-spacing: 1px;">Menu Utama</h6>
</li>
<li class="nav-item">
  <a href="<?= base_url('kasir/transaksi') ?>" class="nav-link <?= current_url() == base_url('kasir/transaksi') ? 'active' : '' ?>">
    <i class="nav-icon fas fa-calculator"></i>
    <p>Aplikasi Kasir</p>
  </a>
</li>
<li class="nav-item">
  <a href="<?= base_url('kasir/pinjaman') ?>" class="nav-link <?= current_url() == base_url('kasir/pinjaman') ? 'active' : '' ?>">
    <i class="nav-icon fas fa-wallet"></i>
    <p>Pinjaman Karyawan</p>
  </a>
</li>
<li class="nav-item mt-2">
  <h6 class="nav-header text-uppercase text-muted" style="font-size: 0.75rem; letter-spacing: 1px;">Laporan</h6>
</li>
<li class="nav-item">
  <a href="<?= base_url('kasir/laporan') ?>" class="nav-link <?= strpos(current_url(), base_url('kasir/laporan')) === 0 ? 'active' : '' ?>">
    <i class="nav-icon fas fa-file-invoice-dollar"></i>
    <p>Laporan Gajian</p>
  </a>
</li>