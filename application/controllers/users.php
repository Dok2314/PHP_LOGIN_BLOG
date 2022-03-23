<?php

use application\connect\Database;
include "core.php";

$db = new Database();
$errMess = '';

function registerUser($user)
{
    $_SESSION['id']       = $user['id'];
    $_SESSION['name']     = $user['username'];
    $_SESSION['is_admin'] = $user['is_admin'];
    if($_SESSION['is_admin'] == 1){
        header('Location: '.'admin.php');
    }else{
        header('Location: '.'/');
    }
}

//Регистрация
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add-user']))
{
    $username = trim($_POST['name']);
    $email    = trim($_POST['email']);
    $passF    = trim($_POST['pass-first']);
    $passS    = trim($_POST['pass-second']);

    if(empty($username) || empty($email) || empty($passF))
    {
        $errMess = 'Не все поля заполнены!';
    }elseif(mb_strlen($email, "UTF-8") < 7){
        $errMess = 'Поле email должно быть больше 7 символов!';
    }elseif($passF !== $passS){
        $errMess = 'Пароли не совпадают!';
    }else{
        $existence = $db->selectOne('users', ['email' => $email]);
        if($existence){
            $errMess = 'Данный пользователь уже существует!';
        }else{
            $pass = password_hash($passF, PASSWORD_DEFAULT);
            $user = [
              'is_admin' => 0,
              'username' => $username,
              'email'    => $email,
              'password' => $pass
            ];
            $id = $db->insert('users', $user);
            $findedUser = $db->selectOne('users', ['id' => $id]);
            registerUser($findedUser);
        }
    }
}


function loginUser($existence)
{
    $_SESSION['id']       = $existence['id'];
    $_SESSION['name']     = $existence['username'];
    $_SESSION['is_admin'] = $existence['is_admin'];
    if($_SESSION['is_admin'] == 1){
        header('Location: '.'admin.php');
    }else{
        header('Location: '.'/');
    }
}

//Логин
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login-user']))
{
    $email    = trim($_POST['email']);
    $password = $_POST['pass'];

    if(empty($email) || empty($password)){
        $errMess = 'Не все поля заполнены!';
    }else{
        $existence = $db->selectOne('users',['email' => $email]);
        if($existence !== false){
            $bdPass = $existence['password'];
            if(password_verify($password, $bdPass)) {
                loginUser($existence);
            } else {
                $errMess = 'Вы ввели некоректные данные!';
            }
        }else{
            $errMess = 'Такого пользователя не существует - '.'<a href="register.php">Зарегестрироватся?</a>';
        }
    }
}