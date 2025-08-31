<?php
$isEdit = isset($appointment);
$actionUrl = $isEdit 
    ? "/Hospital_management/public/index.php?url=appointment/edit/" . $appointment['id'] 
    : "/Hospital_management/public/index.php?url=appointment/create";
?>
<h1><?= $isEdit ? 'Sửa lịch hẹn' : 'Tạo lịch hẹn mới' ?></h1>
<form method="POST" action="<?= $actionUrl ?>">
    <label>Bệnh nhân:</label>
    <select name="patient_id" required>
        <?php foreach ($patients as $p): ?>
            <option value="<?= $p['id'] ?>" <?= $isEdit && $appointment['patient_id']==$p['id'] ? 'selected' : '' ?>>
                <?= $p['name'] ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Bác sĩ:</label>
    <select name="doctor_id" required>
        <?php foreach ($doctors as $d): ?>
            <option value="<?= $d['id'] ?>" <?= $isEdit && $appointment['doctor_id']==$d['id'] ? 'selected' : '' ?>>
                <?= $d['name'] ?> (<?= $d['specialty'] ?>)
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Thời gian hẹn:</label>
    <input type="datetime-local" name="appointment_date" value="<?= $isEdit ? date('Y-m-d\TH:i', strtotime($appointment['appointment_date'])) : '' ?>" required><br><br>

    <label>Ghi chú:</label>
    <textarea name="note"><?= $isEdit ? $appointment['note'] : '' ?></textarea><br><br>

    <button type="submit"><?= $isEdit ? 'Cập nhật' : 'Tạo mới' ?></button>
</form>

<a href="/Hospital_management/public/index.php?url=appointment/index">Quay lại danh sách</a>
