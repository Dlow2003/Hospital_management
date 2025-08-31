<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Doctor;

class DoctorController extends Controller {
    public function index() {
        $doctorModel = new Doctor();
        $doctors = $doctorModel->all();
        $this->render('doctors/index', ['doctors' => $doctors]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $doctorModel = new Doctor();
            $doctorModel->create($_POST);
            header("Location: /Hospital_management/public/index.php?url=doctor/index");
            exit;
        }
        $this->render('doctors/form');
    }

    public function edit($id) {
        $doctorModel = new Doctor();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $doctorModel->update($id, $_POST);
            header("Location: /Hospital_management/public/index.php?url=doctor/index");
            exit;
        }
        $doctor = $doctorModel->find($id);
        $this->render('doctors/form', ['doctor' => $doctor]);
    }

    public function delete($id) {
        $doctorModel = new Doctor();
        $doctorModel->delete($id);
        header("Location: /Hospital_management/public/index.php?url=doctor/index");
        exit;
    }
}
