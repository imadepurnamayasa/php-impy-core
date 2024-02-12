<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Database\Interface;

interface CrudInterface
{
    public function findById($id);
    public function findAll();
    public function create($data);
    public function update($id, $data);
    public function delete($id);
    public function where($conditions, $values = []);
    public function queryAll($sql, $values = []);
    public function queryOne($sql, $values = []);
}
