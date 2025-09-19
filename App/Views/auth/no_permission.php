<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Thông báo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="height:100vh;">
  <div class="card shadow p-4 text-center" style="max-width: 400px;">
    <h4 class="mb-3 text-danger">⚠️ Thông báo</h4>
    <div class="alert alert-warning">
      <?= $message ?? "Bạn không có quyền truy cập trang này!" ?>
    </div>
    <a href="/Hospital_management/public/index.php" class="btn btn-primary">Về trang chủ</a>
  </div>
</body>
</html>
