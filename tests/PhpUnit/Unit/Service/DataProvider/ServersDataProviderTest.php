<?php

namespace App\Tests\PhpUnit\Unit\Service\DataProvider;

use App\Collection\ServerCollection;
use App\Service\DataProvider\ServersDataProvider;

class ServersDataProviderTest extends DataProviderTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->dataProvider = new ServersDataProvider($this->cache, $this->loader);
        $this->dataProvider->clearCache();
    }

    public function testDataProviderReturnsServerCollection(): void
    {
        $this->assertInstanceOf(ServerCollection::class, $this->dataProvider->getCollection());
    }

    public function testCollectionCountIsTwo(): void
    {
        $this->assertSame(3, $this->dataProvider->getCollection()->get()->count());
    }
}
