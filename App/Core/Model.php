<?php
namespace App\Core;

use App\Core\Database;
use PDO;

class Model {
    protected $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance();
    }
}
