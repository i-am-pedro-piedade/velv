<?php

declare(strict_types=1);

namespace App\Model;

class ServerFilters
{
    /**
     * @var Storage[]
     */
    protected array $storage;
    /**
     * @var string[]
     */
    protected array $storageType;
    /**
     * @var string[]
     */
    protected array $ram;
    /**
     * @var string[]
     */
    protected array $location;

    /**
     * @param array<string> $location
     * @param Storage[]|null $storage
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

    /**
     * @return Storage[]
     */
    public function getStorage(): array
    {
        return $this->storage;
    }

    /**
     * @param Storage[] $storage
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
    public function getStorageType(): array
    {
        return $this->storageType;
    }

    /**
     * @param string[] $storageType
     * @return $this
     */
    public function setStorageType(array $storageType): self
    {
        $this->storageType = $storageType;
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

    /**
     * @return string[]
     */
    public function getLocation(): array
    {
        return $this->location;
    }

    /**
     * @param string[] $location
     * @return $this
     */
    public function setLocation(array $location): self
    {
        $this->location = $location;
        return $this;
    }
}
