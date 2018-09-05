<?php

namespace AppBundle\Service;

use AppBundle\Utils\Client\Exception\ClientNotFoundException;
use AppBundle\Utils\Client\GithubClient;
use AppBundle\Utils\Client\VcsClientInterface;
use Github\Client;

class VcsClientFactory
{

    /**
     * Get client for given Version Control System
     * @param string $clientName
     * @return VcsClientInterface
     * @throws ClientNotFoundException
     */
    public function getClient(string $clientName): VcsClientInterface
    {

        switch ($clientName) {
            case 'github':
                $client = new GithubClient(new Client());
                break;
            default:
                throw new ClientNotFoundException();
        }

        return $client;
    }
}
