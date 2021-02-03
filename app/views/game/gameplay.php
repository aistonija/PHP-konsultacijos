<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Hi, <?php echo $data['nickname'] ?? 'guest' ?></h2>
            <p>Your current balance is: <?php echo $data['balance'] ?>$</p>
            <?php if (isset($data['messages']['moneyResultClass'])) : ?>
            <div class="alert alert-dismissible <?php echo $data['messages']['moneyResultClass'] ?> text-center">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p><?php echo $data['messages']['moneyResult'] ?></p>
            </div>
            <?php endif; ?>
            <form method="POST">
                <div class="form-group">
                    <input type="text" name="amount"
                        class="form-control form-control-lg <?php echo (!empty($data['amount_error'])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $data['amount'] ?? '' ?>" placeholder="Enter amount to play with">
                    <span class="invalid-feedback"><?php echo $data['amount_error'] ?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" name="action" value="Play" class="btn btn-dark btn-block">
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT ?>/game/balance" class="btn btn-info btn-block">Add More Cashio!</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php if (isset($data['messages']['isWienerClass'])) : ?>
<div class="row">
    <div
        class="col-6 mx-auto mt-5 alert alert-dismissible <?php echo $data['messages']['isWienerClass'] ?> text-center">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <p><?php echo $data['messages']['isWiener'] ?></p>
    </div>
</div>
<?php endif; ?>

<div class="row mt-5">
    <div class="col-9 mx-auto d-flex flex-wrap bg-info rounded justify-content-around">
        <?php foreach ($data['images'] as $image) : ?>
        <div class="card m-3 p-3" style="width: 200px; height: 200px;">
            <img src="<?php APPROOT ?>/img/img_<?php echo $image; ?>.png" class="img-thumbnail" alt="..."
                style=" max-width: 100%;">
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php';