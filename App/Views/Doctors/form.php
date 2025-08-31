<?php
$isEdit = isset($doctor);
$actionUrl = $isEdit 
    ? "/Hospital_management/public/index.php?url=doctor/edit/" . $doctor['id'] 
    : "/Hospital_management/public/index.php?url=doctor/create";
?>
<h1><?= $isEdit ? 'Sửa bác sĩ' : 'Thêm bác sĩ' ?></h1>
<form method="POST" action="<?= $actionUrl ?>">
    <label>Tên:</label>
    <input type="text" name="name" value="<?= $isEdit ? $doctor['name'] : '' ?>" required><br><br>

    <label>Chuyên khoa:</label>
    <input type="text" name="specialty" value="<?= $isEdit ? $doctor['specialty'] : '' ?>"><br><br>

    <label>Số điện thoại:</label>
    <input type="text" name="phone" value="<?= $isEdit ? $doctor['phone'] : '' ?>"><br><br>

    <button type="submit"><?= $isEdit ? 'Cập nhật' : 'Thêm mới' ?></button>
</form>

<a href="/Hospital_management/public/index.php?url=doctor/index">Quay lại danh sách</a>
