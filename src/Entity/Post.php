<?php

namespace src\Entity;

use Blog\Bdd\Table;

/**
 * Class Post
 * @package src\Entity
 */
class Post extends Table
{
    /**
     * @var Integer $id
     */
    private $id;

    /**
     * @var String $title
     */
    private $title;

    /**
     * @var String $content
     */
    private $content;

    /**
     * @var \DateTime $dateCreated
     */
    private $dateCreated;

    /**
     * @var User $user
     */
    private $user;

    /**
     * @var string $tableName
     */
    protected $tableName;

    /**
     * Post constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->dateCreated = New \DateTime();
        $this->tableName = "post";
    }

    protected function normalize($data)
    {
        $class = new Post();
        $class->setId($data[0]);
        $class->setTitle($data[1]);
        $class->setContent($data[2]);
        $class->setDateCreated($data[3]);

        return $class;
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
     * @return Post
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
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
     * @return Post
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     * @return Post
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     * @return Post
     */
    public function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }
}
