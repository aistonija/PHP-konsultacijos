<?php require ROOT . '/views/inc/header.php' ?>
<!-- JUMBOTRON TITLE -->
<div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
        <h1 class="display-3"><?php echo $data['title'] ?></h1>
    </div>
</div>
<!-- SHOWING ERROR IF PIXELS WERE NOT RETRIEVED FROM DATABASE -->
<?php if (!empty($data['pixelsError'])) : ?>
<h2><?php echo $data['pixelsError'] ?></h2>
<?php endif; ?>
<!-- SHOWING MESSAGE IF PIXEL WAS REMOVED FROM DB -->
<?php if (!empty($data['pixelRemoval'])) : ?>
<div class="alert alert-dismissible alert-danger text-center">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <div><?php echo $data['pixelRemoval'] ?></div>
</div>
<?php endif; ?>
<!-- PRINTING LOGGED USERS WALL OF PIXELS-->
<div class="pixelWall">
    <?php foreach ($data['pixels'] as $pixel) : ?>
    <span class="pixel <?php print $pixel['color']; ?>" style="
    bottom: <?php print $pixel['pixel_y']; ?>px;
	left: <?php print $pixel['pixel_x']; ?>px;
	width: <?php print $pixel['size']; ?>px;
	height: <?php print $pixel['size']; ?>px;
    ">
    </span>
    <?php endforeach; ?>
</div>
<!-- PRINTING LOGGED USERS TABLE OF PIXELS  -->
<?php if (!empty($data['pixels'])) : ?>
<div class="pixelTable">
    <table class="table table-hover text-center">
        <thead class="table-info">
            <tr>
                <th scope="col">Pixel ID</th>
                <th scope="col">Coordinate X</th>
                <th scope="col">Coordinate Y</th>
                <th scope="col">Pixel Color</th>
                <th scope="col">Pixel Size</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['pixels'] as $pixel) : ?>
            <tr>
                <th scope="row"><?php echo $pixel['pixel_id']; ?></th>
                <td><?php echo $pixel['pixel_x']; ?></td>
                <td><?php echo $pixel['pixel_y']; ?></td>
                <td><?php echo $pixel['color']; ?></td>
                <td><?php echo $pixel['size']; ?>px</td>
                <td class="d-flex justify-content-around">
                    <form action="<?php echo URLROOT . '/pixels/editPixel/' ?>" method="post">
                        <input type="hidden" name="pixel_id" value="<?php echo $pixel['pixel_id'] ?>">
                        <button type="submit" name="action" value="edit" class="btn btn-info">Edit</button>
                    </form>

                    <!-- DELETE BUTTON VIA FORM -->
                    <form action="<?php echo URLROOT . '/pixels/deletePixel/' ?>" method="post">
                        <input type="hidden" name="pixel_id" value="<?php echo $pixel['pixel_id'] ?>">
                        <button type="submit" name="action" value="delete" class="btn btn-danger">Delete</button>
                    </form>

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>
<?php require ROOT . '/views/inc/footer.php' ?>