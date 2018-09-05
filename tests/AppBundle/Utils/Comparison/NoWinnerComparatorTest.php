<?php

namespace Tests\AppBundle\Utils\Comparison;

use AppBundle\Entity\Metric;
use AppBundle\Utils\Comparison\NoWinnerComparator;
use PHPUnit\Framework\TestCase;

class NoWinnerComparatorTest extends TestCase
{

    public function testCreatedAtComparison()
    {
        $dateA = new \DateTime('2018-09-05 10:00:00');
        $dateB = new \DateTime('2018-06-19 15:00:00');

        $comparator = new NoWinnerComparator('createdAt');
        $metric = $comparator->compare($dateA, $dateB);

        $this->assertInstanceOf(Metric::class, $metric);
        $this->assertEquals('createdAt', $metric->getMetricName());
        $this->assertEquals($dateA, $metric->getValueA());
        $this->assertEquals($dateB, $metric->getValueB());
        $this->assertEquals(0, $metric->getWinner());
    }
}
