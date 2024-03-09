<?php

declare(strict_types=1);

namespace App\Model;

use Pagerfanta\Pagerfanta;

class Pagination
{
    protected int $totalItems;
    protected int $currentPage;
    protected int $totalPages;
    protected bool $hasNextPage;
    protected bool $hasPreviousPage;
    protected int $itemsPerPage;

    public function __construct(Pagerfanta $pagerfanta)
    {
        $this->setHasNextPage($pagerfanta->hasNextPage());
        $this->setHasPreviousPage($pagerfanta->hasPreviousPage());
        $this->setTotalItems($pagerfanta->getNbResults());
        $this->setCurrentPage($pagerfanta->getCurrentPage());
        $this->setTotalPages($pagerfanta->getNbPages());
        $this->setItemsPerPage($pagerfanta->getMaxPerPage());
    }

    public function getTotalItems(): int
    {
        return $this->totalItems;
    }

    public function setTotalItems(int $totalItems): self
    {
        $this->totalItems = $totalItems;
        return $this;
    }

    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }

    public function setCurrentPage(int $currentPage): self
    {
        $this->currentPage = $currentPage;
        return $this;
    }

    public function getTotalPages(): int
    {
        return $this->totalPages;
    }

    public function setTotalPages(int $totalPages): self
    {
        $this->totalPages = $totalPages;
        return $this;
    }

    public function getHasNextPage(): bool
    {
        return $this->hasNextPage;
    }

    public function setHasNextPage(bool $hasNextPage): self
    {
        $this->hasNextPage = $hasNextPage;
        return $this;
    }

    public function getHasPreviousPage(): bool
    {
        return $this->hasPreviousPage;
    }

    public function setHasPreviousPage(bool $hasPreviousPage): self
    {
        $this->hasPreviousPage = $hasPreviousPage;
        return $this;
    }

    public function getItemsPerPage(): int
    {
        return $this->itemsPerPage;
    }

    public function setItemsPerPage(int $itemsPerPage): self
    {
        $this->itemsPerPage = $itemsPerPage;
        return $this;
    }
}
