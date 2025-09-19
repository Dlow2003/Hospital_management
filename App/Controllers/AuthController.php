<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class AuthController extends Controller {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    // 👉 Hiển thị form đăng nhập
    public function login() {
        $this->render("auth/login");
    }

    // 👉 Xử lý đăng nhập
    public function doLogin() {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = $this->userModel->findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
             $_SESSION['user'] = [
        'id'    => $user['id'],
        'name'  => $user['name'],
        'email' => $user['email'],
        'role'  => $user['role'],  
    ];
            header("Location: /Hospital_management/public/dashboard");
            exit;
        } else {
            $this->render("auth/login", ["error" => "Sai email hoặc mật khẩu!"]);
        }
    }

    // 👉 Hiển thị form đăng ký
    public function register() {
        $this->render("auth/register");
    }

    // 👉 Xử lý đăng ký
    public function doRegister() {
    $data = [
        'name'     => $_POST['name'] ?? '',
        'email'    => $_POST['email'] ?? '',
        'password' => password_hash($_POST['password'] ?? '', PASSWORD_BCRYPT),
    ];

    if ($this->userModel->create($data)) {
        header("Location: /Hospital_management/public/auth/login");
        exit;
    } else {
        $this->render("auth/register", ["error" => "Đăng ký thất bại!"]);
    }
}


    // 👉 Đăng xuất
    public function logout() {
        session_destroy();
        header("Location: /Hospital_management/public/auth/login");
        exit;
    }
}
