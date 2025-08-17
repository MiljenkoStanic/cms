<?php
namespace App\Controllers;

use App\Core\Controller;

class DashboardController extends Controller
{
    public function index(): void
    {
        if (empty($_SESSION['user_id'])) {
            header('Location: /?route=auth/login');
            return;
        }
        $this->view('dashboard/index');
    }
}
