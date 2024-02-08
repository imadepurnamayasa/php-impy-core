<?php

namespace Imadepurnamayasa\PhpInti\Crud;

use DateTime;
use Imadepurnamayasa\PhpInti\Database\IConnection;
use PDO;

class Form implements Icrud
{
    protected IConnection $connection;
    protected string $table = '';
    protected array $primaryKeys = [];
    protected array $columnTypes = [];
    protected array $hideColumns = [];

    public function __construct(IConnection $connection)
    {
        $this->connection = $connection;
    }

    public function table(string $table)
    {
        $this->table = $table;
    }

    public function primaryKeys(array $columns)
    {
        $this->primaryKeys = $columns;
    }

    public function columnTypes(array $columns) 
    {
        $this->columnTypes = $columns;
    }

    public function hideColumns(array $columns)
    {
        $this->hideColumns = $columns;
    }

    public function process()
    {
        $stmt = $this->connection->connection()->prepare("SELECT * FROM $this->table");
        $stmt->execute();

        $meta = [];

        foreach (range(0, $stmt->columnCount() - 1) as $column_index) {
            $meta[] = $stmt->getColumnMeta($column_index);
        }

        $html = '';
        $html .= '<form action="" method="post">';
        $html .= '<table>';

        foreach ($meta as $row) {
            if (!in_array($row['name'], $this->hideColumns)) {
                $html .= '<tr>';
                $html .= '<td>' . $row['name'] . '</td>';
                $html .= '<td>:</td>';
                $html .= '<td>';
                if ($row['pdo_type'] === PDO::PARAM_INT) {
                    $html .= '<input type="text" name="crud_form[' . $row['name'] . ']" value="" size="50">';
                } else if ($row['pdo_type'] === PDO::PARAM_STR) {
                    if ($row['native_type'] === 'DATETIME') {
                        $currentDateTime = new DateTime();
                        $currentDateTimeString = $currentDateTime->format('d-m-Y H:i:s');
                        $html .= '<input type="text" name="crud_form[' . $row['name'] . ']" value="'.$currentDateTimeString.'" size="50">';
                    } else {
                        $html .= '<input type="text" name="crud_form[' . $row['name'] . ']" value="" size="50">';
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
