<?php

namespace Engtuncay\Phputils\pdo;

class FiConnConfig
{
    private ?string $serverName;
    private ?string $dbName;
    private ?string $userName;
    private ?string $userPass;

    /**
     * @return mixed
     */
    public function getServerName()
    {
        return $this->serverName;
    }

    /**
     * @param mixed $hostname
     */
    public function setServerName($hostname): void
    {
        $this->serverName = $hostname;
    }

    /**
     * @return mixed
     */
    public function getDbName()
    {
        return $this->dbName;
    }

    /**
     * @param mixed $dbname
     */
    public function setDbName($dbname): void
    {
        $this->dbName = $dbname;
    }

    /**
     * @return mixed
     */
    public function getUserName(): ?string
    {
        return $this->userName;
    }

    /**
     * @param mixed $username
     */
    public function setUserName($username): void
    {
        $this->userName = $username;
    }

    public function getUserPass(): ?string
    {
        return $this->userPass;
    }

    /**
     * @param mixed $userPass
     */
    public function setUserPass($userPass): void
    {
        $this->userPass = $userPass;
    }

}