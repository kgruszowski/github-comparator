<?php

namespace AppBundle\Service;

use AppBundle\Entity\Repository;
use AppBundle\Utils\Comparison\ComparisonBuilder;

class ComparatorService
{
    protected $repositoryA;
    protected $repositoryB;

    public function compare(Repository $repositoryA, Repository $repositoryB)
    {
        $builder = new ComparisonBuilder();
        $comparison = $builder->addRepositories($repositoryA, $repositoryB)
            ->addMetric('stars', $repositoryA->getNumOfStars(), $repositoryB->getNumOfStars())
            ->addMetric('issues', $repositoryA->getNumOfOpenIssues(), $repositoryB->getNumOfOpenIssues())
            ->compare()
    }

}