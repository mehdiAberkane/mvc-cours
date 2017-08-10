<?php

namespace src\Entity;

/**
 * Class Post
 * @package src\Entity
 */
class User
{
    /**
     * @var Integer $id
     */
    private $id;

    /**
     * @var String $title
     */
    private $pseudo;

    /**
     * @var String $content
     */
    private $password;

    /**
     * @var String $salt
     */
    private $salt;

    /**
     * @var \DateTime $dateCreated
     */
    private $dateCreated;

    /**
     * @var String $role
     */
    private $role;

    /**
     * @var String $active
     */
    private $active;

    /**
     * Post constructor.
     */
    public function __construct()
    {
        $this->dateCreated = New \DateTime();
        $this->active = true;
        $this->salt = uniqid(mt_rand(), true);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return String
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param String $pseudo
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return String
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param String $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return String
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @param String $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    /**
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @param \DateTime $dateCreated
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    /**
     * @return String
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param String $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return String
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param String $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }


}
