<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti;

class Helpers
{
    public static function print_r($content)
    {
        echo '<pre>';
        print_r($content);
        echo '</pre>';
    }

    public static function hashDefault(string $data): string
    {
        return password_hash($data, PASSWORD_DEFAULT);
    }
}
