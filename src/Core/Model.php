<?php
namespace App\Core;

use PDO;

class Model
{
    protected PDO $db;

    public function __construct(App $app)
    {
        $this->db = $app->db();
    }

    protected function query(string $sql, array $params = []): \PDOStatement
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}
