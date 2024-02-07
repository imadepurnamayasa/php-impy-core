<?php

namespace Imadepurnamayasa\PhpInti\Database;

use PDO;

interface IKoneksi
{
    public function buka($host, $port, $username, $password, $database);
    public function bukaEnv($envdir);
    public function tutup();
    public function koneksi(): PDO;
}
