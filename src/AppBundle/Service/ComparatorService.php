<?php

namespace AppBundle\Service;

use AppBundle\Entity\Comparison;
use AppBundle\Entity\Repository;
use AppBundle\Utils\Comparison\ComparisonBuilder;

class ComparatorService
{
    protected $repositoryA;
    protected $repositoryB;

    public function compare(Repository $repositoryA, Repository $repositoryB): Comparison
    {
        $builder = new ComparisonBuilder();
        $comparison = $builder->addRepositories($repositoryA, $repositoryB)
            ->addMetric('stars', $repositoryA->getNumOfStars(), $repositoryB->getNumOfStars())
            ->addMetric('forks', $repositoryA->getNumOfForks(), $repositoryB->getNumOfForks())
            ->addMetric('watchers', $repositoryA->getNumOfWatchers(), $repositoryB->getNumOfWatchers())
            ->addMetric('issues', $repositoryA->getNumOfOpenIssues(), $repositoryB->getNumOfOpenIssues())
            ->addMetric('createdAt', $repositoryA->getCreatedAt(), $repositoryB->getCreatedAt())
            ->addMetric('updatedAt', $repositoryA->getUpdatedAt(), $repositoryB->getUpdatedAt())
            ->buildComparison();

        return $comparison;
    }

}
