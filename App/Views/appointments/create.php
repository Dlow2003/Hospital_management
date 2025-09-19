<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Đặt lịch khám</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .card {
      border-radius: 20px;
      background: #fff;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    .card h2 {
      font-weight: 700;
      color: #2C3E50;
    }
    .form-label {
      font-weight: 600;
      color: #34495E;
    }
    .btn-primary {
      background: #3498db;
      border: none;
      border-radius: 10px;
      transition: all 0.3s ease;
      font-weight: 600;
      padding: 10px 20px;
    }
    .btn-primary:hover {
      background: #2980b9;
      transform: scale(1.05);
    }
    .btn-secondary {
      border-radius: 10px;
      font-weight: 600;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="card p-4 col-md-6 mx-auto">
      <h2 class="mb-4 text-center">📅 Đặt lịch khám</h2>
      <form method="POST" action="/Hospital_management/public/index.php?url=appointment/store">
        
        <!-- Chọn bệnh nhân -->
        <div class="mb-3">
          <label class="form-label">👤 Bệnh nhân</label>
          <select name="patient_id" class="form-select" required>
            <option value="">-- Chọn bệnh nhân --</option>
            <?php foreach ($patients as $p): ?>
              <option value="<?= $p['id'] ?>"><?= htmlspecialchars($p['name']) ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Chọn bác sĩ -->
        <div class="mb-3">
          <label class="form-label">🩺 Bác sĩ</label>
          <select name="doctor_id" class="form-select" required>
            <option value="">-- Chọn bác sĩ --</option>
            <?php foreach ($doctors as $d): ?>
              <option value="<?= $d['id'] ?>"><?= htmlspecialchars($d['name']) ?> (<?= $d['specialty'] ?>)</option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Ngày giờ khám -->
        <div class="mb-3">
          <label class="form-label">⏰ Thời gian khám</label>
          <input type="datetime-local" name="appointment_date" class="form-control" required>
        </div>

        <!-- Ghi chú -->
        <div class="mb-3">
          <label class="form-label">📝 Ghi chú</label>
          <textarea name="note" class="form-control" rows="3" placeholder="Nhập thêm yêu cầu nếu có..."></textarea>
        </div>

        <div class="d-flex justify-content-between">
          <button type="submit" class="btn btn-primary">✅ Xác nhận</button>
          <a href="/Hospital_management/public/index.php" class="btn btn-secondary">⬅️ Quay lại</a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
