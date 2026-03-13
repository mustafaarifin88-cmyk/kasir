<li class="nav-item">
  <a href="<?= base_url('kasir/dashboard') ?>" class="nav-link <?= current_url() == base_url('kasir/dashboard') ? 'active' : '' ?>">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>Dashboard</p>
  </a>
</li>
<li class="nav-item">
  <a href="<?= base_url('kasir/profile') ?>" class="nav-link <?= current_url() == base_url('kasir/profile') ? 'active' : '' ?>">
    <i class="nav-icon fas fa-user"></i>
    <p>Edit Profil</p>
  </a>
</li>
<li class="nav-item">
  <a href="<?= base_url('kasir/transaksi') ?>" class="nav-link <?= current_url() == base_url('kasir/transaksi') ? 'active' : '' ?>">
    <i class="nav-icon fas fa-calculator"></i>
    <p>Aplikasi Kasir</p>
  </a>
</li>
<li class="nav-item">
  <a href="<?= base_url('kasir/pinjaman') ?>" class="nav-link <?= current_url() == base_url('kasir/pinjaman') ? 'active' : '' ?>">
    <i class="nav-icon fas fa-hand-holding-usd"></i>
    <p>Pinjaman Karyawan</p>
  </a>
</li>
<li class="nav-item">
  <a href="<?= base_url('kasir/laporan') ?>" class="nav-link <?= strpos(current_url(), base_url('kasir/laporan')) === 0 ? 'active' : '' ?>">
    <i class="nav-icon fas fa-file-alt"></i>
    <p>Laporan</p>
  </a>
</li>