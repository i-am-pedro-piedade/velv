<?php

declare(strict_types=1);

namespace App\Model;

class Storage
{
    protected int $value;
    protected string $label;

    /**
     * @param int $value
     * @param string $label
     */
    public function __construct(int $value, string $label)
    {
        $this->value = $value;
        $this->label = $label;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;
        return $this;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;
        return $this;
    }


}