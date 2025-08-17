<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Language;

class LanguageController extends Controller
{
    public function index(): void
    {
        $model = new Language($this->app);
        $languages = $model->all();
        $this->view('languages/index', compact('languages'));
    }

    public function create(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'code' => $_POST['code'] ?? '',
                'name' => $_POST['name'] ?? '',
                'flag' => $_POST['flag'] ?? '',
            ];
            $model = new Language($this->app);
            if ($model->create($data)) {
                header('Location: /?route=language/index');
                exit;
            }
            $error = 'Could not create language';
            $this->view('languages/form', compact('error'));
            return;
        }
        $this->view('languages/form');
    }

    public function edit(): void
    {
        $model = new Language($this->app);
        $id = (int)($_GET['id'] ?? 0);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'code' => $_POST['code'] ?? '',
                'name' => $_POST['name'] ?? '',
                'flag' => $_POST['flag'] ?? '',
            ];
            if ($model->update($id, $data)) {
                header('Location: /?route=language/index');
                exit;
            }
            $error = 'Update failed';
            $language = $model->find($id);
            $this->view('languages/form', compact('language', 'error'));
            return;
        }
        $language = $model->find($id);
        $this->view('languages/form', compact('language'));
    }

    public function delete(): void
    {
        $model = new Language($this->app);
        $id = (int)($_GET['id'] ?? 0);
        $model->delete($id);
        header('Location: /?route=language/index');
    }
}
