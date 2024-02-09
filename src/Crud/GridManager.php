<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Crud;

class GridManager
{
    private $grid;
    private $rows;
    private $cols;
    private $headers;

    public function __construct($rows = 0, $cols)
    {
        $this->rows = $rows;
        $this->cols = $cols;
        $this->grid = [];
        $this->headers = array_fill(0, $cols, '');
        for ($i = 0; $i < $rows; $i++) {
            $row = [];
            for ($j = 0; $j < $cols; $j++) {
                $row[] = 'col-' . $j;
            }
            $this->grid[] = $row;
        }
    }

    // Add a row to the grid
    public function addRow()
    {
        $row = [];
        for ($j = 0; $j < $this->cols; $j++) {
            $row[] = 'col-' . $j;
        }
        $this->grid[] = $row;
        $this->rows++;
    }

    // Set cell value
    public function setCellValue($row, $col, $value)
    {
        if ($this->isValidCell($row, $col)) {
            $this->grid[$row][$col] = $value;
            return true;
        }
        return false;
    }

    // Get cell value
    public function getCellValue($row, $col)
    {
        if ($this->isValidCell($row, $col)) {
            return $this->grid[$row][$col];
        }
        return null;
    }

    // Set column header
    public function setColumnHeader($col, $header)
    {
        if ($col >= 0 && $col < $this->cols) {
            $this->headers[$col] = $header;
            return true;
        }
        return false;
    }

    // Render table
    public function renderTable()
    {
        $table = '<table border="1">';
        // Header row
        $table .= '<tr>';
        foreach ($this->headers as $header) {
            $table .= '<th>' . htmlspecialchars($header) . '</th>';
        }
        $table .= '</tr>';
        // Data rows
        for ($i = 0; $i < $this->rows; $i++) {
            $table .= '<tr>';
            for ($j = 0; $j < $this->cols; $j++) {
                $cellValue = $this->getCellValue($i, $j);
                $table .= '<td>' . htmlspecialchars($cellValue) . '</td>';
            }
            $table .= '</tr>';
        }
        $table .= '</table>';
        
        return $table;
    }

    // Check if cell is valid
    private function isValidCell($row, $col)
    {
        return isset($this->grid[$row]) && isset($this->grid[$row][$col]);
    }
}
