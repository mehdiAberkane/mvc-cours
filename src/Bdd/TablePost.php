<?php

namespace Blog\Bdd;

use League\Event\Emitter;
use League\Event\Event;
use src\Entity\Post;

/**
 * Class TablePost
 * @package Blog\Bdd
 */
class TablePost extends Table implements TableInterface
{
    /**
     * @var MySQL $MySQL
     */
    protected $MySQL;

    /**
     * @param array $data
     * @return Post
     */
    public function normalize($data)
    {
        $class = new Post();

        $class->setId($data["id"]);
        $class->setTitle($data["title"]);
        $class->setSlug($data["slug"]);
        $class->setContent($data["content"]);
        $class->setDateCreated($data["date_created"]);

        return $class;
    }

    protected function generateSlug()
    {
        $slug = $this->slugit($this->getTitle());
        $this->setSlug($slug);
    }

    public function createdEvent()
    {
        $this->generateSlug();
    }

    public function updatedEvent()
    {
        $this->generateSlug();
    }

    /**
     * @return mixed
     */
    public function create()
    {
        $create = $this->MySQL->getPDO()->prepare("CREATE table if not exist ".$this->tableName."(ID title, content varchar, slug varchar, )");


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

    /**
     * @return string
     */
    public function update()
    {
        $data = $this->MySQL->getPDO()->prepare("UPDATE ".$this->tableName." SET title = :title, content = :content WHERE id = :id");

        $data->execute([
            "id" => $this->getId(),
            "title" => $this->getTitle(),
            "content" => $this->getContent(),
        ]);

        return "Post modifier";
    }

    /**
     * @return string
     */
    public function delete()
    {
        $data = $this->MySQL->getPDO()->prepare("DELETE FROM ".$this->tableName." WHERE id = :id");
        $data->execute(["id" => $this->getId()]);

        return "post delete";
    }

    /**
     * TablePost constructor.
     */
    public function __construct()
    {
        $this->MySQL = MySQL::init();
    }

}
