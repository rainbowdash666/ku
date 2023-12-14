<?php

include SITE_ROOT . '/app/database/db.php';
if(!$_SESSION){
    header('location: ' . BASE_URL . 'log.php');
}

$errMsg = '';
$id = '';
$title = '';
$content = '';
$image = '';
$topic = '';



$topics = selectAll('topics');
$posts = selectAll('posts');
$postsAdm = selectAll('posts');
$postsAdm = selectBorrowedPostsByUserID ('posts', 'users');


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_post'])) {

    $title = trim($_POST["title"]);
    $content = trim($_POST["content"]);
    $topic = trim($_POST["topic"]);
    $publish = trim($_POST["publish"]) !== null ? 1 : 0;

    if (!empty($_FILES['image']['name'])) {
        $imageName = time() . "_" . $_FILES['image']['name'];
        $fileTmpName = $_FILES['image']['tmp_name'];
        $destination = ROOT_PATH . "\assets\image\\" . $imageName;
        $result = move_uploaded_file($fileTmpName, $destination);
        if ($result) {
            $_POST['image'] = $imageName;
        } else {
            $errMsg = 'Ошибка загрузки изображения'; //ошибка move_upload_files
        }
    } else {
        $errMsg = 'Ошибка получения изображения'; //ошибка в форме заполнения
    }

    $targetDir = '../assets/image/';
    $targetFile = $targetDir . basename($_FILES['image']['name']);
    $image = 'assets/image/' . basename($_FILES['image']['name']);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        $image = $targetFile;
    }

    if ($title === '' || $content === '' || $topic === '') {
        $errMsg = 'Не все поля заполнены!';
    } elseif (mb_strlen($title, 'UTF-8') < 3) {
        $errMsg = 'Название статьи должно быть длиннее трёх символов!';
    } else {
        $post = [
            'id_user' => $_SESSION['id'],
            'title' => $title,
            'content' => $content,
            'image' => $image,
            'status' => $publish,
            'id_topic' => $topic
        ];

        $post = insert('posts', $post);
        $post = selectOne('posts', ['id' => $id]);
        header('location: ' . BASE_URL . 'admin/posts/index.php');
    }
} else {
    $id = '';
    $title = '';
    $content = '';
    $publish = '';
    $topic = '';
}



//Редактирование статьи
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $post = selectOne('posts', ['id' => $_GET['id']]);

    $id = $post['id'];
    $title = $post['title'];
    $content = $post['content'];
    $topic = $post['id_topic'];
    $publish = $post['status'];
    $currentImage = $post['image']; // Сохраняем текущее значение изображения
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $title = isset($_POST["title"]) ? trim($_POST["title"]) : '';
    $content = isset($_POST["content"]) ? trim($_POST["content"]) : '';
    $topic = isset($_POST["topic"]) ? trim($_POST["topic"]) : '';
    $publish = isset($_POST["publish"]) ? 1 : 0;

    if ($title === ''|| $content === '' || $topic === '') {
        $errMsg = 'Не все поля заполнены!';
    } elseif (mb_strlen($title, 'UTF-8') < 3) {
    $errMsg = 'Название статьи должно быть длиннее трёх символов!';
    } else {
        // Если не загружено новое изображение, используем текущее
        $image = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : $currentImage;

        $post = [
            'id_user' => $_SESSION['id'],
            'title' => $title,
            'content' => $content,
            'image' => $image, // Используем значение $image
            'status' => $publish,
            'id_topic' => $topic
        ];

        $post = update('posts', $id, $post);
        header('location: ' . BASE_URL . 'admin/posts/index.php');
    }
} else {
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $title = isset($post['title']) ? $post['title'] : '';
    $content = isset($post['content']) ? $post['content'] : '';
    $publish = isset($post['status']) ? $post['status'] : '';
    $topic = isset($post['id_topic']) ? $post['id_topic'] : '';
}
//Удаление c
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    delete('posts', $id);
    header('location: ' . BASE_URL . 'admin/posts/index.php');
}