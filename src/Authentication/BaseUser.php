<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Authentication;

use Imadepurnamayasa\PhpInti\Database\ORM;

abstract class BaseUser extends ORM
{
    protected $usernameColumn;
    protected $passwordColumn;
    protected $emailColumn;

    public function loginByUsername($username, $password)
    {
        $stmt = $this->pdo->getConnection()->prepare("SELECT * FROM {$this->table} WHERE {$this->usernameColumn} = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            
            return true;
        }

        return false;
    }
}