<?php

namespace Blog\Bdd;

class Table
{
    /**
     * @param $field
     * @param $value
     * @return mixed
     */
    public function getOne($field, $value)
    {
        $data = $this->MySQL->getPDO()->query("SELECT * FROM ".$this->tableName." WHERE ".$field." = '".$value."' LIMIT 1");
        if ($data) {
            return $this->normalize($data->fetch());
        }

        return null;
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

    /**
     * @return array
     */
    public function getAll()
    {
        $data = $this->MySQL->getPDO()->prepare("SELECT * FROM ".$this->tableName);
        $data->execute();

        $entities = [];
        foreach ($data->fetchAll() as $entity)
            $entities[] = $this->normalize($entity);

        return $entities;
    }

    /**
     * @param $field
     * @param $value
     * @return mixed
     */
    public function findBy($field, $value)
    {
        $data = $this->MySQL->getPDO()->prepare("SELECT * FROM ".$this->tableName." WHERE ".$field." LIKE CONCAT('%',:search,'%')");
        $data->bindParam(":search", $value);
        $data->execute();

        $entities = [];
        foreach ($data->fetchAll() as $entity)
            $entities[] = $this->normalize($entity);

        return $entities;
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
