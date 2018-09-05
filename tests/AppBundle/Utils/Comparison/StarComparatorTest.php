<?php

namespace Tests\AppBundle\Utils\Comparison;

use AppBundle\Entity\Metric;
use AppBundle\Utils\Comparison\StarComparator;
use PHPUnit\Framework\TestCase;

class StarComparatorTest extends TestCase
{

    /**
     * @expectedException \AppBundle\Utils\Comparison\Exception\InvalidComparisonArgumentException
     */
    public function testInvalidArgument()
    {
        $starComparator = new StarComparator();
        $starComparator->compare('dummy', 2);
    }

    public function testValueAWinner()
    {
        $starComparator = new StarComparator();
        $metric = $starComparator->compare(10, 2);

        $this->assertInstanceOf(Metric::class, $metric);
        $this->assertEquals(1, $metric->getWinner());
    }

    public function testValueBWinner()
    {
        $starComparator = new StarComparator();
        $metric = $starComparator->compare(10, 20);

        $this->assertInstanceOf(Metric::class, $metric);
        $this->assertEquals(-1, $metric->getWinner());
    }

    public function testDraw()
    {
        $starComparator = new StarComparator();
        $metric = $starComparator->compare(10, 10);

        $this->assertInstanceOf(Metric::class, $metric);
        $this->assertEquals(0, $metric->getWinner());
    }

}
