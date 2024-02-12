<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Database\Interface;

interface Connection
{
    public function open();
    public function close();
    public function connection();
}
