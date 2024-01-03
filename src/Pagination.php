<?php

namespace Imadepurnamayasa\PhpInti;

class Pagination
{
    private $totalItems;
    private $itemsPerPage;
    private $currentPage;
    private $baseUrl;

    public function __construct($totalItems, $itemsPerPage = 5, $baseUrl = '?page=')
    {
        $this->totalItems = $totalItems;
        $this->itemsPerPage = $itemsPerPage;
        $this->baseUrl = $baseUrl;
    }

    public function setCurrentPage($currentPage)
    {
        $this->currentPage = isset($currentPage) && is_numeric($currentPage) ? $currentPage : 1;
    }

    public function getOffset()
    {
        return ($this->currentPage - 1) * $this->itemsPerPage;
    }

    public function getTotalPages()
    {
        return ceil($this->totalItems / $this->itemsPerPage);
    }

    public function generatePaginationHTML()
    {
        $html = '<ul class="pagination">';

        if ($this->currentPage > 1) {
            $html .= '<li class="prev"><a href="' . $this->baseUrl . ($this->currentPage - 1) . '">Prev</a></li>';
        }

        $totalPages = $this->getTotalPages();

        if ($this->currentPage > 3) {
            $html .= '<li class="start"><a href="' . $this->baseUrl . '1">1</a></li>';
            $html .= '<li class="dots">...</li>';
        }

        for ($i = max(1, $this->currentPage - 2); $i <= min($this->currentPage + 2, $totalPages); $i++) {
            $class = ($i == $this->currentPage) ? 'currentpage' : 'page';
            $html .= '<li class="' . $class . '"><a href="' . $this->baseUrl . $i . '">' . $i . '</a></li>';
        }

        if ($this->currentPage + 2 < $totalPages) {
            $html .= '<li class="dots">...</li>';
            $html .= '<li class="end"><a href="' . $this->baseUrl . $totalPages . '">' . $totalPages . '</a></li>';
        }

        if ($this->currentPage < $totalPages) {
            $html .= '<li class="next"><a href="' . $this->baseUrl . ($this->currentPage + 1) . '">Next</a></li>';
        }

        $html .= '</ul>';

        return $html;
    }
}
