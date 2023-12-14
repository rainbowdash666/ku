<?php
include SITE_ROOT . '/app/database/db.php';
$errMsg = '';

function userAuth($user){
    $_SESSION['id'] = $user['id'];
    $_SESSION['login'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];
    if($_SESSION['admin']){
        header('location: ' . BASE_URL . "admin/posts/index.php");
    }else{
        header('location: ' . BASE_URL);
    }
}
$users=selectAll('users');

//Код для регистрации
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])){
    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);


    if($login === '' || $email === '' ||$passF === ''){
        $errMsg = 'Не все поля заполнены!';
    }elseif (mb_strlen($login, 'UTF-8') < 2){
        $errMsg = 'Логин должен быть длиннее двух символов!';
    }elseif ($passF !== $passS){
        $errMsg = 'Пароли не совпадают!';
    }else{
        $existence = selectOne('users', ['email' => $email]);
        if(!empty($existence['email']) && $existence['email'] === $email){
            $errMsg = 'Эта почта уже зарегистрирована!';
        }else {
            $pass = password_hash($passF, PASSWORD_DEFAULT);
            $post = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pass,

            ];
            $id = insert('users', $post);
            $user = selectOne('users', ['id' => $id]);

            userAuth($user);
        }

    }
}else{
    $login = '';
    $email = '';
    $name = '';

}
//Код для авторизации
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])){
    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);

    if( $email === '' ||$pass === ''){
        $errMsg = 'Не все поля заполнены!';
    }else {
        $existence = selectOne('users', ['email' => $email]);
        if($existence && password_verify($pass, $existence['password'])){
            $_SESSION['id'] = $existence['id'];
            $_SESSION['login'] = $existence['username'];
            $_SESSION['admin'] = $existence['admin'];
            if($_SESSION['admin']){
                header('location: ' . BASE_URL . "admin/posts/index.php");
            }else{
                header('location: ' . BASE_URL);
            }
        }else{
            $errMsg = 'Повторите попытку';
        }
    }
}
//для добавления пользователя через админку
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-user'])){

    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);


    if($login === '' || $email === '' ||$passF === ''){
        $errMsg = 'Не все поля заполнены!';
    }elseif (mb_strlen($login, 'UTF-8') < 2){
        $errMsg = 'Логин должен быть длиннее двух символов!';
    }elseif ($passF !== $passS){
        $errMsg = 'Пароли не совпадают!';
    }else{
        $existence = selectOne('users', ['email' => $email]);
        if(!empty($existence['email']) && $existence['email'] === $email){
            $errMsg = 'Эта почта уже зарегистрирована!';
        }else {
            $pass = password_hash($passF, PASSWORD_DEFAULT);
            if (isset($_POST['admin'])) $admin =1;
            $user = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pass,

            ];
            $id = insert('users', $user);
            $user = selectOne('users', ['id' => $id]);

            userAuth($user);
        }

    }
}else{
    $login = '';
    $email = '';
    $name = '';

}
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    delete('users', $id);
    header('location: ' . BASE_URL . 'admin/users/index.php');
}


//редактирование пользователя через админку
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['edit_id'])) {
    $user = selectOne('users', ['id' => $_GET['edit_id']]);

    $id = $user ['id'];
    $admin = $user ['admin'];
    $username = $user ['username'];
    $email = $user ['email'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update-user'])) {

    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $email = isset($_POST["email"]) ? trim($_POST["email"]) : '';
    $login = isset($_POST["login"]) ? trim($_POST["login"]) : '';
    $passF = isset($_POST["pass-first"]) ? trim($_POST["pass-first"]) : '';
    $passS = isset($_POST["pass-second"]) ? trim($_POST["pass-second"]) : '';
    $admin = isset($_POST["publish"]) ? 1 : 0;


    if ( $login === '' ) {
        $errMsg = 'Не все поля заполнены!';
    } elseif (mb_strlen($login, 'UTF-8') < 3) {
        $errMsg = 'Название статьи должно быть длиннее трёх символов!';
    } elseif ($passF !== $passS) {
        $errMsg = 'Пароли не совпадают!';
    }else {
        $pass = password_hash($passF, PASSWORD_DEFAULT);
        if (isset($_POST['admin'])) $admin =1;
        $user = [
            'admin' => $admin,
            'username' => $login,
            'password' => $pass,

        ];

        $user = update('users', $id, $user);
        header('location: ' . BASE_URL . 'admin/users/index.php');
    }
} else {
    $login = isset($user['login']) ? $user['login'] : '';
    $email = isset($user['email']) ? $user['email'] : '';
}