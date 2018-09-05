<?php

namespace Tests\AppBundle\Utils\Comparison;

use AppBundle\Entity\Metric;
use AppBundle\Utils\Comparison\MoreIsBetterComparator;
use PHPUnit\Framework\TestCase;

class MoreIsBetterComparatorTest extends TestCase
{

    /**
     * @expectedException \AppBundle\Utils\Comparison\Exception\InvalidComparisonArgumentException
     */
    public function testInvalidArgument()
    {
        $starComparator = new MoreIsBetterComparator('stars');
        $starComparator->compare('dummy', 2);
    }

    public function testValueAWinner()
    {
        $starComparator = new MoreIsBetterComparator('stars');
        $metric = $starComparator->compare(10, 2);

        $this->assertInstanceOf(Metric::class, $metric);
        $this->assertEquals('stars', $metric->getMetricName());
        $this->assertEquals(-1, $metric->getWinner());
    }

    public function testValueBWinner()
    {
        $starComparator = new MoreIsBetterComparator('stars');
        $metric = $starComparator->compare(10, 20);

        $this->assertInstanceOf(Metric::class, $metric);
        $this->assertEquals('stars', $metric->getMetricName());
        $this->assertEquals(1, $metric->getWinner());
    }

    public function testDraw()
    {
        $starComparator = new MoreIsBetterComparator('stars');
        $metric = $starComparator->compare(10, 10);

        $this->assertInstanceOf(Metric::class, $metric);
        $this->assertEquals('stars', $metric->getMetricName());
        $this->assertEquals(0, $metric->getWinner());
    }

}
