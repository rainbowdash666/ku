<?php

include "../../paht.php";
include "../../app/controllers/posts.php";
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

<?php include ("../../app/include/header-admin.php");
$topics = selectAll('topics');?>
<div class="container">
    <div class="row">
        <div class="posts col-9">
            <div class="row title-table">
                <h2>Редактирование поста</h2>
            </div>
            <div class="row add-post">
                <form action="edit.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$id;?>">
                    <div class="col">
                        <input value="<?=$post ['title'];?>" name="title" type="text" class="form-control number" placeholder="Название" aria-label="number">
                    </div>
                    <div class="col">
                        <label for="content" class="form-label"></label>
                        <textarea name="content" class="form-control" id="content" rows="6" placeholder="Описание"><?=$post ['content'];?></textarea>
                    </div>
                    <div class="col">
                        <label for="formFileSm" class="form-label">Выбрать фото</label>
                        <input name="image" class="form-control form-control-sm" id="formFileSm" type="file">
                    </div>
                    <select name="topic" class="form-select mb-2" aria-label="Default select example">
                        <option selected>Категория</option>
                        <?php foreach ($topics as $key => $topic): ?>
                            <option value="<?=$topic['id']?>"><?=$topic['name']?></option>
                        <?php endforeach; ?>
                    </select>

                    <div class="form-check">
                        <?php if (empty($publish) && $publish ==0): ?>
                        <input name="publish" class="form-check-input" type="checkbox" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            Publish
                        </label>
                        <?php else: ?>
                            <input name="publish" class="form-check-input" type="checkbox" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                                Publish
                            </label>
                        <?php endif;?>
                    </div>
                    <div class="col col-6">
                        <button name="edit" class="btn btn-primary" type="submit">Сохранить запись</button>
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