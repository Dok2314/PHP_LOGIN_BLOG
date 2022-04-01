<?php

namespace application\connect;
use application\connect\Database;

class Password extends Database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function recoverPass($email)
    {
        $connect = $this->connect;
        if(empty($email)) {
            $_SESSION['errors'] = 'Email required!';
            return false;
        }

        $findUser = $this->selectOne('users', ['email' => $email]);

        if(!$findUser)
        {
            $_SESSION['errors'] = 'Email not found!';
            return false;
        }

        $expire = time() + 60;
        $hash = md5($expire . $email);

        $params = [
            'hash' => $hash,
            'expire' => $expire,
            'email' => $email,
        ];

        $res = $this->insert('recover', $params);

        if($res) {
            //Отправить письмо
            return true;
        }else{
            echo 'Error.Try later, please.';
            return false;
        }
    }
}