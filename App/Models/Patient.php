<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Patient extends Model {
    public function all() {
        $stmt = $this->pdo->query("SELECT * FROM patients ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM patients WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->pdo->prepare("INSERT INTO patients (name, age, gender) VALUES (?, ?, ?)");
        return $stmt->execute([$data['name'], $data['age'], $data['gender']]);
    }

    public function update($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE patients SET name=?, age=?, gender=? WHERE id=?");
        return $stmt->execute([$data['name'], $data['age'], $data['gender'], $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM patients WHERE id=?");
        return $stmt->execute([$id]);
    }
}
