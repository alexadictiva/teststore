<!DOCTYPE html>
<html lang="es">
<head>
    <?php include('./components/head.php');?>
    <title>Página Principal</title>
</head>
<body>
<header>
    <?php include('./components/header.php');?>
</header>
<main>
<?php include('./components/sliderTop.php');?>
<section class="cardsContainer container my-5">
    <div class="row g-4">
    <article class="col">
        <div class="card text-center align-items-center">
            <div class="card-body">
                <img src="./asset/icon/headset.png" class="card-img-top mb-3" alt="...">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
        </div>
    </article>
    <article class="col">
        <div class="card text-center align-items-center">
            <div class="card-body">
                <img src="./asset/icon/star.png" class="card-img-top mb-3" alt="...">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
        </div>
    </article>
    <article class="col">
    <div class="card text-center align-items-center">
            <div class="card-body">
                <img src="./asset/icon/dollar-sign.png" class="card-img-top mb-3" alt="...">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
        </div>
    </article>
   
    </div>
</section>

</main>

<footer>
    <?php include('./components/footer.php');?>
</footer>
</body>
</html>