<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Database\Query;

abstract class UpdateQuery extends Query
{    
    public function render(): string
    {
        return '';
    }
}
