<?php

namespace Imadepurnamayasa\PhpInti\Crud;

use Imadepurnamayasa\PhpInti\Database\IConnection;
use PDO;

class Data implements Icrud
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

    public function process(string $parameter = 'page', int $limit = 10)
    {

        $page = isset($_GET[$parameter]) && is_numeric($_GET[$parameter]) ? $_GET[$parameter] : 0;

        $stmt = $this->connection->connection()->prepare("SELECT count(*) FROM $this->table");
        $stmt->execute();
        $totalRow = $stmt->fetchColumn(0);
        $pagination = new Pagination($totalRow, $limit, "crud.php?$parameter=");
        $pagination->setCurrentPage($page);

        if ($page > 0) {
            $offset = ($page - 1) * $limit;
        } else {
            $offset = $page * $limit;
        }

        $stmt = $this->connection->connection()->prepare("SELECT * FROM $this->table LIMIT $limit OFFSET $offset");
        $stmt->execute();

        $meta = [];

        foreach (range(0, $stmt->columnCount() - 1) as $column_index) {
            $meta[] = $stmt->getColumnMeta($column_index);
        }

        echo '<pre>';
        print_r($meta);
        echo '</pre>';

        $no = $offset + 1;
        echo '<button>Create</button>';
        echo '<table border="1">';

        echo '<tr>';
        echo '<th>Aksi</th>';
        echo '<th>#</th>';
        foreach ($meta as $row) {
            if (!in_array($row['name'], $this->hideColumns)) {
                echo '<th>' . $row['name'] . '</th>';
            }
        }
        echo '</tr>';

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            echo '<tr valign="top">';
            echo '<td>';
            echo '<select>';
            echo '<option>-PILIH-</option>';
            echo '<option>Baca</option>';
            echo '<option>Cetak</option>';
            echo '<option>Ubah</option>';
            echo '<option>Hapus</option>';
            echo '</select>';
            echo '</td>';
            echo '<td>' . $no++ . '</td>';
            foreach ($row as $column_index => $column_value) {
                if (!in_array($meta[$column_index]['name'], $this->hideColumns)) {
                    echo '<td>' . $column_value . '</td>';
                }
            }
            echo '</tr>';
        }

        echo '</table>';

        echo $pagination->generatePaginationHTML();
    }
}
