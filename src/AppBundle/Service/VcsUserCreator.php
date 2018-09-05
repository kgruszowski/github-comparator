<?php

namespace AppBundle\Service;

use AppBundle\Entity\User;
use AppBundle\Utils\Client\VcsClientInterface;
use AppBundle\Utils\Transformer\User\UserTransformerInterface;

class VcsUserCreator
{
    /** @var VcsClientInterface $client */
    protected $client;
    /** @var UserTransformerInterface $transformer */
    protected $transformer;

    /**
     * @param VcsClientInterface $client
     * @return VcsUserCreator
     */
    public function addClient(VcsClientInterface $client): VcsUserCreator
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @param UserTransformerInterface $transformer
     * @return VcsUserCreator
     */
    public function addTransformer(UserTransformerInterface $transformer): VcsUserCreator
    {
        $this->transformer = $transformer;

        return $this;
    }

    /**
     * Fetch data from API and create User model
     * @param string $username
     * @return User
     */
    public function createUser(string $username): User
    {
        $data = $this->client->getUserData($username);
        $user = $this->transformer->transform($data);

        return $user;
    }


}