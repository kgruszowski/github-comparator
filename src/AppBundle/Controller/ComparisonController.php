<?php

namespace AppBundle\Controller;

use AppBundle\Service\VcsClientFactory;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ComparisonController
 * @package AppBundle\Controller
 * @Route("/comparison")
 */
class ComparisonController extends FOSRestController
{
    /**
     * @Route("", name="comparison", methods={"POST"})
     */
    public function indexAction(VcsClientFactory $vcsClientFactory)
    {
        $client = $vcsClientFactory->getClient('github');

        return new JsonResponse([
            'status' => $client->getUserData('kgruszowski')
        ]);
    }
}
