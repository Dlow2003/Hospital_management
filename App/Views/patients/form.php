<?php
$isEdit = isset($patient);
$actionUrl = $isEdit 
    ? "/Hospital_management/public/index.php?url=patient/edit/" . $patient['id'] 
    : "/Hospital_management/public/index.php?url=patient/create";
?>
<h1><?= $isEdit ? 'Sửa bệnh nhân' : 'Thêm bệnh nhân' ?></h1>
<form method="POST" action="<?= $actionUrl ?>">
    <label>Tên:</label>
    <input type="text" name="name" value="<?= $isEdit ? $patient['name'] : '' ?>" required><br><br>

    <label>Tuổi:</label>
    <input type="number" name="age" value="<?= $isEdit ? $patient['age'] : '' ?>" required><br><br>

    <label>Giới tính:</label>
    <select name="gender" required>
        <option value="Nam" <?= $isEdit && $patient['gender']=='Nam' ? 'selected' : '' ?>>Nam</option>
        <option value="Nữ" <?= $isEdit && $patient['gender']=='Nữ' ? 'selected' : '' ?>>Nữ</option>
    </select><br><br>

    <button type="submit"><?= $isEdit ? 'Cập nhật' : 'Thêm mới' ?></button>
</form>

<a href="/Hospital_management/public/index.php?url=patient/index">Quay lại danh sách</a>
