<?php
namespace App\Core;

use PDO;
use PDOException;

class App
{
    protected array $config;
    protected PDO $db;

    public function __construct()
    {
        $this->config = require __DIR__ . '/../../config/config.php';
        $this->initDatabase();
    }

    protected function initDatabase(): void
    {
        $db = $this->config['db'];
        $dsn = "mysql:host={$db['host']};dbname={$db['name']};charset={$db['charset']}";
        try {
            $this->db = new PDO($dsn, $db['user'], $db['pass'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch (PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        }
    }

    public function run(): void
    {
        session_start();
        $route = $_GET['route'] ?? 'dashboard/index';
        [$controller, $action] = explode('/', $route);
        $controller = ucfirst($controller) . 'Controller';
        $controllerClass = "App\\Controllers\\$controller";
        if (!class_exists($controllerClass)) {
            http_response_code(404);
            echo 'Controller not found';
            return;
        }
        $controllerObj = new $controllerClass($this);
        if (!method_exists($controllerObj, $action)) {
            http_response_code(404);
            echo 'Action not found';
            return;
        }
        call_user_func([$controllerObj, $action]);
    }

    public function db(): PDO
    {
        return $this->db;
    }

    public function config(string $key): mixed
    {
        return $this->config[$key] ?? null;
    }
}
