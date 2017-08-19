<?php

namespace Blog\Bdd;

use League\Event\Emitter;
use League\Event\Event;
use src\Entity\Post;

class Table
{
    /**
     * @var MySQL
     */
    private $MySQL;

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

        $posts = [];
        foreach ($data->fetchAll() as $post)
            $posts[] = $this->normalize($post);

        return $posts;
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

        $data = $this->MySQL->getPDO()->prepare("INSERT INTO ".$this->tableName."(title, content, slug) VALUES (:title, :content, :slug)");

        $data->execute([
            "title" => $this->getTitle(),
            "content" => $this->getContent(),
            "slug" => $this->getSlug(),
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

    /**
     * @param $str
     * @return mixed|string
     */
    protected function slugit($str) {
        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
        $clean = strtolower(trim($clean, '-'));
        $clean = preg_replace("/[\/_|+ -]+/", "-", $clean);

        return $clean;
    }
}
