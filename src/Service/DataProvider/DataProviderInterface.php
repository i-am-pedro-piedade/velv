<?php
declare(strict_types=1);

namespace App\Service\DataProvider;

use App\Collection\CollectionInterface;

interface DataProviderInterface
{
    public function getCollection(): CollectionInterface;
    public function clearCache(): DataProviderInterface;
}
