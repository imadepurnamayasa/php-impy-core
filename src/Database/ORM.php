<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Database;

use Imadepurnamayasa\PhpInti\Database\PDOConnection;
use PDO;

abstract class ORM
{
    protected $pdo;
    protected $table;
    protected $primaryKey;

    public function __construct(PDOConnection $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findById($id)
    {
        $stmt = $this->pdo->getConnection()->prepare("SELECT * FROM {$this->table} WHERE {$this->primaryKey} = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
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
        $columns = implode(',', $keys);
        $values = implode(',', array_map(function ($key) {
            return ":$key";
        }, $keys));

        $stmt = $this->pdo->getConnection()->prepare("INSERT INTO {$this->table} ($columns) VALUES ($values)");
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();

        return $this->pdo->getConnection()->lastInsertId();
    }

    public function update($id, $data)
    {
        $updates = '';
        foreach ($data as $key => $value) {
            $updates .= "$key = :$key,";
        }
        $updates = rtrim($updates, ',');

        $stmt = $this->pdo->getConnection()->prepare("UPDATE {$this->table} SET $updates WHERE {$this->primaryKey} = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        return $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->pdo->getConnection()->prepare("DELETE FROM {$this->table} WHERE {$this->primaryKey} = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
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
