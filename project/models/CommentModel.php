<?php

namespace project\models;

class CommentModel extends \dlf\basic\DBModel
{

    /**
     * @inheritdoc
     */
    public function getOne($primaryKeyValue)
    {
        $this->setAttributes($this->getDB()->query('SELECT * FROM comments WHERE id=:id',
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
            $result = $this->getDB()->exec('INSERT INTO comments (id_user, adate, username, body, id_post) VALUES (:id_user, :adate, :username, :body, :id_post)',
                [
                    ':id_user' => $this->getAttribute('id_user'),
                    ':adate' => $this->getAttribute('adate'),
                    ':username' => $this->getAttribute('username'),
                    ':body' => $this->getAttribute('body'),
                    ':id_post' => $this->getAttribute('id_post')
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
    public static function getAll(\dlf\components\dbconnection\interfaces\Connection $db)
    {
        $result = [];

        $rows = $db->query('SELECT * FROM comments')->fetchAll();

        foreach ($rows as $value) {
            $o = new CommentModel($db);
            $o->setAttributes($value);
            $result[] = $o;
        }

        return $result;
    }

    /**
     * Select comments by id_post field
     *
     * @param \dlf\components\dbconnection\interfaces\Connection $db
     * @param integer $postId
     *
     * @return array
     */
    public static function getAllByPostId(\dlf\components\dbconnection\interfaces\Connection $db, $postId)
    {
        $result = [];

        $rows = $db->query('SELECT * FROM comments WHERE id_post=:id_post', [
            ':id_post' => $postId
        ])->fetchAll();

        foreach ($rows as $value) {
            $o = new CommentModel($db);
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

        if (trim($this->getAttribute('body')) == '' || $this->getAttribute('id_post') == '') {
            $result = false;
        }

        return $result;
    }
}