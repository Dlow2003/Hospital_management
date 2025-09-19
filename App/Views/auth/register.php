<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Đăng ký - Bệnh viện ABC</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card shadow">
        <div class="card-header text-center bg-success text-white">
          <h4>Đăng ký</h4>
        </div>
        <div class="card-body">
          <form method="POST" action="<?= BASE_URL ?>/auth/doRegister">
            <div class="mb-3">
              <label>Tên</label>
              <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
              <label>Email</label>
              <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
              <label>Mật khẩu</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <button class="btn btn-success w-100">Đăng ký</button>
          </form>
          <p class="mt-3 text-center">
            Đã có tài khoản? <a href="../auth/login">Đăng nhập</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
