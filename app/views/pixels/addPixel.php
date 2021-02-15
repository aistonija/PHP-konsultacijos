<?php require ROOT . '/views/inc/header.php' ?>
<!-- JUMBOTRON PAGE TITLE -->
<div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
        <h1 class="display-3"><?php echo $data['title'] ?></h1>
    </div>
</div>
<!-- AFTER SUBMIT - IF PIXEL OUT OF CONTAINER ERROR -->
<?php if (isset($data['errors']['pixel_out_of_container'])) : ?>
<div class="alert alert-dismissible alert-danger text-center">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <div><?php echo $data['errors']['pixel_out_of_container'] ?></div>
</div>
<?php endif; ?>

<!-- FORM TO ADD PIXEL -->
<form method="POST" id="add_pixel_form">
    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>">
    <div class="form-group">
        <label for="pixel_x">Enter Coordinate X: <sup>*</sup></label>
        <!-- COORDINATE X INPUT -->
        <input type="text" name="pixel_x"
            class="form-control form-control-lg <?php echo (!empty($data['errors']['pixel_x_error'])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $data['filled_data']['pixel_x'] ?? null ?>">
        <span class="invalid-feedback"><?php echo $data['errors']['pixel_x_error'] ?? null ?></span>
    </div>
    <div class="form-group">
        <label for="pixel_y">Enter Coordinate Y: <sup>*</sup></label>
        <!-- COORDINTATE Y INPUT -->
        <input type="text" name="pixel_y"
            class="form-control form-control-lg <?php echo (!empty($data['errors']['pixel_y_error'])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $data['filled_data']['pixel_y'] ?? null ?>">
        <span class="invalid-feedback"><?php echo $data['errors']['pixel_y_error'] ?></span>
    </div>
    <div class="form-group mb-5">
        <label for="color">Select Color:</label>
        <select class="custom-select <?php echo (!empty($data['errors']['color_error'])) ? 'is-invalid' : ''; ?>"
            name="color" id="color">
            <!-- COLOR SELECTOR OPTOPNS -->
            <option value="">Choose from the following options</option>
            <option <?php echo !empty($data['filled_data']['color']) ?
                        ($data['filled_data']['color'] === 'red' ? 'selected' : '')
                        : '' ?> value="red">Red
            </option>
            <option <?php echo !empty($data['filled_data']['color']) ?
                        ($data['filled_data']['color'] === 'green' ? 'selected' : '')
                        : '' ?> value="green">Green
            </option>
            <option <?php echo !empty($data['filled_data']['color']) ?
                        ($data['filled_data']['color'] === 'blue' ? 'selected' : '')
                        : '' ?> value="blue">Blue
            </option>
            <option <?php echo !empty($data['filled_data']['color']) ?
                        ($data['filled_data']['color'] === 'yellow' ? 'selected' : '')
                        : '' ?> value="yellow">
                Yellow
            </option>
        </select>
        <span class="invalid-feedback"><?php echo $data['errors']['color_error'] ?></span>
    </div>
    <div class="range-wrap form-group">
        <div class="range-value" id="rangeV"></div>
        <!-- RANGE SLIDER INPUT -->
        <input id="range" name="size" type="range" min="1" max="20"
            value="<?php echo !empty($data['filled_data']['size']) ? $data['filled_data']['size'] : 10 ?>" step="1">
    </div>

    <button type="submit" name="action" value="Add" class="btn btn-primary">Add New Pixel</button>

</form>
<?php if (!empty($data['pixelCreatingMessage'])) : ?>
<div class="alert alert-dismissible alert-success text-center mt-5">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <div><?php echo $data['pixelCreatingMessage'] ?></div>
</div>
<?php endif; ?>
<script>
const
    range = document.getElementById('range'),
    rangeV = document.getElementById('rangeV'),
    setValue = () => {
        const
            newValue = Number((range.value - range.min) * 100 / (range.max - range.min)),
            newPosition = 10 - (newValue * 0.2);
        rangeV.innerHTML = `<span>${range.value}</span>`;
        rangeV.style.left = `calc(${newValue}% + (${newPosition}px))`;
    };
document.addEventListener("DOMContentLoaded", setValue);
range.addEventListener('input', setValue);
</script>
<?php require ROOT . '/views/inc/footer.php' ?>