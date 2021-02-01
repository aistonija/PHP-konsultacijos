<?php require 'bootloader.php';

if (!is_logged_in()) {
    header('Location: login.php');
    exit();
}

$userNickname = $_SESSION['nickname'];

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

    // Validate Balance not empty and not less than 50
    if (empty($data['amount'])) {
        $data['amount_error'] = 'Please Enter Amount';
    } elseif ((int)$data['amount'] < 50) {
        $data['amount_error'] = 'Min amount is $50';
    } elseif (!is_numeric($data['amount'])) {
        $data['amount_error'] = 'Please enter number';
    }

    //Check which button was pressed
    if (isset($_POST['action']) && empty($data['amount_error'])) {
        $moneyResult = '';
        $moneyResultClass = '';

        if ($_POST['action'] === 'Add') {
            if ($db->addBalance($_SESSION['user_id'], $_POST['amount'])) {
                // gauti user is db
                // prie user balance pridet $_POST['amount']
                // update user
                $moneyResult = $_POST['amount'] . '$ was added to your account';
                $moneyResultClass = 'alert-success';
            }
        } elseif ($_POST['action'] === 'Withdraw') {
            if ($db->removeBalance($_SESSION['user_id'], $_POST['amount'])) {
                // gauti user is db
                // patikrinti ar $_POST['amount'] nera didesne uz user balance
                // jeigu praejo is user balance atimt $_POST['amount']
                // update user
                $moneyResult = $_POST['amount'] . '$ was taken from your account';
                $moneyResultClass = 'alert-warning';
            } else {
                $moneyResult = 'Neužtenka šaibų seniukau';
                $moneyResultClass = 'alert-danger';
            }
        } else {
            // Kai nera tokios komandos - toks action negalimas
            var_dump('ner komandos');
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
            <h2>Hi, <?php echo $userNickname ?? 'guest' ?></h2>
            <p>Your current balance is: <?php echo $userBalance ?>$</p>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

                <?php if (isset($moneyResultClass)) : ?>
                <div class="alert alert-dismissible <?php echo $moneyResultClass ?> text-center">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <p><?php echo $moneyResult ?? null ?></p>
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
                        <a href="<?php echo URLROOT ?>/game.php" class="btn btn-dark btn-block">Play Game!</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require ROOT . '/includes/footer.php' ?>