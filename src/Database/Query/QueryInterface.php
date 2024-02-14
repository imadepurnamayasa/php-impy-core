<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Database\Query;

interface QueryInterface
{
    public function render(): string;
}
