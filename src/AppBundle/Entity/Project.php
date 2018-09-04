<?php

namespace AppBundle\Entity;

class Project
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
     * @return Project
     */
    public function setName(string $name): Project
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
     * @return Project
     */
    public function setFullName(string $fullName): Project
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
     * @return Project
     */
    public function setUser(string $user): Project
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
     * @return Project
     */
    public function setUrl(string $url): Project
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
     * @return Project
     */
    public function setLanguage(string $language): Project
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
     * @return Project
     */
    public function setNumOfStars(int $numOfStars): Project
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
     * @return Project
     */
    public function setNumOfWatchers(int $numOfWatchers): Project
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
     * @return Project
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
     * @return Project
     */
    public function setCreatedAt(\DateTime $createdAt): Project
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
     * @return Project
     */
    public function setUpdatedAt(\DateTime $updatedAt): Project
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
     * @return Project
     */
    public function setPrivate(bool $private): Project
    {
        $this->private = $private;
        return $this;
    }
}