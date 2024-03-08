<?php

declare(strict_types=1);

namespace App\Model;

class ServerFilters
{
    protected array $storage;
    protected array $storageType;
    protected array $ram;
    protected array $location;

    /**
     * @param array<string> $location
     * @param array<int, string>|null $storage
     * @param array<string>|null $storageType
     * @param array<string>|null $ram
     */
    public function __construct(array $location, ?array $storage = null, ?array $storageType = null, ?array $ram = null)
    {
        $this->location = $location;
        $this->storage = $storage ?? [
            new Storage(0, '0'),
            new Storage(250, '250GB'),
            new Storage(500, '500GB'),
            new Storage(1024, '1TB'),
            new Storage(2048, '2TB'),
            new Storage(3072, '3TB'),
            new Storage(4096, '4TB'),
            new Storage(8192, '8TB'),
            new Storage(12288, '12TB'),
            new Storage(24576, '24TB'),
            new Storage(49152, '48TB'),
            new Storage(73728, '72TB'),
        ];
        $this->storageType = $storageType ?? ['SAS', 'SATA', 'SSD'];
        $this->ram = $ram ?? ['2GB', '4GB', '8GB', '12GB', '16GB', '24GB', '32GB', '48GB', '64GB', '96GB'];
    }

    public function getStorage(): array
    {
        return $this->storage;
    }

    public function setStorage(array $storage): self
    {
        $this->storage = $storage;
        return $this;
    }

    public function getStorageType(): array
    {
        return $this->storageType;
    }

    public function setStorageType(array $storageType): self
    {
        $this->storageType = $storageType;
        return $this;
    }

    public function getRam(): array
    {
        return $this->ram;
    }

    public function setRam(array $ram): self
    {
        $this->ram = $ram;
        return $this;
    }

    public function getLocation(): array
    {
        return $this->location;
    }

    public function setLocation(array $location): self
    {
        $this->location = $location;
        return $this;
    }

}