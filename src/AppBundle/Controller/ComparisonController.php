<?php

namespace AppBundle\Controller;

use AppBundle\Service\ComparatorService;
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
        VcsRepositoryCreator $repositoryCreator,
        ComparatorService $comparatorService
    ) {
        $client = $vcsClientFactory->getClient('github');

        $repositoryA = $repositoryCreator->addClient($client)
            ->addTransformer(new GithubRepositoryTransformer())
            ->createRepository('kgruszowski', 'simplepy');

        $repositoryB = $repositoryCreator->addClient($client)
            ->addTransformer(new GithubRepositoryTransformer())
            ->createRepository('lyst', 'lightfm');

        $comparatorService->compare($repositoryA, $repositoryB);

        return new JsonResponse([
            'status' => 'ok'
        ]);
    }
}
