<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Doctor extends Model {
    public function all() {
        $stmt = $this->pdo->query("SELECT * FROM doctors ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM doctors WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->pdo->prepare("INSERT INTO doctors (name, specialty) VALUES (?, ?)");
        return $stmt->execute([$data['name'], $data['specialty']]);
    }

    public function update($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE doctors SET name=?, specialty=? WHERE id=?");
        return $stmt->execute([$data['name'], $data['specialty'], $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM doctors WHERE id=?");
        return $stmt->execute([$id]);
    }
}
