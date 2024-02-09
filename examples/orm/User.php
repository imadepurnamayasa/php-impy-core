<?php

use Imadepurnamayasa\PhpInti\Database\ORM;

class User extends ORM
{
    protected $table = 'users';
    protected $primaryKey = 'id';
}
