<?php
namespace App\Models;

use App\Core\App;
use App\Core\Model;

class Translation extends Model
{
    public function __construct(App $app)
    {
        parent::__construct($app);
    }

    public function get(string $key, string $lang): ?string
    {
        $sql = "SELECT value FROM translations WHERE text_key = :k AND lang_code = :l";
        $stmt = $this->query($sql, ['k' => $key, 'l' => $lang]);
        $row = $stmt->fetch();
        return $row['value'] ?? null;
    }

    public function set(string $key, string $lang, string $value): bool
    {
        $sql = "REPLACE INTO translations (text_key, lang_code, value) VALUES (:k, :l, :v)";
        $stmt = $this->query($sql, ['k' => $key, 'l' => $lang, 'v' => $value]);
        return $stmt->rowCount() > 0;
    }
}
