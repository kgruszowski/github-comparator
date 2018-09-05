<?php

namespace AppBundle\Entity;

class Metric
{

    /** @var string $metricName */
    protected $metricName;
    /** @var mixed $valueA */
    protected $valueA;
    /** @var mixed $valueB */
    protected $valueB;
    /** @var int $winner */
    protected $winner;

    /**
     * @return string
     */
    public function getMetricName(): string
    {
        return $this->metricName;
    }

    /**
     * @param string $metricName
     * @return Metric
     */
    public function setMetricName(string $metricName): Metric
    {
        $this->metricName = $metricName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValueA()
    {
        return $this->valueA;
    }

    /**
     * @param mixed $valueA
     * @return Metric
     */
    public function setValueA($valueA): Metric
    {
        $this->valueA = $valueA;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValueB()
    {
        return $this->valueB;
    }

    /**
     * @param mixed $valueB
     * @return Metric
     */
    public function setValueB($valueB): Metric
    {
        $this->valueB = $valueB;
        return $this;
    }

    /**
     * @return int
     */
    public function getWinner(): int
    {
        return $this->winner;
    }

    /**
     * @param int $winner
     * @return Metric
     */
    public function setWinner(int $winner): Metric
    {
        $this->winner = $winner;
        return $this;
    }
}
