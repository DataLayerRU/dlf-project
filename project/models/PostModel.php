<?php

namespace project\models;

use PDO;

class PostModel extends \pwf\basic\DBModel
{

    /**
     * @inheritdoc
     */
    public function getOne($primaryKeyValue)
    {
        $this->setAttributes($this->getDB()->query('SELECT * FROM post WHERE id=:id',
            [
                'id' => $primaryKeyValue
            ])->fetch(PDO::FETCH_ASSOC));

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function save()
    {
        $result = false;
        if ($this->validate()) {
            $result = $this->getDB()->exec('INSERT INTO post (id_user, adate, name, description, body, description_tag, keywords_tag) VALUES (:id_user, :adate, :name, :description, :body, :description_tag, :keywords_tag)',
                [
                    ':id_user' => $this->getAttribute('id_user'),
                    ':adate' => $this->getAttribute('adate'),
                    ':name' => $this->getAttribute('name'),
                    ':description' => $this->getAttribute('description'),
                    ':body' => $this->getAttribute('body'),
                    ':description_tag' => $this->getAttribute('description_tag'),
                    ':keywords_tag' => $this->getAttribute('keywords_tag')
                ]);
            if ($result !== false) {
                $this->setAttribute('id', $this->getDB()->insertId());
            }
        }

        return $result;
    }

    /**
     * @inheritdoc
     */
    public static function getAll(\pwf\components\dbconnection\interfaces\Connection $db)
    {
        $result = [];

        $rows = $db->query('SELECT * FROM post')->fetchAll();

        foreach ($rows as $value) {
            $o = new PostModel($db);
            $o->setAttributes($value);
            $result[] = $o;
        }

        return $result;
    }

    public function validate($attributes = array())
    {
        $result = true;

        if (count($attributes) > 0) {
            $this->appendAttributes($attributes);
        }

        if (trim($this->getAttribute('name')) == '' || trim($this->getAttribute('description')) == '' || trim($this->getAttribute('body')) == '') {
            $result = false;
        }

        return $result;
    }
}