<?php

namespace Tests\AppBundle\Utils\Comparison;

use AppBundle\Entity\Metric;
use AppBundle\Utils\Comparison\IssueComparator;
use PHPUnit\Framework\TestCase;

class IssueComparatorTest extends TestCase
{

    /**
     * @expectedException \AppBundle\Utils\Comparison\Exception\InvalidComparisonArgumentException
     */
    public function testInvalidArgument()
    {
        $issueComparator = new IssueComparator();
        $issueComparator->compare('dummy', 2);
    }

    public function testValueAWinner()
    {
        $issueComparator = new IssueComparator();
        $metric = $issueComparator->compare(10, 2);

        $this->assertInstanceOf(Metric::class, $metric);
        $this->assertEquals(1, $metric->getWinner());
    }

    public function testValueBWinner()
    {
        $issueComparator = new IssueComparator();
        $metric = $issueComparator->compare(10, 20);

        $this->assertInstanceOf(Metric::class, $metric);
        $this->assertEquals(-1, $metric->getWinner());
    }

    public function testDraw()
    {
        $issueComparator = new IssueComparator();
        $metric = $issueComparator->compare(10, 10);

        $this->assertInstanceOf(Metric::class, $metric);
        $this->assertEquals(0, $metric->getWinner());
    }

}
