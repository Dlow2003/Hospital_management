<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Hospital Management</title>
  <style>
    .cards {
  display: flex;
  gap: 20px;
  margin: 20px 0;
}
.card {
  flex: 1;
  background: #fff;
  padding: 20px;
  border-radius: 6px;
  text-align: center;
  box-shadow: 0 2px 5px rgba(0,0,0,.1);
}
.card h3 {
  margin-bottom: 10px;
  font-size: 18px;
  color: #2c3e50;
}
.card p {
  font-size: 22px;
  font-weight: bold;
  color: #27ae60;
}

    body {
      margin: 0; font-family: Arial, sans-serif; background: #f4f6f9;
    }
    header {
      background: #2c3e50; color: #fff; padding: 15px;
      display: flex; justify-content: space-between; align-items: center;
    }
    header h1 { margin: 0; font-size: 20px; }
    nav a {
      color: #fff; margin-left: 15px; text-decoration: none;
    }
    nav a:hover { text-decoration: underline; }
    .container { padding: 20px; }
    table {
      width: 100%; border-collapse: collapse; background: #fff;
      box-shadow: 0 2px 4px rgba(0,0,0,.1);
    }
    table th, table td {
      border: 1px solid #ddd; padding: 10px; text-align: left;
    }
    table th { background: #f0f0f0; }
    .btn {
      display: inline-block; padding: 6px 12px; margin: 2px;
      border-radius: 4px; font-size: 14px; text-decoration: none; cursor: pointer;
    }
    .btn-success { background: #27ae60; color: #fff; }
    .btn-warning { background: #f39c12; color: #fff; }
    .btn-danger { background: #e74c3c; color: #fff; }
  </style>
</head>
<body>
<header>
  <h1>🏥 Hospital Management</h1>
  <nav>
    <a href="/Hospital_management/public/index.php?url=patient/index">Bệnh nhân</a>
    <a href="/Hospital_management/public/index.php?url=doctor/index">Bác sĩ</a>
    <a href="/Hospital_management/public/index.php?url=appointment/index">Lịch hẹn</a>
  </nav>
</header>
<div class="container">
