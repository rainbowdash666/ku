<?php
    include 'paht.php';
    include 'app/controllers/topics.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Всё для творчества</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<link rel="stylesheet" href="assets/css/css.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>
<body>
</body>

<?php include ("app/include/header.php");?>


<!--Блок карусели Start-->
<div class="container">
    <div class="row">
        <h2 class="slider-title">Новости</h2>
    </div>
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/image/nu.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/image/yraa.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/image/derevo.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>>
<!--Блок карусели End-->
<!--Блок main Start-->
<div class="container">
    <div class="content row">
        <!--Main content-->
        <div class="main-content col-md-9">
            <h2>Схемы</h2>
            <div class="post row">
                <div class="img col-12 col-md-4">
                    <img src="assets/image/ring.jpg" alt="" class="img-thumbnail">
                </div>
                <div class="post-text col-8 col-mad-8">
                    <h3>
                        <a href="#">Миленькое колечко "Котик"</a>
                    </h3>
                    <i class="far fa-user">kita</i>
                    <i class="far fa-calendar"> Котик </i>
                    <p class="preview-text"> миленькое колечко, которое сможет сделать каждый!
                    </p>
                </div>
            </div>
            <div class="post row">
                <div class="img col-12 col-md-4">
                    <img src="assets/image/oya.jpg" alt="" class="img-thumbnail">
                </div>
                <div class="post-text col-8 col-mad-8">
                    <h3>
                        <a href="#">Колечко "Поле"</a>
                    </h3>
                    <i class="far fa-user">kita</i>
                    <i class="far fa-calendar"> Цветочки </i>
                    <p class="preview-text"> супер модное абалденное необыкновенное
                    </p>
                </div>
            </div>
            <div class="post row">
                <div class="img col-12 col-md-4">
                    <img src="assets/image/bird.jpg" alt="" class="img-thumbnail">
                </div>
                <div class="post-text col-8 col-mad-8">
                    <h3>
                        <a href="#">Птичка-синичка</a>
                    </h3>
                    <i class="far fa-user">kita</i>
                    <i class="far fa-calendar"> Птички </i>
                    <p class="preview-text"> вауу
                    </p>
                </div>
            </div>
        </div>
        <!--sidebar-->

        <div class="sidebar col-md-2 col-12">
            <div class="section search">
                <h3>Поиск</h3>
                <form action="/" method="post">
                    <label>
                        <input type="text" name="search-term" class="text-input" placeholder="Поиск...">
                    </label>
                </form>
            </div>
            <div class="section topics">
                <h3>Топчик</h3>
                <ul>
                    <?php foreach ($topics as $key => $topic): ?>
                    <li>
                        <a href="#"> <?=$topic ['name']; ?> </a>
                    </li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--Блок main End-->
<!--Блок footer start-->
<?php include ("app/include/footer.php");?>
<!--Блок footer End-->
</html>
