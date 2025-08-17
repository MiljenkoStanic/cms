<?php
namespace App\Models;

use App\Core\App;
use App\Core\Model;

class Language extends Model
{
    public function __construct(App $app)
    {
        parent::__construct($app);
    }

    public function all(): array
    {
        return $this->query("SELECT * FROM languages ORDER BY name")->fetchAll();
    }

    public function find(int $id): ?array
    {
        $stmt = $this->query("SELECT * FROM languages WHERE id = :id", ['id' => $id]);
        $lang = $stmt->fetch();
        return $lang ?: null;
    }

    public function create(array $data): bool
    {
        $sql = "INSERT INTO languages (code, name, flag) VALUES (:code, :name, :flag)";
        $stmt = $this->query($sql, $data);
        return $stmt->rowCount() > 0;
    }

    public function update(int $id, array $data): bool
    {
        $data['id'] = $id;
        $sql = "UPDATE languages SET code=:code, name=:name, flag=:flag WHERE id=:id";
        $stmt = $this->query($sql, $data);
        return $stmt->rowCount() > 0;
    }

    public function delete(int $id): bool
    {
        $stmt = $this->query("DELETE FROM languages WHERE id = :id", ['id' => $id]);
        return $stmt->rowCount() > 0;
    }
}
