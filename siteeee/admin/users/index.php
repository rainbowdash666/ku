<?php session_start();
include "../../paht.php";
include "../../app/controllers/users.php"
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Всё для творчества</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<link rel="stylesheet" href="../../assets/css/admin.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>
<body>
</body>

<?php include ("../../app/include/header-admin.php");?>
<div class="container">
    <div class="row">
        <?php include "../../app/include/sidebar-admin.php";?>
        <div class="posts col-9">
            <div class="button row">
                <a href="create.php" class="col-2 btn btn-success"> Создать</a>
                <span class="col-1"></span>
                <a href="index.php" class="col-2 btn btn-secondary"> Управление</a>
            </div>
            <div class="row title-table">
                <h2>Управление пользователями </h2>
                <div class="col-1">ID</div>
                <div class="col-2">Логин</div>
                <div class="col-2">E-mail</div>
                <div class="col-3">Роль</div>
                <div class="col-4">Управление</div>
            </div>
            <?php foreach ($users as $key => $user):?>
            <div class="row post">
                <div class="col-1"><?=$user ['id'];?></div>
                <div class="col-2"><?=$user ['username'];?></div>
                <div class="col-3"><?=$user ['email'];?></div>
                <?php if ($user ['admin'] == 1):?>
                <div class="col-2">Админ</div>
                <?php else:?>
                    <div class="col-2">Пользователь</div>
                <?php endif;?>
                <div class="red col-2"><a href="edit.php?edit_id=<?=$user['id'];?>">edit</a></div>
                <div class="del col-2"><a href="index.php?delete_id=<?=$user['id'];?>"">delete</a></div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>


<!--Блок footer start-->
<?php include ("../../app/include/footer.php");?>
<!--Блок footer End-->
</html>