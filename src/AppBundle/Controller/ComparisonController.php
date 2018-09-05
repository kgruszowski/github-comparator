<?php

namespace AppBundle\Controller;

use AppBundle\Service\ComparatorService;
use AppBundle\Service\GithubRepositoryNameExtractor;
use AppBundle\Service\VcsClientFactory;
use AppBundle\Service\VcsRepositoryCreator;
use AppBundle\Utils\Transformer\Exception\EmptyDataException;
use AppBundle\Utils\Transformer\Repository\GithubRepositoryTransformer;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ComparisonController extends FOSRestController
{

    /**
     * @Rest\Post("/comparisons", name="_comparison_action")
     */
    public function comparisonAction(
        Request $request,
        GithubRepositoryNameExtractor $extractor,
        VcsClientFactory $vcsClientFactory,
        VcsRepositoryCreator $repositoryCreator,
        ComparatorService $comparatorService
    )
    {
        $usernameA = $extractor->extractUsername($request->get('repositoryA'));
        $repositoryNameA = $extractor->extractRepositoryName($request->get('repositoryA'));
        $usernameB = $extractor->extractUsername($request->get('repositoryB'));
        $repositoryNameB = $extractor->extractRepositoryName($request->get('repositoryB'));

        $client = $vcsClientFactory->getClient('github');

        try {
            $repositoryA = $repositoryCreator->addClient($client)
                ->addTransformer(new GithubRepositoryTransformer())
                ->createRepository($usernameA, $repositoryNameA);

            $repositoryB = $repositoryCreator->addClient($client)
                ->addTransformer(new GithubRepositoryTransformer())
                ->createRepository($usernameB, $repositoryNameB);
        } catch (EmptyDataException $exception) {
            throw new NotFoundHttpException('Repository not found');
        }

        $comparison = $comparatorService->compare($repositoryA, $repositoryB);

        $responseData = [
            'status' => true,
            'comparison' => $comparison
        ];

        $response = new Response(
            $this->getSerializer()->serialize($responseData, 'json'),
            Response::HTTP_CREATED,
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
