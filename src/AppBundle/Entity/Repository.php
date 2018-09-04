<?php

namespace AppBundle\Entity;

class Repository
{

    /** @var string $name */
    protected $name;

    /** @var string $fullName */
    protected $fullName;

    /** @var string $user */
    protected $user;

    /** @var string $url */
    protected $url;

    /** @var string $language */
    protected $language;

    /** @var int $numOfStars */
    protected $numOfStars;

    /** @var int $numOfWatchers */
    protected $numOfWatchers;

    /** @var $numOfForks */
    protected $numOfForks;

    /** @var \DateTime $createdAt */
    protected $createdAt;

    /** @var \DateTime $updatedAt*/
    protected $updatedAt;

    /** @var bool $private */
    protected $private;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Repository
     */
    public function setName(string $name): Repository
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->fullName;
    }

    /**
     * @param string $fullName
     * @return Repository
     */
    public function setFullName(string $fullName): Repository
    {
        $this->fullName = $fullName;
        return $this;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @param string $user
     * @return Repository
     */
    public function setUser(string $user): Repository
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Repository
     */
    public function setUrl(string $url): Repository
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @param string $language
     * @return Repository
     */
    public function setLanguage(string $language): Repository
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumOfStars(): int
    {
        return $this->numOfStars;
    }

    /**
     * @param int $numOfStars
     * @return Repository
     */
    public function setNumOfStars(int $numOfStars): Repository
    {
        $this->numOfStars = $numOfStars;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumOfWatchers(): int
    {
        return $this->numOfWatchers;
    }

    /**
     * @param int $numOfWatchers
     * @return Repository
     */
    public function setNumOfWatchers(int $numOfWatchers): Repository
    {
        $this->numOfWatchers = $numOfWatchers;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumOfForks()
    {
        return $this->numOfForks;
    }

    /**
     * @param mixed $numOfForks
     * @return Repository
     */
    public function setNumOfForks($numOfForks)
    {
        $this->numOfForks = $numOfForks;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return Repository
     */
    public function setCreatedAt(\DateTime $createdAt): Repository
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     * @return Repository
     */
    public function setUpdatedAt(\DateTime $updatedAt): Repository
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return bool
     */
    public function isPrivate(): bool
    {
        return $this->private;
    }

    /**
     * @param bool $private
     * @return Repository
     */
    public function setPrivate(bool $private): Repository
    {
        $this->private = $private;
        return $this;
    }
}