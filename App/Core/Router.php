<?php
namespace App\Core;

class Router {
    private $routes = [];

    public function __construct() {
        // Định nghĩa các route
        $this->routes = [
            ''                  => ['DashboardController', 'index'],
            'dashboard'         => ['DashboardController', 'index'],
            
            'patient/index'     => ['PatientController', 'index'],
            'patient/create'    => ['PatientController', 'create'],
            'patient/store'     => ['PatientController', 'store'],
            'patient/edit'      => ['PatientController', 'edit'],
            'patient/update'    => ['PatientController', 'update'],
            'patient/delete'    => ['PatientController', 'delete'],

            'doctor/index'      => ['DoctorController', 'index'],
            'doctor/create'     => ['DoctorController', 'create'],
            'doctor/store'      => ['DoctorController', 'store'],
            'doctor/edit'       => ['DoctorController', 'edit'],
            'doctor/update'     => ['DoctorController', 'update'],
            'doctor/delete'     => ['DoctorController', 'delete'],

            'appointment/index' => ['AppointmentController', 'index'],
            'appointment/create'=> ['AppointmentController', 'create'],
            'appointment/store' => ['AppointmentController', 'store'],
            'appointment/edit'  => ['AppointmentController', 'edit'],
            'appointment/update'=> ['AppointmentController', 'update'],
            'appointment/delete'=> ['AppointmentController', 'delete'],
        ];
    }

    public function run() {
        // lấy URL từ query string
        $url = $_GET['url'] ?? '';

        if (isset($this->routes[$url])) {
            $controllerName = "App\\Controllers\\" . $this->routes[$url][0];
            $method         = $this->routes[$url][1];

            if (class_exists($controllerName)) {
                $controller = new $controllerName();

                if (method_exists($controller, $method)) {
                    // Gọi action
                    call_user_func([$controller, $method]);
                } else {
                    echo "⚠️ Method <b>$method</b> không tồn tại trong $controllerName";
                }
            } else {
                echo "⚠️ Controller <b>$controllerName</b> không tồn tại";
            }
        } else {
            echo "404 - Trang không tìm thấy";
        }
    }
}
