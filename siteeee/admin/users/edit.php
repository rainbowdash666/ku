<?php session_start();
include "../../paht.php";
include "../../app/controllers/users.php";
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
        <div class="posts col-9">
            <div class="row title-table">
                <h2>Создание пользователя</h2>
                <div class="mb-12 col-12 col-md-12 err">
                    <p><?=$errMsg?></p>
                </div>
                <div class="button row">
                    <a href="<?php echo BASE_URL . "admin/users/create.php";?>" class="col-2 btn btn-success"> Создать</a>
                    <span class="col-1"></span>
                    <a href="<?php echo BASE_URL . "admin/users/index.php";?>" class="col-2 btn btn-secondary"> Редактировать</a>
                </div>
            </div>
            <div class="row add-post">
                <form action="edit.php" method="post" enctype="multipart/form-data">
                    <input name="id" value="<?=$id?>" type="hidden">
                    <div class="col">
                        <label for="formGroupExampleInput" class="form-label">Логин</label>
                        <input name="login" value="<?=$username?>" type="text" class="form-control" id="formGroupExampleInput" placeholder="Введите логин">
                    </div>
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label">Email </label>
                        <input name="email" value="<?=$email?>" type="email" readonly class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите почту">
                    </div>
                    <div class="col">
                        <label for="exampleInputPassword1" class="form-label">Сбросить пароль</label>
                        <input name="pass-first" type="password" class="form-control" id="exampleInputPassword1" placeholder="Введите ваш пароль">
                    </div>
                    <div class="col">
                        <label for="exampleInputPassword2" class="form-label">Повторите пароль</label>
                        <input name="pass-second" type="password" class="form-control" id="exampleInputPassword2" placeholder="Повторите ваш пароль">
                    </div>
                    <div class="form-check">
                        <input name="admin" class="form-check-input" value="1" type="checkbox" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            Admin?
                        </label>
                    </div>
                    <div class="col">
                        <button name="update-user" class="btn btn-primary" type="submit">Обновить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Блок footer start-->
<?php include ("../../app/include/footer.php");?>
<!--Блок footer End-->
</html>