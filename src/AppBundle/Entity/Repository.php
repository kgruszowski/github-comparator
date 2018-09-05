<?php

namespace AppBundle\Entity;

class Repository
{
    /** @var int $id */
    protected $id;

    /** @var string $name */
    protected $name;

    /** @var string $fullName */
    protected $fullName;

    /** @var User $user */
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

    /** @var int $numOfOpenIssues */
    protected $numOfOpenIssues;

    /** @var \DateTime $createdAt */
    protected $createdAt;

    /** @var \DateTime $updatedAt*/
    protected $updatedAt;

    /** @var bool $private */
    protected $private;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Repository
     */
    public function setId(int $id): Repository
    {
        $this->id = $id;
        return $this;
    }

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
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return Repository
     */
    public function setUser(User $user): Repository
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
     * @return int
     */
    public function getNumOfOpenIssues(): int
    {
        return $this->numOfOpenIssues;
    }

    /**
     * @param int $numOfOpenIssues
     * @return Repository
     */
    public function setNumOfOpenIssues(int $numOfOpenIssues): Repository
    {
        $this->numOfOpenIssues = $numOfOpenIssues;
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
     * @param string $createdAt
     * @return Repository
     */
    public function setCreatedAt(string $createdAt): Repository
    {
        $createdAtDateTime = new \DateTime($createdAt);
        $this->createdAt = $createdAtDateTime;
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
     * @param string $updatedAt
     * @return Repository
     */
    public function setUpdatedAt(string $updatedAt): Repository
    {
        $updatedAtDateTime = new \DateTime($updatedAt);
        $this->updatedAt = $updatedAtDateTime;
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