<?php
namespace App\Core;

class Controller
{
    protected App $app;

    public function __construct(App $app)
    {
        $this->app = $app;
    }

    protected function view(string $template, array $data = []): void
    {
        extract($data);
        include __DIR__ . "/../../Views/{$template}.php";
    }
}
