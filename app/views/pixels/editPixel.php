<?php require ROOT . '/views/inc/header.php'; ?>
<!-- JUMBOTRON TITLE -->
<div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
        <h1 class="display-3"><?php echo $data['title'] ?></h1>
    </div>
</div>
<!-- GO BACK BUTTON -->
<a href="<?php echo URLROOT ?>/pixels/myPixels" class='btn btn-warning my-3'> <i class="fa fa-chevron-left"></i> Back to
    My Pixels</a>

<!-- AFTER SUBMIT - IF PIXELS ARE OUT OF CONTAINER ERROR MESSAGE -->
<?php if (isset($data['errors']['pixel_out_of_container'])) : ?>
<div class="alert alert-dismissible alert-danger text-center">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <div><?php echo $data['errors']['pixel_out_of_container'] ?></div>
</div>
<?php endif; ?>

<!-- EDIT FORM - WHEN COMING TO PAGE IT'S FILLED WITH DATA FROM ID, AFTER SUBMIT CHANGES WITH POST INFORMATION -->
<form method="POST" id="edit_pixel_form">
    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>">
    <input type="hidden" name="pixel_id" value="<?php echo $_POST['pixel_id'] ?>">
    <div class="form-group">
        <label for="pixel_x">Update Coordinate X: <sup>*</sup></label>
        <input type="text" name="pixel_x"
            class="form-control form-control-lg <?php echo (!empty($data['errors']['pixel_x_error'])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $data['pixel']['pixel_x'] ?? $data['filled_data']['pixel_x'] ?>">
        <span class="invalid-feedback"><?php echo $data['errors']['pixel_x_error'] ?? null ?></span>
    </div>
    <div class="form-group">
        <label for="pixel_y">Update Coordinate Y: <sup>*</sup></label>
        <input type="text" name="pixel_y"
            class="form-control form-control-lg <?php echo (!empty($data['errors']['pixel_y_error'])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $data['pixel']['pixel_y'] ?? $data['filled_data']['pixel_x'] ?>">
        <span class="invalid-feedback"><?php echo $data['errors']['pixel_y_error'] ?></span>
    </div>
    <div class="form-group mb-5">
        <label for="color_select">Update Color:</label>
        <select class="custom-select <?php echo (!empty($data['errors']['color_error'])) ? 'is-invalid' : ''; ?>"
            name="color">
            <option value="">Update the Color</option>
            <option <?php echo $data['pixel']['color'] === 'red' ? 'selected' : '' ?> value="red">Red</option>
            <option <?php echo $data['pixel']['color'] === 'green' ? 'selected' : '' ?> value="green">Green</option>
            <option <?php echo $data['pixel']['color'] === 'blue' ? 'selected' : '' ?> value=" blue">Blue</option>
            <option <?php echo $data['pixel']['color'] === 'yellow' ? 'selected' : '' ?> value="yellow">Yellow
            </option>
        </select>
        <span class="invalid-feedback"><?php echo $data['errors']['color_error'] ?></span>
    </div>

    <div class="range-wrap form-group">
        <div class="range-value" id="rangeV"></div>
        <input id="range" name="size" type="range" min="1" max="20"
            value="<?php echo $data['pixel']['size'] ?? $data['filled_data']['size'] ?>" step="1">
    </div>

    <button type="submit" name="action" value="Update" class="btn btn-primary">Update Pixel</button>

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