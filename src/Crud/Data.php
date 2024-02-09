<?php

namespace Imadepurnamayasa\PhpInti\Crud;

use Imadepurnamayasa\PhpInti\Helpers;
use PDO;

class Data extends Crud
{
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

        //Helpers::print_r($meta);

        $grid = new GridManager(0, $stmt->columnCount());

        foreach ($meta as $columnIndex => $column) {
            $grid->setColumnHeader($columnIndex, $column['name']);
        }

        $rowIndex = 0;

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {   
            $grid->addRow();                     
            foreach ($row as $columnIndex => $columnValue) {
                $grid->setCellValue($rowIndex, $columnIndex, $columnValue);
            }  
            $rowIndex++;          
        }

        $html = '';
        $html .= $grid->renderTable();
        $html .= $pagination->generatePaginationHTML();

        return $html;
    }
}
