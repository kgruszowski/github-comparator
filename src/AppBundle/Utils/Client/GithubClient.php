<?php

namespace AppBundle\Utils\Client;

use Github\Client;
use Github\Exception\RuntimeException;

class GithubClient implements VcsClientInterface
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Return array with user data
     * @param string $username
     * @return array
     */
    public function getUserData(string $username): array
    {
        try {
            $user = $this->client->api('user')->show($username);
        } catch (RuntimeException $exception) {
            return [];
        }

        return $user;
    }

    public function getRepositoryData(string $username, string $repoName): array
    {
        try {
            $repo = $this->client->api('repo')->show($username, $repoName);
        } catch (RuntimeException $exception) {
            return [];
        }

        return $repo;
    }
}