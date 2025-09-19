<?php include __DIR__."/../layout/header.php"; ?>

<h2>Dashboard</h2>

<div class="cards">
  <div class="card">
    <h3>👨‍⚕️ Bác sĩ</h3>
    <p><?= $doctorCount ?? 0 ?> người</p>
  </div>
  <div class="card">
    <h3>🧑‍🤝‍🧑 Bệnh nhân</h3>
    <p><?= $patientCount ?? 0 ?> người</p>
  </div>
  <div class="card">
    <h3>📅 Lịch hẹn</h3>
    <p><?= $appointmentCount ?? 0 ?> lịch</p>
  </div>
</div>

<h3 style="margin-top:30px;">📌 Lịch hẹn sắp tới</h3>
<table>
  <thead>
    <tr>
      <th>ID</th><th>Bệnh nhân</th><th>Bác sĩ</th><th>Ngày hẹn</th><th>Ghi chú</th>
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($appointments)): ?>
      <?php foreach ($appointments as $a): ?>
      <tr>
        <td><?= $a['id'] ?></td>
        <td><?= $a['patient_name'] ?></td>
        <td><?= $a['doctor_name'] ?></td>
        <td><?= $a['appointment_date'] ?></td>
        <td><?= $a['note'] ?></td>
      </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr><td colspan="5" style="text-align:center;">Chưa có lịch hẹn</td></tr>
    <?php endif; ?>
  </tbody>
</table>

<?php include __DIR__."/../layout/footer.php"; ?>
