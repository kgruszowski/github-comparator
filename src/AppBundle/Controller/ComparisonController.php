<?php

namespace AppBundle\Controller;

use AppBundle\Service\VcsClientFactory;
use AppBundle\Service\VcsRepositoryCreator;
use AppBundle\Utils\Transformer\Repository\GithubRepositoryTransformer;
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
    public function indexAction(
        VcsClientFactory $vcsClientFactory,
        VcsRepositoryCreator $repositoryCreator
    ) {
        $client = $vcsClientFactory->getClient('github');

        return new JsonResponse([
            'status' => 'ok'
        ]);
    }
}
