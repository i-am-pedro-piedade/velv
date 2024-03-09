<?php

namespace App\Tests\PhpUnit\Integration;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;

abstract class IntegrationTestCase extends WebTestCase
{
    protected ?KernelBrowser $client;
    protected ?NormalizerInterface $serializer;

    protected function setUp(): void
    {
        $this->client = $this->createClient();
        /** @var NormalizerInterface $serializer */
        $serializer = static::getContainer()->get(NormalizerInterface::class);
        $this->serializer = $serializer;
    }
}
