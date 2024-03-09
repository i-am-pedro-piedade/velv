<?php

namespace App\Tests\PhpUnit\Integration\Controller\Api;

use App\Api\ApiVersion;
use App\Dto\ServerDataRequest;
use App\Dto\ServerFilters;
use PHPUnit\Framework\Attributes\Depends;

class ServersControllerTest extends ApiTestCase
{
    private string $endpoint = ApiVersion::CURRENT_VERSION . '/servers';

    public function testServersResponseHasExpectedProperties(): void
    {
        $this->client?->request('GET', $this->endpoint);
        $this->assertResponseIsSuccessful();
        $responseData = $this->client?->getResponse()->getContent();
        $this->assertIsString($responseData);
        $serversResponse = json_decode($responseData, true);
        $this->assertArrayHasKey('items', $serversResponse);
        $this->assertIsArray($serversResponse['items']);
        $this->assertArrayHasKey('pagination', $serversResponse);
        $this->assertArrayHasKey('totalItems', $serversResponse['pagination']);
        $this->assertArrayHasKey('currentPage', $serversResponse['pagination']);
        $this->assertArrayHasKey('hasNextPage', $serversResponse['pagination']);
        $this->assertArrayHasKey('hasPreviousPage', $serversResponse['pagination']);
        $this->assertArrayHasKey('itemsPerPage', $serversResponse['pagination']);
    }

    #[Depends('testServersResponseHasExpectedProperties')]
    public function testServersResponseItemHasExpectedProperties(): void
    {
        $this->client?->request('GET', $this->endpoint);
        $responseData = $this->client?->getResponse()->getContent();
        $this->assertIsString($responseData);
        $serversResponse = json_decode($responseData, true);
        $server = reset($serversResponse['items']);
        $this->assertArrayHasKey('model', $server);
        $this->assertArrayHasKey('storage', $server);
        $this->assertArrayHasKey('storageType', $server);
        $this->assertArrayHasKey('storageValue', $server);
        $this->assertArrayHasKey('ram', $server);
        $this->assertArrayHasKey('ramType', $server);
        $this->assertArrayHasKey('ramValue', $server);
        $this->assertArrayHasKey('location', $server);
        $this->assertArrayHasKey('price', $server);
    }

    #[Depends('testServersResponseItemHasExpectedProperties')]
    public function testFilteredServersResponseHasExpectedResults(): void
    {
        $filters = (new ServerDataRequest())->setFilters(
            (new ServerFilters())->setRam(['16GB'])->setLocation('AmsterdamAMS-01')->setStorageType('SATA2')->setStorage([0, 4096])
        );
        /** @var array<string|int|array<int>> $query */
        $query = $this->serializer?->normalize($filters);
        $this->client?->request('GET', $this->endpoint, $query);
        $responseData = $this->client?->getResponse()->getContent();
        $this->assertIsString($responseData);
        $serversResponse = json_decode($responseData, true);
        foreach ($serversResponse['items'] as $server) {
            $this->assertEquals('AmsterdamAMS-01', $server['location']);
            $this->assertEquals('SATA2', $server['storageType']);
            $this->assertGreaterThanOrEqual(0, $server['storageValue']);
            $this->assertLessThanOrEqual(4096, $server['storageValue']);
            $this->assertEquals('16GB', $server['ramValue']);
        }
    }
}
