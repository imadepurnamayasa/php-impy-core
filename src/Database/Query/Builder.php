<?php

namespace Imadepurnamayasa\PhpInti\Database\Query;

class Builder
{
    protected $table;
    protected $select = '*';
    protected $join = [];
    protected $joinCondition = [];
    protected $where = [];
    protected $orderBy = [];

    public function table($table)
    {
        $this->table = $table;
        return $this;
    }

    public function select($columns)
    {
        if (is_array($columns)) {
            $this->select = implode(', ', $columns);
        } else {
            $this->select = $columns;
        }
        return $this;
    }

    public function where($column, $operator, $value)
    {
        $this->where[] = compact('column', 'operator', 'value');
        return $this;
    }

    public function join($type, $table, $firstColumn, $operator, $secondColumn)
    {
        $this->join[] = compact('type', 'table', 'firstColumn', 'operator', 'secondColumn');
        return $this;
    }

    public function orderBy($column, $direction = 'ASC')
    {
        $this->orderBy[] = compact('column', 'direction');
        return $this;
    }

    public function build()
    {
        $query = "SELECT {$this->select} FROM {$this->table}";

        if (!empty($this->join)) {
            foreach ($this->join as $join) {
                $query .= " {$join['type']} JOIN {$join['table']} ON {$this->table}.{$join['firstColumn']} {$join['operator']} {$join['table']}.{$join['secondColumn']}";
            }
        }

        if (!empty($this->where)) {
            $query .= " WHERE ";
            foreach ($this->where as $index => $condition) {
                if ($index > 0) {
                    $query .= " AND ";
                }
                $query .= "{$condition['column']} {$condition['operator']} '{$condition['value']}'";
            }
        }

        if (!empty($this->orderBy)) {
            $orderClauses = [];
            foreach ($this->orderBy as $index => $condition) {
                $orderClauses[] = "{$condition['column']} {$condition['direction']}";
            }
            $query .= " ORDER BY " . implode(', ', $orderClauses);
        }

        return $query;
    }
}
