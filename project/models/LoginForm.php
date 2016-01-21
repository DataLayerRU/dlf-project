<?php

namespace project\models;

use PDO;
use pwf\Helpers;
use pwf\components\authorization\interfaces\Identity;

class LoginForm extends UserModel implements Identity
{
    public function login()
    {
        return $this->findByCredentials($this->getAttribute('email'), Helpers::hashString($this->getAttribute('password')))->getAttribute('id') > 0;
    }

    public function getAuthToken()
    {
        return Helpers::hashString($this->getAttribute('email') . $this->getAttribute('password'), 2);
    }

    public function getByAuthToken($token)
    {
        $this->setAttributes($this->getDB()->query('SELECT * FROM user WHERE MD5(MD5(CONCAT(`email`, `password`)))=:token',
            [
                ':token' => $token
            ])->fetch(PDO::FETCH_ASSOC));

        return $this;
    }

    public function getId()
    {
        return $this->getAttribute('id');
    }
}