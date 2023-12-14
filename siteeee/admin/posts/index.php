<?php
        include "../../paht.php";
        include "../../app/controllers/posts.php";
?>

<!doctype html>
<div lang="ru">
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
    <?php include "../../app/include/sidebar-admin.php";?>
        <div class="posts col-9">
            <div class="button row">
                <a href="<?php echo BASE_URL . "admin/posts/create.php";?>" class="col-2 btn btn-success"> Создать</a>
                <span class="col-1"></span>
                <a href="<?php echo BASE_URL . "admin/posts/index.php";?>" class="col-2 btn btn-secondary"> Редактировать</a>
            </div>
            <div class="row title-table">
                <h2>Управление постами</h2>
                <div class="col-1">ID</div>
                <div class="col-5">Название</div>
                <div class="col-2">Автор</div>
                <div class="col-4">Управление</div>
            </div>
            <?php foreach ($postsAdm as $key => $post):?>
            <div class="row post">
                <div class="id col-1"><?=$key+1;?></div>
                <div class="title col-5"><?=$post ['title'];?></div>
                <div class="author col-2"><?=$post ['username'];?></div>
                <div class="red col-1"><a href="edit.php?id=<?=$post ['id'] ;?>">edit</a></div>
                <div class="del col-1"><a href="edit.php?del_id=<?=$post['id'];?>">delete</a></div>
                <?php if ($post ['status']):?>
                <div class="status col-2"><a href="">publish</a></div>
                <?php else: ?>
                <div class="status col-2"><a href="">unpublish</a></div>
                <?php endif;?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!--Блок footer start-->
<?php include ("../../app/include/footer.php");?>
<!--Блок footer End-->
</html>