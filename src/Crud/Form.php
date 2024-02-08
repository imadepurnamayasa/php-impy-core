<?php

namespace Imadepurnamayasa\PhpInti\Crud;

use DateTime;
use PDO;

class Form extends Crud
{
    public function process(string $action = '')
    {
        $get = $_GET;

        $whereClause = '';
        $whereValues = [];

        foreach ($get as $key => $value) {
            if (in_array($key, $this->primaryKeys)) {
                $whereClause .= "$key = :$key AND ";
                $whereValues[$key] = $value;
            }
        }        

        if (empty($whereClause)) {
            foreach ($this->primaryKeys as $key) {
                $whereClause .= "$key = :$key AND ";
                $whereValues[$key] = '';
            }
        }

        $whereClause = rtrim($whereClause, 'AND ');

        $sql = "SELECT * FROM $this->table WHERE $whereClause LIMIT 1";

        $stmt = $this->connection->connection()->prepare($sql);

        foreach ($whereValues as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        $stmt->execute();

        $meta = [];

        foreach (range(0, $stmt->columnCount() - 1) as $column_index) {
            $meta[] = $stmt->getColumnMeta($column_index);
        }

        $html = '';
        $html .= '<form action="" method="post">';
        $html .= '<table>';

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        foreach ($meta as $row) {
            $value = isset($data[$row['name']]) ? $data[$row['name']] : '';
            if (!in_array($row['name'], $this->hideColumns)) {
                $html .= '<tr>';
                $html .= '<td>' . $row['name'] . '</td>';
                $html .= '<td>:</td>';
                $html .= '<td>';
                if ($row['pdo_type'] === PDO::PARAM_INT) {
                    $html .= '<input type="text" name="crud_form[' . $row['name'] . ']" value="' . $value . '" size="50">';
                } else if ($row['pdo_type'] === PDO::PARAM_STR) {
                    if ($row['native_type'] === 'DATETIME') {
                        $currentDateTime = new DateTime();
                        $currentDateTimeString = $currentDateTime->format('d-m-Y H:i:s');
                        $html .= '<input type="text" name="crud_form[' . $row['name'] . ']" value="' . $currentDateTimeString . '" size="50">';
                    } else {
                        $html .= '<input type="text" name="crud_form[' . $row['name'] . ']" value="' . $value . '" size="50">';
                    }
                }
                $html .= '</td>';
                $html .= '</tr>';
            }
        }

        $html .= '</table>';
        $html .= '<button type="submit">Save</button>';
        $html .= '</form>';

        return $html;
    }
}
