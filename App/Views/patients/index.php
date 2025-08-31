<?php include __DIR__."/../layout/header.php"; ?>

<h2>Danh sách bệnh nhân</h2>
<a class="btn btn-success" href="/Hospital_management/public/index.php?url=patient/create">+ Thêm bệnh nhân</a>

<table>
  <thead>
    <tr>
      <th>ID</th><th>Tên</th><th>Tuổi</th><th>Giới tính</th><th>Hành động</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($patients as $p): ?>
    <tr>
      <td><?= $p['id'] ?></td>
      <td><?= $p['name'] ?></td>
      <td><?= $p['age'] ?></td>
      <td><?= $p['gender'] ?></td>
      <td>
        <a class="btn btn-warning" href="/Hospital_management/public/index.php?url=patient/edit/<?= $p['id'] ?>">Sửa</a>
        <a class="btn btn-danger" onclick="return confirm('Xóa bệnh nhân này?')" href="/Hospital_management/public/index.php?url=patient/delete/<?= $p['id'] ?>">Xóa</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include __DIR__."/../layout/footer.php"; ?>
