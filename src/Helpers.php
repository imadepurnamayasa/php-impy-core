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

    public static function var_dump($content)
    {
        echo '<pre>';
        var_dump($content);
        echo '</pre>';
    }

    public static function passwordHashDefault(string $data): string
    {
        return password_hash($data, PASSWORD_DEFAULT);
    }

    public static function passwordVerify($password, $hash)
    {
        if (password_verify($password, $hash)) {
            return true;
        } else {
            return false;
        }
    }
}
