<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Doctor;

class AppointmentController extends Controller {
    public function index() {
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
