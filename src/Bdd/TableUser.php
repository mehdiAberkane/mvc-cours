<?php

namespace Blog\Bdd;

use League\Event\Emitter;
use League\Event\Event;
use src\Entity\User;

class TableUser implements TableInterface
{
    /**
     * @var MySQL
     */
    private $MySQL;

    public function createdEvent()
    {
        $this->setPassword($this->encryptePassword($this->getPassword()));
    }

    public function updatedEvent()
    {

    }

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
     * @param $field
     * @param $value
     * @return mixed
     */
    public function getOne($field, $value)
    {
        $data = $this->MySQL->getPDO()->prepare("SELECT * FROM ".$this->tableName." WHERE ".$field." = (:".$field.") LIMIT 1");
        $data->bindParam(":".$field, $value);
        $data->execute();


        return $this->normalize($data->fetch());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getOneById($id)
    {
        $data = $this->MySQL->getPDO()->prepare("SELECT * FROM ".$this->tableName." WHERE id = (:id) LIMIT 1");
        $data->bindParam(":id", $id, \PDO::PARAM_INT);
        $data->execute();

        return $this->normalize($data->fetch());
    }

    public function getAll()
    {
        $data = $this->MySQL->getPDO()->prepare("SELECT * FROM ".$this->tableName);
        $data->execute();

        $users = [];
        foreach ($data->fetchAll() as $user)
            $users[] = $this->normalize($user);

        return $users;
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
}
