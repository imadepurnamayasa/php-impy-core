<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Database;

use Imadepurnamayasa\PhpInti\Database\PDOConnection;
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
        $stmt = $this->pdo->getConnection()->prepare("SELECT * FROM {$this->table} WHERE {$this->primaryKey} = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findAll()
    {
        $stmt = $this->pdo->getConnection()->prepare("SELECT * FROM {$this->table}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $keys = array_keys($data);
        $values = array_values($data);

        $columns = implode(',', $keys);
        $placeholders = implode(',', array_fill(0, count($values), '?'));

        $stmt = $this->pdo->getConnection()->prepare("INSERT INTO {$this->table} ($columns) VALUES ($placeholders)");
        $stmt->execute($values);

        return $this->pdo->getConnection()->lastInsertId();
    }

    public function update($id, $data)
    {
        $updates = '';
        foreach ($data as $key => $value) {
            $updates .= "$key=?,";
        }
        $updates = rtrim($updates, ',');

        $stmt = $this->pdo->getConnection()->prepare("UPDATE {$this->table} SET $updates WHERE {$this->primaryKey} = ?");
        $values = array_values($data);
        $values[] = $id;
        return $stmt->execute($values);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->getConnection()->prepare("DELETE FROM {$this->table} WHERE {$this->primaryKey} = ?");
        return $stmt->execute([$id]);
    }

    public function where($conditions, $values = [])
    {
        $where = implode(' AND ', $conditions);
        $stmt = $this->pdo->getConnection()->prepare("SELECT * FROM {$this->table} WHERE $where");
        $stmt->execute($values);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function query($sql, $values = [])
    {
        $stmt = $this->pdo->getConnection()->prepare($sql);
        $stmt->execute($values);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
