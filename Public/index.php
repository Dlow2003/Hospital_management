<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bệnh viện ABC</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { font-family: Arial, sans-serif; }
    .banner {
      background: url('https://picsum.photos/1600/600?hospital') no-repeat center center;
      background-size: cover;
      color: white;
      text-align: center;
      padding: 120px 20px;
    }
    .banner h1 { font-size: 3rem; font-weight: bold; }
    .service-card { transition: transform 0.3s; }
    .service-card:hover { transform: translateY(-10px); }
    footer { background: #222; color: #bbb; padding: 20px 0; }
  </style>
</head>
<body>

<!-- HEADER -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="#">🏥 Bệnh viện ABC</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link active" href="#">Trang chủ</a></li>
        <li class="nav-item"><a class="nav-link" href="/patients">Bệnh nhân</a></li>
        <li class="nav-item"><a class="nav-link" href="/doctors">Bác sĩ</a></li>
        <li class="nav-item"><a class="nav-link" href="/appointments">Lịch hẹn</a></li>
        <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- BANNER -->
<section class="banner">
  <h1>Chăm sóc sức khỏe – Nâng niu sự sống</h1>
  <p>Dịch vụ y tế hàng đầu, tận tâm vì sức khỏe của bạn</p>
  <a href="/appointments/create" class="btn btn-lg btn-light mt-3">Đặt lịch ngay</a>
</section>

<!-- GIỚI THIỆU -->
<section class="py-5 text-center">
  <div class="container">
    <h2>Về chúng tôi</h2>
    <p class="lead">Bệnh viện ABC tự hào là nơi quy tụ đội ngũ bác sĩ giỏi, cơ sở vật chất hiện đại và dịch vụ chăm sóc tận tâm.</p>
    <div class="row mt-4">
      <div class="col-md-4"><h5>👨‍⚕️ Bác sĩ giỏi</h5><p>Đội ngũ chuyên gia nhiều kinh nghiệm.</p></div>
      <div class="col-md-4"><h5>🏥 Cơ sở vật chất</h5><p>Trang thiết bị hiện đại, đạt chuẩn quốc tế.</p></div>
      <div class="col-md-4"><h5>📞 Hỗ trợ 24/7</h5><p>Luôn sẵn sàng phục vụ bệnh nhân.</p></div>
    </div>
  </div>
</section>

<!-- DỊCH VỤ -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center">Dịch vụ nổi bật</h2>
    <div class="row mt-4">
      <div class="col-md-3">
        <div class="card service-card p-3">
          <h5>Khám tổng quát</h5>
          <p>Kiểm tra sức khỏe định kỳ toàn diện.</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card service-card p-3">
          <h5>Nhi khoa</h5>
          <p>Chăm sóc sức khỏe cho trẻ em.</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card service-card p-3">
          <h5>Tim mạch</h5>
          <p>Khám & điều trị các bệnh về tim.</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card service-card p-3">
          <h5>Ngoại khoa</h5>
          <p>Phẫu thuật & điều trị chuyên sâu.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- LIÊN HỆ -->
<section class="py-5 text-center">
  <div class="container">
    <h2>Liên hệ</h2>
    <p>📍 123 Đường Sức Khỏe, Quận 1, TP.HCM</p>
    <p>📞 0123 456 789</p>
    <form class="row g-3 justify-content-center">
      <div class="col-md-4">
        <input type="text" class="form-control" placeholder="Tên của bạn">
      </div>
      <div class="col-md-4">
        <input type="email" class="form-control" placeholder="Email">
      </div>
      <div class="col-md-8 mt-3">
        <textarea class="form-control" rows="3" placeholder="Nội dung liên hệ..."></textarea>
      </div>
      <div class="col-md-8 mt-3">
        <button class="btn btn-primary">Gửi</button>
      </div>
    </form>
  </div>
</section>

<!-- FOOTER -->
<footer class="text-center">
  <p>© 2025 Bệnh viện ABC | Kết nối với chúng tôi: 🌐 Facebook | 📷 Instagram | 🐦 Twitter</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Bật session
session_start();

// Autoload class (tự viết)
spl_autoload_register(function ($class) {
    // Namespace "App\Core\Controller" => đường dẫn "app/Core/Controller.php"
    $prefix = "App\\";
    $base_dir = __DIR__ . '/../app/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

// Gọi router
require_once __DIR__ . '/../app/Core/Router.php';

// Chạy router
$router = new \App\Core\Router();
$router->run();
