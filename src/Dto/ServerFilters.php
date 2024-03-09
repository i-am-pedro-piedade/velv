<?php

declare(strict_types=1);

namespace App\Dto;

class ServerFilters
{
    protected string $location = '';
    protected string $storageType = '';

    /**
     * @var int[]
     */
    protected array $storage = [];
    /**
     * @var array<string>
     */
    protected array $ram = [];

    public function getLocation(): string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;
        return $this;
    }

    public function getStorageType(): string
    {
        return $this->storageType;
    }

    public function setStorageType(string $storageType): self
    {
        $this->storageType = $storageType;
        return $this;
    }

    /**
     * @return int[]
     */
    public function getStorage(): array
    {
        return $this->storage;
    }

    /**
     * @param int[] $storage
     * @return $this
     */
    public function setStorage(array $storage): self
    {
        $this->storage = $storage;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getRam(): array
    {
        return $this->ram;
    }

    /**
     * @param string[] $ram
     * @return $this
     */
    public function setRam(array $ram): self
    {
        $this->ram = $ram;
        return $this;
    }
}
