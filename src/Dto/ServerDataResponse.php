<?php

declare(strict_types=1);

namespace App\Dto;

use App\Model\Pagination;
use App\Model\Server;
use Pagerfanta\Pagerfanta;

class ServerDataResponse
{
    /**
     * @var Server[]
     */
    protected array $items = [];
    protected Pagination $pagination;

    public function __construct(Pagerfanta $pagerfanta)
    {
        /** @var Server[] $currentPage */
        $currentPage = $pagerfanta->getCurrentPageResults();
        $this->setItems($currentPage);
        $this->setPagination(new Pagination($pagerfanta));
    }

    /**
     * @return Server[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param Server[] $items
     * @return $this
     */
    public function setItems(array $items): self
    {
        $this->items = $items;
        return $this;
    }

    public function getPagination(): Pagination
    {
        return $this->pagination;
    }

    public function setPagination(Pagination $pagination): self
    {
        $this->pagination = $pagination;
        return $this;
    }
}
