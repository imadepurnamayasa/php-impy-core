<?php

namespace Imadepurnamayasa\PhpInti\Database;

use PDO;

abstract class ORM
{
    protected $pdo;
    protected $table;
    protected $primaryKey = 'id';

    public function __construct(PDOConnection $pdo, string $table)
    {
        $this->pdo = $pdo;
        $this->table = $table;
    }

    public function findById($id)
    {
        $stmt = $this->pdo->getConnection()->prepare("SELECT * FROM {$this->table} WHERE $this->primaryKey = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findAll()
    {
        $stmt = $this->pdo->getConnection()->prepare("SELECT * FROM {$this->table}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // This method needs to be implemented by subclasses
    abstract public function save($data);

    // This method needs to be implemented by subclasses
    abstract public function delete($id);
}
