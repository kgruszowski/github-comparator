<?php

namespace Tests\AppBundle\Service;

use AppBundle\Service\Client\GithubClient;
use Github\Api\User;
use Github\Client;
use Github\Exception\RuntimeException;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class GithubClientTest extends TestCase
{
    protected $clientMock;
    /** @var MockObject|User */
    protected $userApiMock;

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

        $this->clientMock->expects($this->any())
            ->method('api')
            ->will($this->returnValueMap([
                ['user', $this->userApiMock]
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
}
