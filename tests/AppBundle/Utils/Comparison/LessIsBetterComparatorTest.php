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
        $issueComparator = new LessIsBetterComparator();
        $issueComparator->compare('dummy', 2);
    }

    public function testValueAWinner()
    {
        $issueComparator = new LessIsBetterComparator();
        $metric = $issueComparator->compare(10, 2);

        $this->assertInstanceOf(Metric::class, $metric);
        $this->assertEquals(1, $metric->getWinner());
    }

    public function testValueBWinner()
    {
        $issueComparator = new LessIsBetterComparator();
        $metric = $issueComparator->compare(10, 20);

        $this->assertInstanceOf(Metric::class, $metric);
        $this->assertEquals(-1, $metric->getWinner());
    }

    public function testDraw()
    {
        $issueComparator = new LessIsBetterComparator();
        $metric = $issueComparator->compare(10, 10);

        $this->assertInstanceOf(Metric::class, $metric);
        $this->assertEquals(0, $metric->getWinner());
    }

}
