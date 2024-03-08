<?php
declare(strict_types=1);

namespace App\Service\DataProvider;
use App\Collection\CollectionInterface;
use App\Service\XlsFileLoader;
use Symfony\Contracts\Cache\TagAwareCacheInterface;

abstract class AbstractDataProvider implements DataProviderInterface
{
    protected ?array $xlsData;
    protected string $cacheKey = 'provider.data';

    public function __construct(
        protected readonly TagAwareCacheInterface $cache,
        XlsFileLoader $loader,
    )
    {
        $this->xlsData = $loader->load();
    }

    public function clearCache(): self
    {
        $this->cache->delete($this->cacheKey);
        return $this;
    }

    public function getCollection(): CollectionInterface
    {
        return $this->load();
    }

    abstract protected function load(): CollectionInterface;
    abstract protected function loadFromFile(): CollectionInterface;
}
