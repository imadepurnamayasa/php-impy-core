<?php

namespace Imadepurnamayasa\PhpInti\Crud;

use Imadepurnamayasa\PhpInti\Database\IConnection;
use PDO;

class Data implements Icrud
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

        // echo '<pre>';
        // print_r($meta);
        // echo '</pre>';

        $no = $offset + 1;
        $html = '';
        $html .= '<button>Create</button>';
        $html .= '<table border="1">';

        $html .= '<tr>';
        $html .= '<th>Aksi</th>';
        $html .= '<th>#</th>';
        foreach ($meta as $row) {
            if (!in_array($row['name'], $this->hideColumns)) {
                $html .= '<th>' . $row['name'] . '</th>';
            }
        }
        $html .= '</tr>';

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $urlParameter = 'crud.php?';
            foreach ($row as $column_index => $column_value) {
                if (in_array($meta[$column_index]['name'], $this->primaryKeys)) {
                    $urlParameter .= $meta[$column_index]['name'] . '=' . $column_value.'&';
                }
            }
            $html .= '<tr valign="top">';
            $html .= '<td>';
            $html .= '<select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">';
            $html .= '<option>-PILIH-</option>';
            $html .= '<option value="' . $urlParameter . 'action=read">Read</option>';
            $html .= '<option value="' . $urlParameter . 'action=print">Print</option>';
            $html .= '<option value="' . $urlParameter . 'action=edit">Edit</option>';
            $html .= '<option value="' . $urlParameter . 'action=delete">Delete</option>';
            $html .= '</select>';
            $html .= '</td>';
            $html .= '<td>' . $no++ . '</td>';
            foreach ($row as $column_index => $column_value) {
                if (!in_array($meta[$column_index]['name'], $this->hideColumns)) {
                    $html .= '<td>' . $column_value . '</td>';
                }
            }
            $html .= '</tr>';
        }

        $html .= '</table>';

        $html .= $pagination->generatePaginationHTML();

        return $html;
    }
}
