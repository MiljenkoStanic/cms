<?php
namespace App\Core;

class View
{
    public static function render(string $template, array $data = []): void
    {
        extract($data);
        include __DIR__ . "/../../Views/{$template}.php";
    }
}
