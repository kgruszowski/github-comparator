<?php

namespace AppBundle\Service\Client;

interface VcsClientInterface
{
    public function getUserData(string $username): array;
    public function getProjectData(string $username, string $projectName): array;
}
