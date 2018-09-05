<?php

namespace Tests\AppBundle\Utils\Comparison;

use AppBundle\Entity\Metric;
use AppBundle\Utils\Comparison\LessIsBetterComparator;
use PHPUnit\Framework\TestCase;

class LessIsBetterComparatorTest extends TestCase
{

    /**
     * @expectedException \AppBundle\Utils\Comparison\Exception\InvalidComparisonArgumentException
     */
    public function testInvalidArgument()
    {
        $issueComparator = new LessIsBetterComparator('issues');
        $issueComparator->compare('dummy', 2);
    }

    public function testValueAWinner()
    {
        $issueComparator = new LessIsBetterComparator('issues');
        $metric = $issueComparator->compare(10, 2);

        $this->assertInstanceOf(Metric::class, $metric);
        $this->assertEquals('issues', $metric->getMetricName());
        $this->assertEquals(1, $metric->getWinner());
    }

    public function testValueBWinner()
    {
        $issueComparator = new LessIsBetterComparator('issues');
        $metric = $issueComparator->compare(10, 20);

        $this->assertInstanceOf(Metric::class, $metric);
        $this->assertEquals('issues', $metric->getMetricName());
        $this->assertEquals(-1, $metric->getWinner());
    }

    public function testDraw()
    {
        $issueComparator = new LessIsBetterComparator('issues');
        $metric = $issueComparator->compare(10, 10);

        $this->assertInstanceOf(Metric::class, $metric);
        $this->assertEquals('issues', $metric->getMetricName());
        $this->assertEquals(0, $metric->getWinner());
    }

}
