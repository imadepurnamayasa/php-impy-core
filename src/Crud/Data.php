<?php

namespace Imadepurnamayasa\PhpInti\Crud;

use PDO;

class Data extends Crud
{
    public function process(string $parameter = 'page', int $limit = 10)
    {
        $uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);

        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
            $url = "https://" . $_SERVER['HTTP_HOST'] . $uri_parts[0];
        } else {
            $url = "http://" . $_SERVER['HTTP_HOST'] . $uri_parts[0];
        }

        $page = isset($_GET[$parameter]) && is_numeric($_GET[$parameter]) ? $_GET[$parameter] : 0;

        $stmt = $this->connection->connection()->prepare("SELECT count(*) FROM $this->table");
        $stmt->execute();
        $totalRow = $stmt->fetchColumn(0);
        $pagination = new Pagination($totalRow, $limit, "$url?$parameter=");
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
