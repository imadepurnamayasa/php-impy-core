<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Authentication;

use Imadepurnamayasa\PhpInti\Database\ORM;
use Imadepurnamayasa\PhpInti\Helpers;

abstract class BaseUser extends ORM
{
    protected $table = 'users';
    protected $primariKey = 'id';
    protected $usernameColumn = 'username';
    protected $passwordColumn = 'password';
    protected $emailColumn = 'email';

    public function loginByUsername($username, $password)
    {
        $stmt = $this->pdo->getConnection()->prepare("SELECT * FROM {$this->table} WHERE {$this->usernameColumn} = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && Helpers::passwordVerify($password, $user['password'])) {
            
            return true;
        }

        return false;
    }

    public function loginByEmail($email, $password)
    {
        $stmt = $this->pdo->getConnection()->prepare("SELECT * FROM {$this->table} WHERE {$this->emailColumn} = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && Helpers::passwordVerify($password, $user['password'])) {
            
            return true;
        }

        return false;
    }
}