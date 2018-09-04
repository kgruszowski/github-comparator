<?php

namespace AppBundle\Utils\Client;

interface VcsClientInterface
{
    public function getUserData(string $username): array;
    public function getRepositoryData(string $username, string $repoName): array;
}
