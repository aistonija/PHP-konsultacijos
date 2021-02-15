<?php require ROOT . '/views/inc/header.php' ?>
<div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
        <h1 class="display-3"><?php echo $data['title'] ?></h1>
    </div>
</div>
<?php if (!empty($data['userActivity'])) : ?>
<div class="pixelTable">
    <table class="table table-hover text-center">
        <thead class="table-info">
            <tr>
                <th scope="col">Pixel ID</th>
                <th scope="col">Coordinate X</th>
                <th scope="col">Coordinate Y</th>
                <th scope="col">Pixel Color</th>
                <th scope="col">Pixel Size</th>
                <th scope="col">Action</th>
                <th scope="col">Action Time</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['userActivity'] as $activity) : ?>
            <tr>
                <th scope="row"><?php echo $activity['pixel_id']; ?></th>
                <td><?php echo $activity['pixel_x']; ?></td>
                <td><?php echo $activity['pixel_y']; ?></td>
                <td><?php echo $activity['color']; ?></td>
                <td><?php echo $activity['size']; ?>px</td>
                <td><?php echo $activity['action']; ?></td>
                <td><?php echo $activity['time']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php else : ?>
<div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
        <h1 class="display-3"><?php echo $data['emptyActivity'] ?></h1>
    </div>
</div>
<?php endif; ?>
<?php require ROOT . '/views/inc/footer.php' ?>