<?php

namespace src\Entity;
use Blog\Bdd\TableInterface;
use Blog\Bdd\TableUser;

/**
 * Class User
 * @package src\Entity
 */
class User extends TableUser implements TableInterface
{
    /**
     * @var Integer $id
     */
    private $id;

    /**
     * @var String $pseudo
     */
    private $pseudo;

    /**
     * @var String $password
     */
    private $password;

    /**
     * @var String $salt
     */
    private $salt;

    /**
     * @var String $active
     */
    private $active;

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
        $this->active = true;
        $this->salt = uniqid(mt_rand(), true);
        $this->tableName = "user";
    }

    /**
     * @param $pseudo
     * @param $password
     * @return bool
     */
    public function login($pseudo, $password)
    {
        $user = $this->getOne("pseudo", $pseudo);
        if ($user instanceof User) {
            if ($user->encryptePassword($password) == $user->getPassword()) {
                $_SESSION['login'] = $user->getPseudo();
                $_SESSION['id'] = $user->getId();

                return true;
            }
        }
        return false;
    }

    protected function encryptePassword($password)
    {
        return hash("ripemd160", md5($this->salt.$password));
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
