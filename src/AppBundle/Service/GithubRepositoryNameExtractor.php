<?php

namespace AppBundle\Service;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GithubRepositoryNameExtractor
{

    /**
     * @param null|string $fullName
     * @return null|string
     */
    public function extractUsername(?string $fullName): string
    {
        if (preg_match('|^([a-zA-Z0-9-_]+)\/([a-zA-Z0-9-_]+)$|', $fullName, $match)) {
            return $match[1];
        }

        throw new NotFoundHttpException('Username cannot be empty');
    }

    /**
     * @param null|string $fullName
     * @return null|string
     */
    public function extractRepositoryName(?string $fullName): string
    {
        if (preg_match('|^([a-zA-Z0-9-_]+)\/([a-zA-Z0-9-_]+)$|', $fullName, $match)) {
            return $match[2];
        }

        throw new NotFoundHttpException('Repository name cannot be empty');
    }
}