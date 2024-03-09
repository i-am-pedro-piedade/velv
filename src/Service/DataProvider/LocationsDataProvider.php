<?php

declare(strict_types=1);

namespace App\Service\DataProvider;

use App\Collection\LocationCollection;
use DateInterval;
use Symfony\Contracts\Cache\ItemInterface;

class LocationsDataProvider extends AbstractDataProvider implements DataProviderInterface
{
    protected string $cacheTag = 'locations';
    protected string $cacheKey = 'provider.locations';
    protected string $cacheTtl = 'P1W';

    public function getCollection(): LocationCollection
    {
        return $this->load();
    }

    protected function load(): LocationCollection
    {
        return $this->cache->get($this->cacheKey, function (ItemInterface $item) {
            $item->expiresAfter(new DateInterval($this->cacheTtl))
                ->tag($this->cacheTag);
            return $this->loadFromFile();
        });
    }

    protected function loadFromFile(): LocationCollection
    {
        $locations = new LocationCollection();
        foreach ($this->xlsData as $row) {
            $locations->addLocation($row[3]);
        }
        return $locations;
    }
}
