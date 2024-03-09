<?php

declare(strict_types=1);

namespace App\Collection;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class LocationCollection implements CollectionInterface
{
    /**
     * @var Collection<string>
     */
    protected Collection $locations;

    public function __construct()
    {
        $this->locations = new ArrayCollection();
    }

    /**
     * @return Collection<string>
     */
    public function get(): Collection
    {
        return $this->locations;
    }

    public function addLocation(string $location): self
    {
        if ($this->locations->contains($location) === false) {
            $this->locations->add($location);
        }
        return $this;
    }
}
