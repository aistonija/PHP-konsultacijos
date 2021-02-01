<?php
require 'bootloader.php';
require 'classes/Gameboard.php';

if (!is_logged_in()) {
    header('Location: login.php');
    exit();
}

// Show 9 same images
$gameboard = new Gameboard();

// Get User
$db = new Database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form

    // Sanitize POST data
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    // Init form
    $data = [
        'amount' => trim($_POST['amount']),
        'amount_error' => '',
    ];

    // Validate Balance not empty and not less than 5
    if (empty($data['amount'])) {
        $data['amount_error'] = 'Please Enter Amount';
    } elseif ((int)$data['amount'] < 5) {
        $data['amount_error'] = 'Min amount is $5';
    }

    //Check if button play was pressed and errors are empty
    if (isset($_POST['action']) && empty($data['amount_error'])) {
        $moneyResult = '';
        $moneyResultClass = '';
        $isWinnerMessage = '';
        $isWinnerMessageClass = '';

        // Remove amount on submit
        if ($_POST['action'] === 'Play') {
            if ($db->removeBalance($_SESSION['user_id'], $_POST['amount'])) {

                //Money removed successfully show message
                $moneyResult = $_POST['amount'] . '$ was taken from your account';

                //Initiate the game and randomize pictures
                $gameboard->randomizeImages();

                // Check if won
                if (!$gameboard->isWinner()) {
                    $isWinnerMessage = 'Sorry dude, try again';
                    $isWinnerMessageClass = 'alert-danger';
                } else {
                    unset($moneyResult);
                    if ($db->addBalance($_SESSION['user_id'], $gameboard->getLucky($_POST['amount'], 5))) {
                        $isWinnerMessage = 'You won ' . $gameboard->getLucky($_POST['amount'], 5) . '$';
                        $isWinnerMessageClass = 'alert-success';
                    } else {
                        die('kazkode neisidejo i db');
                    }
                }
            } else {
                $moneyResult = 'No more cash in your account';
                unset($isWinnerMessageClass);
            }
        } else {
            echo 'kaku neveikia';
        }
    }
}

$user = $db->getUser($_SESSION['nickname']);
$userBalance = $user['balance'];

?>
<?php require ROOT . '/includes/header.php' ?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Play to WIN, <strong><?php echo $user['nickname'] ?></strong></h2>
            <p>Your current balance is: <?php echo $userBalance ?? null ?>$</p>
            <p><?php echo $moneyResult ?? null ?></p>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
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
                        <a href="<?php echo URLROOT ?>/add.php" class="btn btn-info btn-block">Add More Cashio!</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php if (isset($isWinnerMessageClass)) : ?>
<div class="row">
    <div class="col-6 mx-auto mt-5 alert alert-dismissible <?php echo $isWinnerMessageClass ?> text-center">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <p><?php echo $isWinnerMessage ?? null ?></p>
    </div>
</div>
<?php endif; ?>

<div class="row mt-5">
    <div class="col-9 mx-auto d-flex flex-wrap bg-info rounded justify-content-around">
        <?php foreach ($gameboard->getImages() as $image) : ?>
        <div class="card m-3 p-3" style="width: 200px; height: 200px;">
            <img src="/lucky/css/images/img_<?php echo $image; ?>.png" class="img-thumbnail" alt="..."
                style=" max-width: 100%;">
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php require ROOT . '/includes/footer.php' ?>