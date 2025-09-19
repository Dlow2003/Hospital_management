<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Đăng nhập - Bệnh viện ABC</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card shadow">
        <div class="card-header text-center bg-primary text-white">
          <h4>Đăng nhập</h4>
        </div>
        <div class="card-body">
          <form method="POST" action="<?= BASE_URL ?>/auth/doLogin">
            <div class="mb-3">
              <label>Email</label>
              <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
              <label>Mật khẩu</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <button class="btn btn-primary w-100">Đăng nhập</button>
          </form>
          <p class="mt-3 text-center">
            Chưa có tài khoản? <a href="../auth/register">Đăng ký</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
