<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?? 'Kasir Barbar' ?></title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=fallback">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>">
  <style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f4f7f6;
    }
    .content-wrapper {
        background-color: #f4f7f6;
    }
    .main-header {
        border-bottom: none;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        transition: transform 0.2s;
    }
    .card:hover {
        transform: translateY(-2px);
    }
    .card-header {
        background-color: transparent;
        border-bottom: 1px solid rgba(0,0,0,0.05);
        padding: 20px;
    }
    .btn {
        border-radius: 8px;
        font-weight: 500;
        padding: 8px 20px;
    }
    .btn-primary {
        background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
        border: none;
    }
    .form-control {
        border-radius: 8px;
        border: 1px solid #e3e6f0;
        padding: 10px 15px;
    }
    .form-control:focus {
        box-shadow: 0 0 0 0.2rem rgba(78,115,223,0.25);
        border-color: #4e73df;
    }
    .main-sidebar {
        background: #1a2035;
        box-shadow: 4px 0 10px rgba(0,0,0,0.1);
    }
    .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, 
    .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
        background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
        box-shadow: 0 4px 10px rgba(78,115,223,0.4);
        border-radius: 10px;
        color: #fff;
    }
    .nav-sidebar .nav-item {
        margin-bottom: 5px;
        margin-left: 8px;
        margin-right: 8px;
    }
    .nav-sidebar .nav-link {
        border-radius: 10px;
        padding: 10px 15px;
    }
    .brand-link {
        border-bottom: 1px solid rgba(255,255,255,0.05) !important;
        padding: 20px 10px;
    }
    .user-panel {
        border-bottom: 1px solid rgba(255,255,255,0.05) !important;
        padding-bottom: 15px !important;
        padding-top: 15px !important;
    }
    .table th {
        border-top: none;
        background-color: #f8f9fa;
        font-weight: 600;
    }
    .modal-content {
        border-radius: 15px;
        border: none;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    .small-box {
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        overflow: hidden;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link text-danger font-weight-bold" href="<?= base_url('auth/logout') ?>">
          <i class="fas fa-sign-out-alt mr-1"></i> Logout
        </a>
      </li>
    </ul>
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link text-center">
      <span class="brand-text font-weight-bold text-white tracking-wide" style="letter-spacing: 1px;">KASIR BARBAR</span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
        <div class="image">
          <img src="<?= base_url('uploads/' . session()->get('role') . '/' . session()->get('foto')) ?>" class="img-circle elevation-2" alt="User Image" style="width: 2.5rem; height: 2.5rem; object-fit: cover; border: 2px solid #fff;">
        </div>
        <div class="info ml-2">
          <a href="#" class="d-block font-weight-bold text-white"><?= session()->get('nama_lengkap') ?></a>
          <span class="badge badge-success px-2 py-1 mt-1" style="border-radius: 6px; font-size: 0.7rem; text-transform: uppercase;"><?= session()->get('role') ?></span>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?php
            if (session()->get('role') == 'admin') {
                echo view('layout/sidebar_admin');
            } else {
                echo view('layout/sidebar_kasir');
            }
          ?>
        </ul>
      </nav>
    </div>
  </aside>

  <div class="content-wrapper">
    <section class="content-header pt-4 pb-2">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 font-weight-bold text-dark"><?= $title ?? '' ?></h1>
          </div>
        </div>
      </div>
    </section>
    <section class="content pb-4">
      <div class="container-fluid">
        <?php if (session()->getFlashdata('success')) : ?>
          <div class="alert alert-success alert-dismissible" style="border-radius: 10px; border: none; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="fas fa-check-circle mr-2"></i> <?= session()->getFlashdata('success') ?>
          </div>
        <?php endif; ?>
        
        <?= $this->renderSection('content') ?>
      </div>
    </section>
  </div>
</div>

<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/dist/js/adminlte.min.js') ?>"></script>
</body>
</html>