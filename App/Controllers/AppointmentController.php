<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Doctor;

class AppointmentController extends Controller {
    public function index() {
         // 🔒 Kiểm tra quyền truy cập
       if (!isset($_SESSION['user']) || !in_array($_SESSION['user']['role'], ['admin', 'doctor'])) {
        $this->render("auth/no_permission", [
            "message" => "⛔ Bạn không có quyền xem danh sách lịch hẹn!"
        ]);
        return;
    }

        $appointmentModel = new Appointment();
        $appointments = $appointmentModel->getAllWithJoin();
        $this->render('appointments/index', ['appointments' => $appointments]);
    }

    public function create() {
        $patientModel = new Patient();
        $doctorModel = new Doctor();
        $patients = $patientModel->all();
        $doctors = $doctorModel->all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $appointmentModel = new Appointment();
            $appointmentModel->create($_POST);
            header("Location: /Hospital_management/public/index.php?url=appointment/index");
            exit;
        }

        $this->render('appointments/form', [
            'patients' => $patients,
            'doctors' => $doctors
        ]);
    }
    public function store() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $appointmentModel = new Appointment();
        $appointmentModel->create([
            'patient_id'       => $_POST['patient_id'],
            'doctor_id'        => $_POST['doctor_id'],
            'appointment_date' => $_POST['appointment_date'],
            'note'             => $_POST['note']
        ]);
        header("Location: /Hospital_management/public/index.php?url=appointment/index");
        exit;
    }
}

    public function edit($id) {
        $appointmentModel = new Appointment();
        $patientModel = new Patient();
        $doctorModel = new Doctor();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $appointmentModel->update($id, $_POST);
            header("Location: /Hospital_management/public/index.php?url=appointment/index");
            exit;
        }

        $appointment = $appointmentModel->find($id);
        $patients = $patientModel->all();
        $doctors = $doctorModel->all();

        $this->render('appointments/form', [
            'appointment' => $appointment,
            'patients' => $patients,
            'doctors' => $doctors
        ]);
    }

    public function delete($id) {
        $appointmentModel = new Appointment();
        $appointmentModel->delete($id);
        header("Location: /Hospital_management/public/index.php?url=appointment/index");
        exit;
    }
}
