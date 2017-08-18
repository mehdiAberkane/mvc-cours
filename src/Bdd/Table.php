<?php

namespace Blog\Bdd;

use src\Entity\Post;

class Table
{
    /**
     * @var MySQL
     */
    private $MySQL;

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

        return $this->normalize($data->fetch());
    }

    /**
     * @return mixed
     */
    public function create()
    {
        $data = $this->MySQL->getPDO()->prepare("INSERT INTO ".$this->tableName."(title, content) VALUES (:title, :content)");

        $data->execute([
            "title" => $this->getTitle(),
            "content" => $this->getContent(),
        ]);

        return "Post créer";
    }

    public function update()
    {
        $data = $this->MySQL->getPDO()->prepare("UPDATE ".$this->tableName." SET title = :title, content = :content WHERE id = :id");
        $data->execute([
            "id" => 2,
            "title" => $this->getTitle(),
            "content" => $this->getContent(),
        ]);

        return "Post modifier";
    }

    public function delete()
    {
        $data = $this->MySQL->getPDO()->prepare("DELETE FROM ".$this->tableName." WHERE id = :id");
        $data->execute(["id" => $this->getId()]);

        return "post delete";
    }

    public function __construct()
    {
        $this->MySQL = MySQL::init();
    }
}
