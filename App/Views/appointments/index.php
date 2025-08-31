<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý lịch hẹn</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
        }
        header {
            background: #2c3e50;
            color: white;
            padding: 15px;
            text-align: center;
        }
        .container {
            width: 90%;
            margin: 20px auto;
        }
        h1 {
            margin-bottom: 20px;
            color: #2c3e50;
        }
        .btn {
            display: inline-block;
            padding: 8px 15px;
            background: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background: #2980b9;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background: #3498db;
            color: white;
        }
        tr:hover {
            background: #f1f1f1;
        }
        .actions a {
            margin-right: 10px;
            color: #3498db;
            text-decoration: none;
        }
        .actions a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <h2>Hệ thống quản lý bệnh viện</h2>
    </header>
    <div class="container">
        <h1>Danh sách lịch hẹn</h1>
        <a class="btn" href="?controller=appointment&action=create">+ Tạo lịch hẹn</a>
        <br><br>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Bệnh nhân</th>
                    <th>Bác sĩ</th>
                    <th>Thời gian</th>
                    <th>Ghi chú</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($appointments as $app): ?>
                    <tr>
                        <td><?= $app['id'] ?></td>
                        <td><?= $app['patient_name'] ?></td>
                        <td><?= $app['doctor_name'] ?></td>
                        <td><?= $app['appointment_date'] ?></td>
                        <td><?= $app['note'] ?></td>
                        <td class="actions">
                            <a href="?controller=appointment&action=edit&id=<?= $app['id'] ?>">✏️ Sửa</a>
                            <a href="?controller=appointment&action=delete&id=<?= $app['id'] ?>" onclick="return confirm('Xóa lịch hẹn này?')">🗑️ Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
