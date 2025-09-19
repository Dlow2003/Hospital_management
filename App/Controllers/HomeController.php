<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Doctor;

class HomeController extends Controller {
    public function index() {
        $doctorModel = new Doctor();
        $doctors = $doctorModel->all(); // lấy danh sách bác sĩ từ DB

        $this->render('home/index', [
            'doctors' => $doctors
        ]);
    }
}
