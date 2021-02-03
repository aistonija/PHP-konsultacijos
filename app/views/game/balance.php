<?php require APPROOT . '/views/inc/header.php'; ?>

<h1 class="display-4 text-center m-4 p-4 bg-light rounded"><?php echo $data['title'] ?></h1>

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Hi, <?php echo $data['nickname'] ?? 'guest' ?></h2>
            <p>Your current balance is: <?php echo $data['balance'] ?>$</p>
            <form method="POST">
                <?php if (isset($data['messages']['moneyResultClass'])) : ?>
                <div class="alert alert-dismissible <?php echo $data['messages']['moneyResultClass'] ?> text-center">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <p><?php echo $data['messages']['moneyResult'] ?></p>
                </div>
                <?php endif; ?>

                <div class="form-group">
                    <label for="balance">Enter Amount: <sup>*</sup></label>
                    <input type="text" name="amount"
                        class="form-control form-control-lg <?php echo (!empty($data['amount_error'])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $data['amount'] ?? '' ?>">
                    <span class="invalid-feedback"><?php echo $data['amount_error'] ?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" name="action" value="Add" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <input type="submit" name="action" value="Withdraw" class="btn btn-warning btn-block">
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT ?>/game/gameplay" class="btn btn-dark btn-block">Play Game!</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<?php require APPROOT . '/views/inc/footer.php';