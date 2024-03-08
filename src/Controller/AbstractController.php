<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as AbstractCoreController;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

abstract class AbstractController extends AbstractCoreController
{
    public function __construct(
        protected readonly ValidatorInterface $validator,
        protected readonly SerializerInterface $serializer
    ) {
    }
}
