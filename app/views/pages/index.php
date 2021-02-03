<?php
require APPROOT . '/views/inc/header.php'; ?>

<div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
        <h1 class="display-4"><?php echo $data['title'] ?></h1>
    </div>
</div>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100 vh-50"
                src="https://dr5dymrsxhdzh.cloudfront.net/blog/images/a4d868cc8/2018/10/people-sending-and-receiving-money-wirelessly-vector-id628883362.jpg"
                alt="First slide">
            <h2 class="text-center">YOU CAN Easily add money to your account*</h2>
            <p class="mt-3">* You can also withdraw money from your account</p>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100 vh-50"
                src="https://store-images.s-microsoft.com/image/apps.9160.13917439356089127.9df257b3-c4b3-4330-aa78-19be10587b25.f5a71ab4-5956-4f9d-b986-1f8c83765867?mode=scale&q=90&h=1080&w=1920"
                alt="Second slide">
            <h2 class="text-center">YOU CAN Play and win real cash!!</h2>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100 vh-50" src="https://i.ytimg.com/vi/AOa-ArRdEoY/maxresdefault.jpg"
                alt="Third slide">
            <h2 class="text-center">IF YOU LOSE, BECAUSE..</h2>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<?php require APPROOT . '/views/inc/footer.php';