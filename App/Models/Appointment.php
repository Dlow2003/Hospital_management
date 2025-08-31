<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Appointment extends Model {
    // Lấy tất cả lịch hẹn
    public function all() {
        $stmt = $this->pdo->query("SELECT * FROM appointments ORDER BY appointment_date DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy chi tiết lịch hẹn theo id
    public function find($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM appointments WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Lấy lịch hẹn kèm tên bệnh nhân và bác sĩ
    public function getAllWithJoin() {
        $sql = "SELECT 
                    a.id,
                    a.appointment_date,
                    a.note,
                    p.name AS patient_name,
                    d.name AS doctor_name
                FROM appointments a
                JOIN patients p ON a.patient_id = p.id
                JOIN doctors d ON a.doctor_id = d.id
                ORDER BY a.appointment_date DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Thêm lịch hẹn
    public function create($data) {
        $stmt = $this->pdo->prepare("INSERT INTO appointments (patient_id, doctor_id, appointment_date, note) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$data['patient_id'], $data['doctor_id'], $data['appointment_date'], $data['note']]);
    }

    // Cập nhật lịch hẹn
    public function update($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE appointments SET patient_id=?, doctor_id=?, appointment_date=?, note=? WHERE id=?");
        return $stmt->execute([$data['patient_id'], $data['doctor_id'], $data['appointment_date'], $data['note'], $id]);
    }

    // Xóa lịch hẹn
    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM appointments WHERE id=?");
        return $stmt->execute([$id]);
    }
}
