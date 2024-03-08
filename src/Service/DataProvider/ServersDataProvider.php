<?php
declare(strict_types=1);

namespace App\Service\DataProvider;
use App\Collection\ServerCollection;
use App\Model\Server;
use DateInterval;
use Symfony\Contracts\Cache\ItemInterface;

class ServersDataProvider extends AbstractDataProvider implements DataProviderInterface
{
    protected string $cacheTag = 'servers';
    protected string $cacheKey = 'provider.servers';
    protected string $cacheTtl = 'P1D';

    public function getCollection(): ServerCollection
    {
        return $this->load();
    }

    protected function load(): ServerCollection
    {
        return $this->cache->get($this->cacheKey, function (ItemInterface $item) {
            $item->expiresAfter(new DateInterval($this->cacheTtl))
                ->tag($this->cacheTag);
            return $this->loadFromFile();
        });
    }

    protected function loadFromFile(): ServerCollection
    {
        $servers = new ServerCollection();
        foreach ($this->xlsData as $row) {
            $servers->addServer(
                (new Server())
                ->setModel($row[0])
                ->setRam($row[1])
                ->setStorage($row[2])
                ->setLocation($row[3])
                ->setPrice($row[4])
            );
        }
        return $servers;
    }

}
