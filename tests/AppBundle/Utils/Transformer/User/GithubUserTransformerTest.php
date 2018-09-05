<?php

namespace Tests\AppBundle\Utils\Transformer\User;

use AppBundle\Utils\Transformer\User\GithubUserTransformer;
use PHPUnit\Framework\TestCase;

class GithubUserTransformerTest extends TestCase
{

    /**
     * @expectedException AppBundle\Utils\Transformer\Exception\EmptyDataException
     */
    public function testEmptyDataTransform()
    {
        $data = [];

        $transformer = new GithubUserTransformer();
        $user = $transformer->transform($data);
    }

    public function testTransformComplexData()
    {
        $data = [
            "login" => "kgruszowski",
            "id" => 7579895,
            "node_id" => "MDQ6VXNlcjc1Nzk4OTU=",
            "avatar_url" => "https://avatars1.githubusercontent.com/u/7579895?v=4",
            "gravatar_id" => "",
            "url" => "https://api.github.com/users/kgruszowski",
            "html_url" => "https://github.com/kgruszowski",
            "followers_url" => "https://api.github.com/users/kgruszowski/followers",
            "following_url" => "https://api.github.com/users/kgruszowski/following{/other_user}",
            "gists_url" => "https://api.github.com/users/kgruszowski/gists{/gist_id}",
            "starred_url" => "https://api.github.com/users/kgruszowski/starred{/owner}{/repo}",
            "subscriptions_url" => "https://api.github.com/users/kgruszowski/subscriptions",
            "organizations_url" => "https://api.github.com/users/kgruszowski/orgs",
            "repos_url" => "https://api.github.com/users/kgruszowski/repos",
            "events_url" => "https://api.github.com/users/kgruszowski/events{/privacy}",
            "received_events_url" => "https://api.github.com/users/kgruszowski/received_events",
            "type" => "User",
            "site_admin" => false,
            "name" => "Kamil Gruszowski",
            "company" => "Picodi",
            "blog" => "",
            "location" => null,
            "email" => null,
            "hireable" => null,
            "bio" => null,
            "public_repos" => 8,
            "public_gists" => 0,
            "followers" => 1,
            "following" => 4,
            "created_at" => "2014-05-14T10:28:28Z",
            "updated_at" => "2018-08-29T09:24:04Z"
        ];

        $transformer = new GithubUserTransformer();
        $user = $transformer->transform($data);

        $this->assertEquals('kgruszowski', $user->getLogin());
        $this->assertEquals('Kamil Gruszowski', $user->getName());
        $this->assertEquals('Picodi', $user->getCompany());
        $this->assertEquals(8, $user->getNumOfRepos());
        $this->assertEquals(1, $user->getNumOfFollowers());
    }
}
