<?php

declare(strict_types=1);

namespace App\Collection;

use App\Model\Server;
use Doctrine\Common\Collections\Collection;

interface CollectionInterface
{
    public function get(): Collection;
}
