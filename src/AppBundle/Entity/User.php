<?php

namespace AppBundle\Entity;

class User
{
    /** @var string $login */
    protected $login;

    /** @var string $name */
    protected $name;

    /** @var string $url */
    protected $url;

    /** @var ?string $company */
    protected $company;

    /** @var int $numOfRepos */
    protected $numOfRepos;

    /** @var int $numOfFollowers */
    protected $numOfFollowers;

    /** @var int $numOfFollowing */
    protected $numOfFollowing;

    /** @var \DateTime $createdAt */
    protected $createdAt;

    /** @var \DateTime $updatedAt */
    protected $updatedAt;

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @param string $login
     * @return User
     */
    public function setLogin(string $login): User
    {
        $this->login = $login;
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
     * @return User
     */
    public function setName(string $name): User
    {
        $this->name = $name;
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
     * @return User
     */
    public function setUrl(string $url): User
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }

    /**
     * @param mixed $company
     * @return User
     */
    public function setCompany(?string $company)
    {
        $this->company = $company;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumOfRepos(): int
    {
        return $this->numOfRepos;
    }

    /**
     * @param int $numOfRepos
     * @return User
     */
    public function setNumOfRepos(int $numOfRepos): User
    {
        $this->numOfRepos = $numOfRepos;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumOfFollowers(): int
    {
        return $this->numOfFollowers;
    }

    /**
     * @param int $numOfFollowers
     * @return User
     */
    public function setNumOfFollowers(int $numOfFollowers): User
    {
        $this->numOfFollowers = $numOfFollowers;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumOfFollowing(): int
    {
        return $this->numOfFollowing;
    }

    /**
     * @param int $numOfFollowing
     * @return User
     */
    public function setNumOfFollowing(int $numOfFollowing): User
    {
        $this->numOfFollowing = $numOfFollowing;
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
     * @return User
     */
    public function setCreatedAt(\DateTime $createdAt): User
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
     * @return User
     */
    public function setUpdatedAt(\DateTime $updatedAt): User
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}