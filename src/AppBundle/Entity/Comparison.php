<?php

namespace AppBundle\Entity;

class Comparison
{

    /** @var Repository $repositoryA */
    protected $repositoryA;

    /** @var Repository $repositoryB */
    protected $repositoryB;

    /** @var int $numOfWinRepositoryA */
    protected $numOfWinRepositoryA;

    /** @var int $numOfWinRepositoryB */
    protected $numOfWinRepositoryB;

    /** @var int $numOfDraw */
    protected $numOfDraw;

    /** @var array $metricCollection */
    protected $metricCollection;

    /** @var string $winner */
    protected $winner;

    public function __construct()
    {
        $this->numOfWinRepositoryA = 0;
        $this->numOfWinRepositoryB = 0;
        $this->numOfDraw = 0;
        $this->metricCollection = [];
    }

    /**
     * @return Repository
     */
    public function getRepositoryA(): Repository
    {
        return $this->repositoryA;
    }

    /**
     * @param Repository $repositoryA
     * @return Comparison
     */
    public function setRepositoryA(Repository $repositoryA): Comparison
    {
        $this->repositoryA = $repositoryA;
        return $this;
    }

    /**
     * @return Repository
     */
    public function getRepositoryB(): Repository
    {
        return $this->repositoryB;
    }

    /**
     * @param Repository $repositoryB
     * @return Comparison
     */
    public function setRepositoryB(Repository $repositoryB): Comparison
    {
        $this->repositoryB = $repositoryB;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumOfWinRepositoryA(): int
    {
        return $this->numOfWinRepositoryA;
    }

    /**
     * @param int $numOfWinRepositoryA
     * @return Comparison
     */
    public function setNumOfWinRepositoryA(int $numOfWinRepositoryA): Comparison
    {
        $this->numOfWinRepositoryA = $numOfWinRepositoryA;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumOfWinRepositoryB(): int
    {
        return $this->numOfWinRepositoryB;
    }

    /**
     * @param int $numOfWinRepositoryB
     * @return Comparison
     */
    public function setNumOfWinRepositoryB(int $numOfWinRepositoryB): Comparison
    {
        $this->numOfWinRepositoryB = $numOfWinRepositoryB;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumOfDraw(): int
    {
        return $this->numOfDraw;
    }

    /**
     * @param int $numOfDraw
     * @return Comparison
     */
    public function setNumOfDraw(int $numOfDraw): Comparison
    {
        $this->numOfDraw = $numOfDraw;
        return $this;
    }

    /**
     * @return array
     */
    public function getMetricCollection(): array
    {
        return $this->metricCollection;
    }

    /**
     * @param array $metricCollection
     * @return Comparison
     */
    public function setMetricCollection(array $metricCollection): Comparison
    {
        $this->metricCollection = $metricCollection;
        return $this;
    }

    public function incrementNumOfWinRepositoryA()
    {
        $this->numOfWinRepositoryA++;
    }

    public function incrementNumOfWinRepositoryB()
    {
        $this->numOfWinRepositoryB++;
    }

    public function incrementNumOfDraw()
    {
        $this->numOfDraw++;
    }

    /**
     * @return $this
     */
    public function setWinner(): Comparison
    {
        $this->winner = null;

        if ($this->getNumOfWinRepositoryA() > $this->getNumOfWinRepositoryB()) {
            $this->winner = $this->repositoryA->getFullName();
        } elseif ($this->getNumOfWinRepositoryA() < $this->getNumOfWinRepositoryB()) {
            $this->winner = $this->repositoryB->getFullName();
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getWinner(): string
    {
        return $this->winner;
    }
}
