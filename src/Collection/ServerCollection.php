<?php

declare(strict_types=1);

namespace App\Collection;

use App\Dto\ServerFilters;
use App\Model\Server;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class ServerCollection implements CollectionInterface
{
    /**
     * @var Collection<Server>
     */
    protected Collection $servers;

    public function __construct()
    {
        $this->servers = new ArrayCollection();
    }

    /**
     * @return Collection<Server>
     */
    public function get(): Collection
    {
        return $this->servers;
    }

    /**
     * @param ServerFilters|null $filters
     * @return array<Server>
     */
    public function getFiltered(?ServerFilters $filters): array
    {
        $servers = $this->get();
        if ($servers->isEmpty()) {
            return [];
        }
        if ($filters !== null) {
            $servers = $this->filterByLocation($servers, $filters->getLocation());
            if ($servers->isEmpty()) {
                return [];
            }
            $servers = $this->filterByStorageType($servers, $filters->getStorageType());
            if ($servers->isEmpty()) {
                return [];
            }
            $servers = $this->filterByStorageValue($servers, $filters->getStorage());
            if ($servers->isEmpty()) {
                return [];
            }
            $servers = $this->filterByRam($servers, $filters->getRam());
            if ($servers->isEmpty()) {
                return [];
            }
        }
        return $servers->toArray();
    }

    /**
     * @param Collection<Server> $servers
     * @return Collection<Server>
     */
    public function filterByLocation(Collection $servers, string $location): Collection
    {
        return $location === '' ? $servers : $servers->filter(static function (Server $server) use ($location) {
               return $server->getLocation() === $location;
        });
    }

    /**
     * @param Collection<Server> $servers
     * @return Collection<Server>
     */
    public function filterByStorageType(Collection $servers, string $storageType): Collection
    {
        return $storageType === '' ? $servers : $servers->filter(static function (Server $server) use ($storageType) {
               return str_starts_with($server->getStorageType(), $storageType);
        });
    }

    /**
     * @param Collection $servers
     * @param int[] $storageValue
     * @return Collection
     */
    public function filterByStorageValue(Collection $servers, array $storageValue): Collection
    {
        return count($storageValue) !== 2 ? $servers : $servers->filter(static function (Server $server) use ($storageValue) {
            return $server->getStorageValue() >= $storageValue[0] && $server->getStorageValue() <= $storageValue[1];
        });
    }

    /**
     * @param Collection $servers
     * @param string[] $ram
     * @return Collection
     */
    public function filterByRam(Collection $servers, array $ram): Collection
    {
        return (count($ram) === 0) ? $servers : $servers->filter(static function (Server $server) use ($ram) {
            return in_array($server->getRamValue(), $ram);
        });
    }

    public function addServer(Server $server): self
    {
        $this->servers->add($server);
        return $this;
    }
}
