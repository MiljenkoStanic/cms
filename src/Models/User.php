<?php
namespace App\Models;

use App\Core\App;
use App\Core\Model;

class User extends Model
{
    public function __construct(App $app)
    {
        parent::__construct($app);
    }

    public function findByEmailOrUsername(string $identifier): ?array
    {
        $sql = "SELECT * FROM users WHERE email = :id OR username = :id LIMIT 1";
        $stmt = $this->query($sql, ['id' => $identifier]);
        $user = $stmt->fetch();
        return $user ?: null;
    }

    public function create(array $data): bool
    {
        $sql = "INSERT INTO users (first_name, last_name, email, username, password) VALUES (:first_name, :last_name, :email, :username, :password)";
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $stmt = $this->query($sql, $data);
        return $stmt->rowCount() > 0;
    }
}
