<?php
declare(strict_types=1);

namespace App\Controller\Api;

use App\Api\ApiVersion;
use App\Dto\ServerDataRequest;
use App\Dto\ServerDataResponse;
use App\Service\DataProvider\ServersDataProvider;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
use Pagerfanta\Adapter\ArrayAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;
use Symfony\Component\Routing\Annotation\Route;

#[Route(ApiVersion::CURRENT_VERSION . '/servers')]
class ServersController extends AbstractApiController
{
    #[
        Route('', name: 'api_servers', methods: ['GET']),
        OA\Response(
            response: Response::HTTP_OK,
            description: 'Server',
            content: new OA\JsonContent(
                type: 'array',
                items: new OA\Items(ref: new Model(type: ServerDataResponse::class))
            )
        ),
    ]
    public function index(
        ServersDataProvider $dataProvider,
        #[MapQueryString] ?ServerDataRequest $serverDataRequest,
    ): Response
    {
        $serversCollection = $dataProvider->getCollection();
        $pagerfanta = new Pagerfanta(new ArrayAdapter($serversCollection->getFiltered($serverDataRequest?->getFilters())));
        $pagerfanta->setMaxPerPage($serverDataRequest?->getLimit() ?: 10);
        $pagerfanta->setCurrentPage($serverDataRequest?->getPage()?: 1);
        return JsonResponse::fromJsonString($this->serializer->serialize(new ServerDataResponse($pagerfanta), 'json'));
    }
}
