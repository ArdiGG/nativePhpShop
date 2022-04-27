<?php

include_once '../models/Category.php';
include_once '../models/User.php';

function register()
{
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $email = trim($email);

    $pwd1 = isset($_REQUEST['pwd1']) ? $_REQUEST['pwd1'] : null;
    $pwd2 = isset($_REQUEST['pwd2']) ? $_REQUEST['pwd2'] : null;

    $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null;
    $adress = isset($_REQUEST['adress']) ? $_REQUEST['adress'] : null;
    $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
    $name = trim($name);

    $data = null;

    $data = checkRegisterParams($email, $pwd1, $pwd2);

    if (!$data && checkUserEmail($email)) {
        $data['success'] = false;
        $data['message'] = 'Пользователь с таким email уже зарегистрирован';
    }

    if (!$data) {
        $password = password_hash($pwd1, PASSWORD_DEFAULT);
        $userData = registerNewUser($email, $password, $name, $phone, $adress);
        if($userData['success']) {
            $data['message'] = 'Пользователь успешно зарегистрирован';
            $data['success'] = 1;

            $data['userName'] = $userData['name'] ? $userData['name'] : $userData['email'];
            $data['userEmail'] = $email;

            $_SESSION['user'] = $userData;
            $_SESSION['user']['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];
        } else {
            $data['success'] = 0;
            $data['message'] = 'Ошибка регистрации';
        }
    }

    echo json_encode($data);
}

function login() {
    $email = trim($_REQUEST['email']) ?? null;
    $password = $_REQUEST['password'] ?? null;

    $user = checkUserData($email, $password);

    if($user['success']){
        $_SESSION['user'] = $user;
        $_SESSION['user']['displayName'] = $user['name'] ? $user['name'] : $user['email'];
    }

    echo json_encode($user);
}

function logout() {
    if(isset($_SESSION)) {
        unset($_SESSION['user']);
        unset($_SESSION['cart']);
    }

}