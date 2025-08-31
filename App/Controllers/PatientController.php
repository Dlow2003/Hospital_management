<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Patient;

class PatientController extends Controller {
    public function index() {
        $patientModel = new Patient();
        $patients = $patientModel->all();
        $this->render('patients/index', ['patients' => $patients]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $patientModel = new Patient();
            $patientModel->create($_POST);
            header("Location: /Hospital_management/public/index.php?url=patient/index");
            exit;
        }
        $this->render('patients/form');
    }

    public function edit($id) {
        $patientModel = new Patient();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $patientModel->update($id, $_POST);
            header("Location: /Hospital_management/public/index.php?url=patient/index");
            exit;
        }

        $patient = $patientModel->find($id);
        $this->render('patients/form', ['patient' => $patient]);
    }

    public function delete($id) {
        $patientModel = new Patient();
        $patientModel->delete($id);
        header("Location: /Hospital_management/public/index.php?url=patient/index");
        exit;
    }
}
