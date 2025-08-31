<h1>Danh sách bác sĩ</h1>
<a href="/Hospital_management/public/index.php?url=doctor/create">+ Thêm bác sĩ</a>
<ul>
    <?php foreach ($doctors as $d): ?>
        <li>
            <?= $d['id'] ?> - <?= $d['name'] ?> (<?= $d['specialty'] ?>) - <?= $d['phone'] ?>
            | <a href="/Hospital_management/public/index.php?url=doctor/edit/<?= $d['id'] ?>">Sửa</a>
            | <a href="/Hospital_management/public/index.php?url=doctor/delete/<?= $d['id'] ?>" onclick="return confirm('Xóa bác sĩ này?')">Xóa</a>
        </li>
    <?php endforeach; ?>
</ul>
<a href="/Hospital_management/public/index.php?url=patient/index">Quản lý bệnh nhân</a>
