<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Authentication;

use Imadepurnamayasa\PhpInti\Database\ORM;

abstract class BasePermission extends ORM
{
    protected $table = 'permissions';
    protected $primaryKey = 'id';
}