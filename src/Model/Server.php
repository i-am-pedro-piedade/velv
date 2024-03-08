<?php

declare(strict_types=1);

namespace App\Model;

class Server
{
    protected string $model;
    protected string $storage;
    protected string $storageType;
    protected int $storageValue;
    protected string $ram;
    protected string $ramType;
    protected string $ramValue;
    protected string $location;
    protected string $price;

    public function getModel(): string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;
        return $this;
    }

    public function getStorage(): string
    {
        return $this->storage;
    }

    public function setStorage(string $storage): self
    {
        $this->storage = $storage;
        preg_match('/[G,T]B(\S+)/', $storage, $storageType);
        $this->setStorageType($storageType[1]);
        preg_match('/(\d+)x(\d+)(.)B/', $storage, $storageValue);
        $this->setStorageValue($storageValue);
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

    public function getStorageValue(): int
    {
        return $this->storageValue;
    }

    public function setStorageValue(array $storageValue): self
    {
        $this->storageValue = (int)$storageValue[1] * (int)$storageValue[2] * ($storageValue[3] === 'G' ? 1 : 1024);
        return $this;
    }

    public function getRam(): string
    {
        return $this->ram;
    }

    public function setRam(string $ram): self
    {
        $this->ram = $ram;
        preg_match('/DDR\d+/', $ram, $ramType);
        $this->setRamType($ramType[0]);
        preg_match('/\d+(.)B/', $ram, $ramValue);
        $this->setRamValue($ramValue[0]);
        return $this;
    }

    public function getRamType(): string
    {
        return $this->ramType;
    }

    public function setRamType(string $ramType): self
    {
        $this->ramType = $ramType;
        return $this;
    }

    public function getRamValue(): string
    {
        return $this->ramValue;
    }

    public function setRamValue(string $ramValue): self
    {
        $this->ramValue = $ramValue;
        return $this;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;
        return $this;
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;
        return $this;
    }
}