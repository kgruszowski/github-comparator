<?php

namespace Tests\AppBundle\Service;

use AppBundle\Service\GithubRepositoryNameExtractor;
use PHPUnit\Framework\TestCase;

class GithubRepositoryNameExtractorTest extends TestCase
{

    public function testNullName()
    {
        $extractor = new GithubRepositoryNameExtractor();
        $username = $extractor->extractUsername(null);
        $repositoryName = $extractor->extractRepositoryName(null);

        $this->assertNull($username);
        $this->assertNull($repositoryName);
    }

    public function testDummyRepositoryName()
    {
        $extractor = new GithubRepositoryNameExtractor();
        $username = $extractor->extractUsername('dummy');
        $repositoryName = $extractor->extractRepositoryName('dummy');

        $this->assertNull($username);
        $this->assertNull($repositoryName);
    }

    public function testProperRepositoryName()
    {
        $extractor = new GithubRepositoryNameExtractor();
        $username = $extractor->extractUsername('kgruszowski/simplepy');
        $repositoryName = $extractor->extractRepositoryName('kgruszowski/simplepy');

        $this->assertEquals('kgruszowski', $username);
        $this->assertEquals('simplepy', $repositoryName);
    }
}
