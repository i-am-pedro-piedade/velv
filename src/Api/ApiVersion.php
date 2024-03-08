<?php

declare(strict_types=1);

namespace App\Api;

abstract class ApiVersion
{
    public const V1 = '/api/v1';
    public const CURRENT_VERSION = self::V1;

}
