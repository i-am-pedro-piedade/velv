<?php

namespace App\Tests\PhpUnit\Unit\Service\DataProvider;

use App\Service\DataProvider\DataProviderInterface;
use App\Service\XlsFileLoader;
use App\Tests\PhpUnit\UnitTestCase;
use Symfony\Contracts\Cache\TagAwareCacheInterface;

class DataProviderTestCase extends UnitTestCase
{
    protected TagAwareCacheInterface $cache;
    protected XlsFileLoader $loader;
    protected DataProviderInterface $dataProvider;

    protected function setUp(): void
    {
        $this->loader = $this->createMock(XlsFileLoader::class);
        $this->loader->method('load')
            ->willReturn([
                [
                    'Dell R210Intel Xeon X3440',
                    '16GBDDR3',
                    '2x2TBSATA2',
                    'AmsterdamAMS-01',
                    '€49.99',
                ],
                [
                    'Dell R210-IIIntel Xeon E3-1220',
                    '16GBDDR3',
                    '2x1TBSATA2',
                    'AmsterdamAMS-01',
                    '€59.99',
                ],
                [
                    'Dell R730XD2x Intel Xeon E5-2650v4',
                    '128GBDDR4',
                    '4x480GBSSD',
                    'San FranciscoSFO-12',
                    '$431.99',
                ],
        ]);
        $this->cache = static::getContainer()->get(TagAwareCacheInterface::class);
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->dataProvider->clearCache();
    }

}
