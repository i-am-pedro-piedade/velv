<?php

declare(strict_types=1);

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class ServerDataRequest
{
    #[Assert\GreaterThanOrEqual(1)]
    protected int $page = 1;

    #[Assert\GreaterThanOrEqual(1)]
    #[Assert\LessThanOrEqual(100)]
    protected int $limit = 10;

    protected ?ServerFilters $filters = null;

    public function getPage(): int
    {
        return $this->page;
    }

    public function setPage(int $page): self
    {
        $this->page = $page;
        return $this;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function setLimit(int $limit): self
    {
        $this->limit = $limit;
        return $this;
    }

    public function getFilters(): ?ServerFilters
    {
        return $this->filters;
    }

    public function setFilters(?ServerFilters $filters): self
    {
        $this->filters = $filters;
        return $this;
    }
}
