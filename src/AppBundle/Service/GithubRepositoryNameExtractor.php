<?php

namespace AppBundle\Service;

class GithubRepositoryNameExtractor
{

    /**
     * @param null|string $fullName
     * @return null|string
     */
    public function extractUsername(?string $fullName): ?string
    {
        if (preg_match('|(.*)\/(.*)|', $fullName, $match)) {
            return $match[1];
        }

        return null;
    }

    /**
     * @param null|string $fullName
     * @return null|string
     */
    public function extractRepositoryName(?string $fullName): ?string
    {
        if (preg_match('|(.*)\/(.*)|', $fullName, $match)) {
            return $match[2];
        }

        return null;
    }
}