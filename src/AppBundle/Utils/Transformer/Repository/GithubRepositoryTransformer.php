<?php

namespace AppBundle\Utils\Transformer\Repository;

use AppBundle\Entity\Repository;
use AppBundle\Utils\Transformer\Exception\EmptyDataException;

class GithubRepositoryTransformer implements RepositoryTransformerInterface
{
    /**
     * Transform data given by github api into Repository model
     * @param $data
     * @return Repository
     * @throws EmptyDataException
     */
    public function transform($data): Repository
    {
        if (empty($data)) {
            throw new EmptyDataException();
        }

        $user = new Repository();
        $user->setId($this->getArrayValue('id', $data));
        $user->setName($this->getArrayValue('name', $data));
        $user->setFullName($this->getArrayValue('full_name', $data));
        $user->setUrl($this->getArrayValue('html_url', $data));
        $user->setLanguage($this->getArrayValue('language', $data));
        $user->setNumOfStars($this->getArrayValue('stargazers_count', $data));
        $user->setNumOfWatchers($this->getArrayValue('watchers_count', $data));
        $user->setNumOfForks($this->getArrayValue('forks', $data));
        $user->setNumOfOpenIssues($this->getArrayValue('open_issues', $data));
        $user->setCreatedAt($this->getArrayValue('created_at', $data));
        $user->setUpdatedAt($this->getArrayValue('updated_at', $data));
        $user->setPrivate($this->getArrayValue('private', $data));

        return $user;
    }

    /**
     * @param string $key
     * @param array $data
     * @return mixed|null
     */
    protected function getArrayValue(string $key, array $data)
    {
        if (isset($data[$key])) {
            return $data[$key];
        }

        return null;
    }
}