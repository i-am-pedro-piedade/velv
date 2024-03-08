<?php
declare(strict_types=1);

namespace App\Service;
use Shuchkin\SimpleXLSX;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Contracts\Cache\TagAwareCacheInterface;
use DateInterval;

class XlsFileLoader
{
    protected const CACHE_KEY = 'xls.file.loader';
    protected const CACHE_TTL = 'P1W';

    public function __construct(
        private readonly KernelInterface $appKernel,
        private readonly TagAwareCacheInterface $cache,
    )
    {
    }

    public function load(): array
    {
        return $this->cache->get(self::CACHE_KEY, function (ItemInterface $item) {
            $item->expiresAfter(new DateInterval(self::CACHE_TTL));
            return $this->loadFile();
        });
    }

    /**
     * @return array
     * @throws \Exception
     */
    private function loadFile(): array
    {
        $file = $this->appKernel->getProjectDir() . '/fixtures/servers.xlsx';
        $xls = SimpleXLSX::parse($file);
        if($xls === false) {
            throw new \Exception('Could not read data from XLS');
        }
        $rows = $xls->rows();
        unset($rows[0]);
        return $rows;
    }

}
