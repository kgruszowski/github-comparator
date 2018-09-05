<?php

namespace AppBundle\Service;

use AppBundle\Entity\Repository;
use AppBundle\Utils\Client\VcsClientInterface;
use AppBundle\Utils\Transformer\Repository\RepositoryTransformerInterface;

class VcsRepositoryCreator
{
    /** @var VcsClientInterface $client */
    protected $client;
    /** @var RepositoryTransformerInterface $transformer */
    protected $transformer;

    /**
     * @param VcsClientInterface $client
     * @return VcsRepositoryCreator
     */
    public function addClient(VcsClientInterface $client): VcsRepositoryCreator
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @param RepositoryTransformerInterface $transformer
     * @return VcsRepositoryCreator
     */
    public function addTransformer(RepositoryTransformerInterface $transformer): VcsRepositoryCreator
    {
        $this->transformer = $transformer;

        return $this;
    }

    /**
     * @param string $username
     * @param string $repositoryName
     * @return Repository
     */
    public function createRepository(string $username, string $repositoryName): Repository
    {
        $data = $this->client->getRepositoryData($username, $repositoryName);
        $repository = $this->transformer->transform($data);

        return $repository;
    }
}
