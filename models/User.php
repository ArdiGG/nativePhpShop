<?php

function registerNewUser(string $email, string $pwdMD5, string $name, $phone, $adress)
{
    $email = htmlspecialchars($email);
    $pwdMD5 = htmlspecialchars($pwdMD5);
    $name = htmlspecialchars($name);
    $phone = htmlspecialchars($phone);
    $adress = htmlspecialchars($adress);

    $query = "INSERT INTO users(`email`, `password`, `name`, `phone`, `adress`)
                VALUES('{$email}', '{$pwdMD5}', '{$name}', '{$phone}', '{$adress}')";

    $statement = $GLOBALS['pdo']->prepare($query);
    $statement->execute();


    $query = "SELECT * FROM users WHERE (`email` = '{$email}' AND `password` = '{$pwdMD5}') LIMIT 1";

    $statement = $GLOBALS['pdo']->prepare($query);
    $statement->execute();


    $user = $statement->fetch();

    if (isset($user)) {
        $user['success'] = 1;
    } else {
        $user['success'] = 0;
    }

    return $user;
}

function checkRegisterParams(string $email, $pwd1, $pwd2)
{
    $res = null;

    if (!$email) {
        $res['success'] = false;
        $res['message'] = 'Введите email';
    }
    if (!$pwd1) {
        $res['success'] = false;
        $res['message'] = 'Введите пароль';
    }
    if (!$pwd2) {
        $res['success'] = false;
        $res['message'] = 'Введите пароль повторно';
    }
    if ($pwd1 != $pwd2) {
        $res['success'] = false;
        $res['message'] = 'Пароли не совпадают!';
    }

    return $res;
}

function checkUserData(string $email, $password) {
    $email = htmlspecialchars($email);

    $query = "SELECT * FROM users WHERE email = '{$email}'";

    $statement = $GLOBALS['pdo']->prepare($query);
    $statement->execute();

    $user = $statement->fetch();

    $data = null;

    if($user) {
        if (password_verify($password, $user['password'])) {
            $data = $user;
            $data['success'] = true;
        } else {
            $data['success'] = false;
            $data['message'] = "Неверный пароль";
        }
    } else {
        $data['success'] = false;
        $data['message'] = "Пользователь с таким email не существует";
    }

    return $data;
}

function checkUserEmail(string $email)
{
    $query = "SELECT id FROM users WHERE email = '{$email}'";
    $statement = $GLOBALS['pdo']->prepare($query);
    $statement->execute();

    $id = $statement->fetch();

    return $id;
}