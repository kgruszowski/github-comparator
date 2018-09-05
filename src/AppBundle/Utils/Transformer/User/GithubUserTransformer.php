<?php

namespace AppBundle\Utils\Transformer\User;

use AppBundle\Entity\User;
use AppBundle\Utils\Transformer\Exception\EmptyDataException;

class GithubUserTransformer implements UserTransformerInterface
{
    /**
     * Transform data given by github api into User model
     * @param $data
     * @return User
     * @throws EmptyDataException
     */
    public function transform($data): User
    {
        if (empty($data)) {
            throw new EmptyDataException();
        }

        $user = new User();
        $user->setLogin($this->getArrayValue('login', $data));
        $user->setName($this->getArrayValue('name', $data));
        $user->setUrl($this->getArrayValue('html_url', $data));
        $user->setCompany($this->getArrayValue('company', $data));
        $user->setNumOfRepos($this->getArrayValue('public_repos', $data));
        $user->setNumOfFollowers($this->getArrayValue('followers', $data));
        $user->setNumOfFollowing($this->getArrayValue('following', $data));
        $user->setCreatedAt($this->getArrayValue('created_at', $data));
        $user->setUpdatedAt($this->getArrayValue('updated_at', $data));

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