<?php

namespace Imadepurnamayasa\PhpInti\Crud;

use DateTime;
use Imadepurnamayasa\PhpInti\Database\IConnection;
use PDO;

class Form implements Icrud
{
    protected IConnection $connection;
    protected string $table = '';
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
        
    }

    public function columnTypes(array $columns) 
    {
        
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

        echo '<form action="" method="post">';
        echo '<table>';

        foreach ($meta as $row) {
            if (!in_array($row['name'], $this->hideColumns)) {
                echo '<tr>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>:</td>';
                echo '<td>';
                if ($row['pdo_type'] === PDO::PARAM_INT) {
                    echo '<input type="text" name="crud_form[' . $row['name'] . ']" value="" size="50">';
                } else if ($row['pdo_type'] === PDO::PARAM_STR) {
                    if ($row['native_type'] === 'DATETIME') {
                        $currentDateTime = new DateTime();
                        $currentDateTimeString = $currentDateTime->format('d-m-Y H:i:s');
                        echo '<input type="text" name="crud_form[' . $row['name'] . ']" value="'.$currentDateTimeString.'" size="50">';
                    } else {
                        echo '<input type="text" name="crud_form[' . $row['name'] . ']" value="" size="50">';
                    }                    
                }
                echo '</td>';
                echo '</tr>';
            }
        }

        echo '</table>';
        echo '<button type="submit">Save</button>';
        echo '</form>';
    }
}
