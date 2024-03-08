<?php
namespace App\Tests\PhpUnit\Integration;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Serializer\SerializerInterface;

abstract class IntegrationTestCase extends WebTestCase
{
    protected ?KernelBrowser $client;
    protected ?SerializerInterface $serializer;

    protected function setUp(): void
    {
        $this->client = $this->createClient();
        $this->serializer = static::getContainer()->get(SerializerInterface::class);
    }
}
