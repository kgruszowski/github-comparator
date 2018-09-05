<?php

namespace AppBundle\Utils\Comparison;

use AppBundle\Entity\Metric;

interface ComparatorInterface
{
    public function compare($valueA, $valueB): Metric;
}