<?php

namespace Tests\AppBundle\Utils;

use AppBundle\Utils\Client\GithubClient;
use Github\Api\Repo;
use Github\Api\User;
use Github\Client;
use Github\Exception\RuntimeException;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class GithubClientTest extends TestCase
{
    /** @var MockObject|Client */
    protected $clientMock;
    /** @var MockObject|User */
    protected $userApiMock;
    /** @var MockObject|Repo */
    protected $repoApiMock;

    public function setUp()
    {
        $this->clientMock = $this->getMockBuilder(Client::class)
            ->disableOriginalConstructor()
            ->setMethods(['api'])
            ->getMock();

        $this->userApiMock = $this->getMockBuilder(User::class)
            ->disableOriginalConstructor()
            ->setMethods(['show'])
            ->getMock();

        $this->repoApiMock = $this->getMockBuilder(Repo::class)
            ->disableOriginalConstructor()
            ->setMethods(['show'])
            ->getMock();

        $this->clientMock->expects($this->any())
            ->method('api')
            ->will($this->returnValueMap([
                ['user', $this->userApiMock],
                ['repo', $this->repoApiMock]
            ]));
    }

    public function testGetNotExistingUser()
    {
        $username = 'dummyUser';
        $this->userApiMock->method('show')->willThrowException(new RuntimeException());
        $githubClient = new GithubClient($this->clientMock);

        $userData = $githubClient->getUserData($username);
        $this->assertEmpty($userData);
    }

    public function testGetExistingUser()
    {
        $username = 'kgruszowski';
        $this->userApiMock->method('show')->willReturn(['login' => 'kgruszowski', 'name' => 'Kamil Gruszowski']);
        $githubClient = new GithubClient($this->clientMock);

        $userData = $githubClient->getUserData($username);
        $this->assertEquals(['login' => 'kgruszowski', 'name' => 'Kamil Gruszowski'], $userData);
    }

    public function testGetNotExistingRepository()
    {
        $username = 'dummyUser';
        $repoName = 'dummyRepo';
        $this->repoApiMock->method('show')->willThrowException(new RuntimeException());
        $githubClient = new GithubClient($this->clientMock);

        $repoData = $githubClient->getRepositoryData($username, $repoName);
        $this->assertEmpty($repoData);
    }

    public function testGetExistingRepository()
    {
        $username = 'kgruszowski';
        $repoName = 'simplepy';
        $this->repoApiMock->method('show')->willReturn(['name' => 'simplepy', 'user' => 'kgruszowski']);
        $githubClient = new GithubClient($this->clientMock);

        $repoData = $githubClient->getRepositoryData($username, $repoName);
        $this->assertEquals(['name' => 'simplepy', 'user' => 'kgruszowski'], $repoData);
    }
}
