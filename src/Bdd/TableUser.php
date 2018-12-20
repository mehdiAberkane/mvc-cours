<?php

namespace Blog\Bdd;

use League\Event\Emitter;
use League\Event\Event;
use src\Entity\User;

/**
 * Class TableUser
 * @package Blog\Bdd
 */
class TableUser extends Table implements TableInterface
{
    /**
     * @var MySQL
     */
    protected $MySQL;

    /**
     * @param $data
     * @return User
     */
    public function normalize($data)
    {
        $class = new User();
        $class->setId($data["id"]);
        $class->setPseudo($data["pseudo"]);
        $class->setPassword($data["password"]);
        $class->setSalt($data["salt"]);
        $class->setActive($data["active"]);

        return $class;
    }

    /**
     * @return mixed
     */
    public function create()
    {
        $emitter = new Emitter();

        $emitter->addListener('create', function (Event $event) {
            $this->createdEvent();
        });

        $emitter->emit("create");
	$data = $this->MySQL->getPDO()->prepare("INSERT INTO ".$this->tableName."(pseudo, password, salt) VALUES (:pseudo, :password, :salt)");



        $data->execute([
            "pseudo" => $this->getPseudo(),
            "password" => $this->getPassword(),
            "salt" => $this->getSalt(),
        ]);

        return "User créer";
    }

    public function update()
    {

    }

    public function delete()
    {
        $data = $this->MySQL->getPDO()->prepare("DELETE FROM ".$this->tableName." WHERE id = :id");
        $data->execute(["id" => $this->getId()]);

        return "user delete";
    }

    public function __construct()
    {
        $this->MySQL = MySQL::init();
    }

    public function createdEvent()
    {
        $this->setPassword($this->encryptePassword($this->getPassword()));
    }

    public function updatedEvent()
    {

    }
}
