<?php require ROOT . '/views/inc/header.php' ?>
<div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
        <h1 class="display-3"><?php echo $data['title'] ?></h1>
    </div>
</div>
<div class="pixelWall">
    <?php foreach ($data['pixels'] as $pixel) : ?>
    <span class="pixel <?php print $pixel['color']; ?>" style="
    bottom: <?php print $pixel['pixel_y']; ?>px;
	left: <?php print $pixel['pixel_x']; ?>px;
	width: <?php print $pixel['size']; ?>px;
	height: <?php print $pixel['size']; ?>px;">
    </span>
    <?php endforeach; ?>

</div>
<?php if (isset($data['pixelsError'])) : ?>
<h2><?php echo $data['pixelsError'] ?></h2>
<?php endif; ?>
<?php require ROOT . '/views/inc/footer.php' ?>