<?php
declare(strict_types=1);

namespace App\Controller\Dashboard;

use App\Api\ApiVersion;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractDashboardController
{
    #[Route('/{route}', name: 'dashboard_index', requirements: ['route' => '.+'], defaults: ['route' => ''], methods: ['GET'], priority: -10000)]
    public function index(string $route): Response
    {
        return $this->render(
            'dashboard/index.html.twig',
            [
                'route' => '/' . $route,
                'apiBaseUrl' => ApiVersion::CURRENT_VERSION,
            ]
        );
    }
}
