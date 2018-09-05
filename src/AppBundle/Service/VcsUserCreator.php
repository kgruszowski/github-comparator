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

    public function addClient(VcsClientInterface $client): VcsUserCreator
    {
        $this->client = $client;

        return $this;
    }

    public function addTransformer(UserTransformerInterface $transformer): VcsUserCreator
    {
        $this->transformer = $transformer;

        return $this;
    }

    public function createUser(string $username): User
    {
        $data = $this->client->getUserData($username);
        $user = $this->transformer->transform($data);

        return $user;
    }


}