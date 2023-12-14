<?php
    include "../../paht.php";
    include "../../app/controllers/topics.php";
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
            <div class="button row">
                <a href="<?php echo BASE_URL . "admin/topics/create.php";?>" class="col-2 btn btn-success"> Создать</a>
                <span class="col-1"></span>
                <a href="<?php echo BASE_URL . "admin/topics/index.php";?>" class="col-2 btn btn-secondary"> Редактировать</a>
            </div>
            <div class="row title-table">
                <h2>Создать категорию</h2>
            </div>
            <div class="mb-12 col-12 col-md-12 err">
                <p><?=$errMsg?></p>
            </div>
            <div class="row add-post">
                <form action="create.php" method="post" enctype="multipart/form-data">
                    <div class="col">
                        <input name="name"  value="<?=$name;?>" type="text" class="form-control number" placeholder="Имя категории" aria-label="number">
                    </div>
                    <div class="col">
                        <label for="content" class="form-label">Описание категории</label>
                        <textarea name="description" class="form-control" id="content" rows="3" <?=$description;?> placeholder="Описание"></textarea>
                    </div>

                    <div class="col">
                        <button name="topic-create" class="btn btn-primary" type="submit">Создать категорию</button>
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