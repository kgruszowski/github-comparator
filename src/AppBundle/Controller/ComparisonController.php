<?php

namespace AppBundle\Controller;

use AppBundle\Service\ComparatorService;
use AppBundle\Service\VcsClientFactory;
use AppBundle\Service\VcsRepositoryCreator;
use AppBundle\Utils\Transformer\Repository\GithubRepositoryTransformer;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

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

        $comparison = $comparatorService->compare($repositoryA, $repositoryB);

        $responseData = [
            'status' => true,
            'data'   => $comparison
        ];

        $response = new Response(
            $this->getSerializer()->serialize($responseData, 'json'),
            Response::HTTP_OK,
            ['Content-type' => 'application/json']
        );

        return $response;
    }

    protected function getSerializer(): Serializer
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);

        return $serializer;
    }

}
