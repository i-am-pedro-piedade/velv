<?php

namespace App\Tests\PhpUnit\Unit\Service\DataProvider;

use App\Collection\LocationCollection;
use App\Service\DataProvider\LocationsDataProvider;

class LocationsDataProviderTest extends DataProviderTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->dataProvider = new LocationsDataProvider($this->cache, $this->loader);
        $this->dataProvider->clearCache();
    }

    public function testDataProviderReturnsLocationCollection(): void
    {
        $this->assertInstanceOf(LocationCollection::class, $this->dataProvider->getCollection());
    }

    public function testCollectionCountIsTwo(): void
    {
        $this->assertSame(2, $this->dataProvider->getCollection()->get()->count());
    }
}
