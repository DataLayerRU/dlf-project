<?php

namespace project\models;

use PDO;
use pwf\Helpers;

class UserModel extends \pwf\basic\DBModel
{

    /**
     * @inheritdoc
     */
    public function getOne($primaryKeyValue)
    {
        $this->setAttributes($this->getDB()->query('SELECT * FROM user WHERE id=:id',
            [
                ':id' => $primaryKeyValue
            ])->fetch(PDO::FETCH_ASSOC));

        return $this;
    }

    /**
     * Find profile by login and password
     *
     * @param string $login
     * @param string $password
     * @return UserModel $this
     */
    public function findByCredentials($login, $password)
    {
        $this->setAttributes($this->getDB()->query('SELECT * FROM user WHERE email=:email AND password=:password',
            [
                ':email' => $login,
                ':password' => $password
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
            $this->setAttribute('password',
                Helpers::hashString($this->getAttribute('password')));
            $result = $this->getDB()->exec('INSERT INTO user (email, password, username) VALUES (:email, :password, :username)',
                    [
                        ':email' => $this->getAttribute('email'),
                        ':password' => $this->getAttribute('password'),
                        ':username' => $this->getAttribute('username')
                    ]) > 0;
        }

        return $result;
    }

    /**
     * @inheritdoc
     */
    public static function getAll(\pwf\components\dbconnection\interfaces\Connection $db)
    {
        $result = [];

        $rows = $db->query('SELECT * FROM user')->fetchAll();

        foreach ($rows as $value) {
            $o = new UserModel($db);
            $o->setAttributes($value);
            $result[] = $o;
        }

        return $result;
    }

    /**
     *
     * @param type $attributes
     * @return boolean
     */
    public function validate($attributes = [])
    {
        $result = true;

        if (count($attributes) > 0) {
            $this->appendAttributes($attributes);
        }

        if (!$this->attributeExists('username') || !$this->attributeExists('email')
            || !$this->attributeExists('password')
        ) {
            $result = false;
        }

        return !$this->hasErrors();
    }
}