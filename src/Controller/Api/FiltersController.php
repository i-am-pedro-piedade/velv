<?php
declare(strict_types=1);

namespace App\Controller\Api;

use App\Api\ApiVersion;
use App\Model\ServerFilters;
use App\Service\DataProvider\LocationsDataProvider;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(ApiVersion::CURRENT_VERSION . '/filters')]
class FiltersController extends AbstractApiController
{
    #[Route('', name: 'api_locations', methods: ['GET'])]
    public function index(LocationsDataProvider $dataProvider): Response
    {
        $locations = $dataProvider->getCollection();
        return JsonResponse::fromJsonString($this->serializer->serialize(new ServerFilters($locations->get()->toArray()), 'json'));
    }
}
