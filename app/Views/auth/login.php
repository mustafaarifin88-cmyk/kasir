<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | Kasir Barbar</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=fallback">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>">
  <style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #4e73df 0%, #1cc88a 100%);
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0;
    }
    .login-box {
        width: 400px;
        margin: 0;
    }
    .card {
        background: rgba(255, 255, 255, 0.95);
        border: none;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        backdrop-filter: blur(10px);
        overflow: hidden;
    }
    .login-logo {
        margin-bottom: 30px;
    }
    .login-logo a {
        color: #fff;
        font-weight: 700;
        font-size: 2.5rem;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        letter-spacing: 2px;
    }
    .login-card-body {
        padding: 40px;
        background: transparent;
    }
    .login-box-msg {
        padding: 0;
        margin-bottom: 25px;
        font-size: 1.1rem;
        color: #555;
        font-weight: 500;
    }
    .form-control {
        border-radius: 10px;
        padding: 12px 15px;
        height: auto;
        border: 1px solid #ddd;
        font-size: 0.95rem;
    }
    .form-control:focus {
        border-color: #4e73df;
        box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.15);
    }
    .input-group-text {
        border-radius: 0 10px 10px 0;
        background-color: transparent;
        border: 1px solid #ddd;
        border-left: none;
        color: #4e73df;
    }
    .btn-primary {
        background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
        border: none;
        border-radius: 10px;
        padding: 12px;
        font-weight: 600;
        font-size: 1rem;
        letter-spacing: 1px;
        box-shadow: 0 4px 10px rgba(78, 115, 223, 0.3);
        transition: all 0.3s ease;
    }
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(78, 115, 223, 0.4);
    }
    .input-group {
        margin-bottom: 20px !important;
    }
    .alert {
        border-radius: 10px;
        border: none;
        font-size: 0.9rem;
    }
  </style>
</head>
<body>
<div class="login-box">
  <div class="login-logo text-center">
    <a href="#"><b>KASIR</b>BARBAR</a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg text-center">Masuk ke akun Anda</p>

      <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger text-center shadow-sm">
          <i class="fas fa-exclamation-circle mr-1"></i> <?= session()->getFlashdata('error') ?>
        </div>
      <?php endif; ?>

      <form action="<?= base_url('auth/login') ?>" method="post">
        <div class="input-group">
          <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">LOGIN</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/dist/js/adminlte.min.js') ?>"></script>
</body>
</html>