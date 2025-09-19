<?php
namespace App\Core;

class Router {
    private $routes = [];

   public function __construct() {
    // Định nghĩa các route
    $this->routes = [
        ''                  => ['DashboardController', 'index'],
        'dashboard'         => ['DashboardController', 'index'],
        'appointment/create' => ['AppointmentController', 'create'],
'appointment/store'  => ['AppointmentController', 'store'],
  '' => ['HomeController', 'index'],
    'home/index' => ['HomeController', 'index'],

         // ✅ Auth routes
    'auth/login'        => ['AuthController', 'login'],
    'auth/doLogin'      => ['AuthController', 'doLogin'],
    'auth/register'     => ['AuthController', 'register'],
    'auth/doRegister'   => ['AuthController', 'doRegister'],
    'auth/logout'       => ['AuthController', 'logout'],

        // Patient
        'patient/index'     => ['PatientController', 'index'],
        'patient/create'    => ['PatientController', 'create'],
        'patient/store'     => ['PatientController', 'store'],
        'patient/edit'      => ['PatientController', 'edit'],
        'patient/update'    => ['PatientController', 'update'],
        'patient/delete'    => ['PatientController', 'delete'],

        // Doctor
        'doctor/index'      => ['DoctorController', 'index'],
        'doctor/create'     => ['DoctorController', 'create'],
        'doctor/store'      => ['DoctorController', 'store'],
        'doctor/edit'       => ['DoctorController', 'edit'],
        'doctor/update'     => ['DoctorController', 'update'],
        'doctor/delete'     => ['DoctorController', 'delete'],

        // Appointment
        'appointment/index' => ['AppointmentController', 'index'],
        'appointment/create'=> ['AppointmentController', 'create'],
        'appointment/store' => ['AppointmentController', 'store'],
        'appointment/edit'  => ['AppointmentController', 'edit'],
        'appointment/update'=> ['AppointmentController', 'update'],
        'appointment/delete'=> ['AppointmentController', 'delete'],
    ];
}


  public function run() {
    // Lấy URI gốc
    $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    // Xóa base path (/Hospital_management/public)
    $scriptName = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
    $url = str_replace($scriptName, '', $requestUri);

    // Bỏ luôn "index.php" nếu có
    $url = str_replace('index.php', '', $url);

    // Chuẩn hóa
    $url = trim($url, '/');

    if (isset($this->routes[$url])) {
        $controllerName = "App\\Controllers\\" . $this->routes[$url][0];
        $method         = $this->routes[$url][1];

        if (class_exists($controllerName)) {
            $controller = new $controllerName();

            if (method_exists($controller, $method)) {
                call_user_func([$controller, $method]);
                return;
            } else {
                echo "⚠️ Method <b>$method</b> không tồn tại trong $controllerName";
                return;
            }
        } else {
            echo "⚠️ Controller <b>$controllerName</b> không tồn tại";
            return;
        }
    }

    echo "404 - Trang không tìm thấy (URL: $url)";
}

}
