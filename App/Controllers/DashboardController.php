<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Appointment;

class DashboardController extends Controller {
    public function index() {
        $patientModel = new Patient();
        $doctorModel = new Doctor();
        $appointmentModel = new Appointment();

      $data = [
    "patientCount" => count($patientModel->all()),
    "doctorCount" => count($doctorModel->all()),
    "appointmentCount" => count($appointmentModel->all()),
    "appointments" => array_slice($appointmentModel->getAllWithJoin(), 0, 5)
];


        $this->render("dashboard/index", $data);
    }
}
