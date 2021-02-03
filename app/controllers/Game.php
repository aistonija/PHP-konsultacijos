<?php

class Game extends Controller
{
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $this->balanceModel = $this->model('Balance');
        $this->userModel = $this->model('User');
    }

    /**
     * Controls balance page - will add money or withdraw money from
     * users account
     */
    public function balance()
    {
        // Get user from db
        $user = $this->userModel->getUserById($_SESSION['user_id']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init form
            $postData = [
                'amount' => trim($_POST['amount']),
                'action' => $_POST['action'],
                'amount_error' => '',
            ];

            // Validate Balance not empty and not less than 50
            if (empty($postData['amount'])) {
                $postData['amount_error'] = 'Please Enter Amount';
            } elseif ((int)$postData['amount'] < 50) {
                $postData['amount_error'] = 'Min amount is $50';
            } elseif (!is_numeric($postData['amount'])) {
                $postData['amount_error'] = 'Please enter number';
            }

            //Check if action button was set and empty errors
            if (isset($postData['action']) && empty($postData['amount_error'])) {
                $messages = [];

                if ($postData['action'] === 'Add') {
                    # 1 version. 
                    // Get user and add validated amount to it
                    // update current balance with new amount
                    $newBalance = $user['balance'] + $postData['amount'];
                    if ($this->balanceModel->changeBalance(['id' => $user['id'], 'balance' => $newBalance])) {
                        $messages['moneyResult'] = $postData['amount'] . '$ was added to your account';
                        $messages['moneyResultClass'] =
                            'alert-success';
                    } else {
                        $messages['moneyResult'] = 'Something went terribly wrong';
                        $messages['moneyResultClass'] =
                            'alert-danger';
                    }
                } elseif ($postData['action'] === 'Withdraw') {
                    # 1 version. 
                    // Get user and check if current user balance is higher than post amount
                    // if post amount validated, make new balance taking the post amount from current balance
                    // update user balance with new amount

                    if ($user['balance'] >= $postData['amount']) {
                        $newBalance = (int)$user['balance'] - (int)$postData['amount'];
                        if ($this->balanceModel->changeBalance(['id' => $user['id'], 'balance' => (string)$newBalance])) {
                            $messages['moneyResult'] = $postData['amount'] . '$ was taken from your account';
                            $messages['moneyResultClass'] =
                                'alert-info';
                        } else {
                            $messages['moneyResult'] = 'Not enough you have';
                            $messages['moneyResultClass'] =
                                'alert-danger';
                        }
                    } else {
                        $messages['moneyResult'] = 'YOU\'RE POOR SON OF A BITH';
                        $messages['moneyResultClass'] =
                            'alert-danger';
                    }
                } else {
                    $messages['moneyResult'] = 'What are you trying to do here?? No such action here..';
                    $messages['moneyResultClass'] =
                        'alert-danger';
                }
            }
        }
        //Get user Balance
        $balance = $this->balanceModel->getBalanceById($_SESSION['user_id']);

        $data = [
            'title' => 'Add or Withdraw money here',
            'nickname' => $user['nickname'],
            'balance' => $balance,
            'amount' => $postData['amount'] ?? null,
            'amount_error' => $postData['amount_error'] ?? null,
            'messages' => $messages ?? null,
        ];

        $this->view('game/balance', $data);
    }

    /**
     * controls game page, where images get randomized if input was valid, checks if user won, adds/removes money
     */
    public function gameplay()
    {
        // Get user from db
        $user = $this->userModel->getUserById($_SESSION['user_id']);
        $gameboard = new Gameboard();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $postData = [
                'amount' => trim($_POST['amount']),
                'action' => $_POST['action'],
                'amount_error' => '',
            ];

            // Validate Balance not empty and not less than 5
            if (empty($postData['amount'])) {
                $postData['amount_error'] = 'Please Enter Amount';
            } elseif ((int)$postData['amount'] < 5) {
                $postData['amount_error'] = 'Min amount is $5';
            }

            if (isset($postData['action']) && empty($postData['amount_error'])) {
                $messages = [];
                if ($postData['action'] === 'Play') {
                    #2 version.
                    //Call mysql and give the post amount as an argument, so query will make arithmetics itself
                    if ($this->balanceModel->withdrawBalance($user['id'], $postData['amount'])) {

                        //Money removed successfully show message
                        $messages['moneyResult'] = $postData['amount'] . '$ was taken from your account';
                        $messages['moneyResultClass'] = 'alert-warning';

                        //Initiate the game and randomize pictures
                        $gameboard->randomizeImages();

                        // Check if won
                        if (!$gameboard->isWiener()) {
                            $messages['isWiener'] = 'Sorry dude, try again';
                            $messages['isWienerClass'] = 'alert-danger';
                        } else {
                            $messages['moneyResult'];

                            #2 version.
                            //Call mysql and give the post amount as an argument, so query will make arithmetics itself
                            if ($this->balanceModel->addBalance($user['id'], $gameboard->getLucky($postData['amount'], 5))) {
                                unset($messages['moneyResultClass']);
                                $messages['isWiener'] = 'You won ' . $gameboard->getLucky($postData['amount'], 5) . '$';
                                $messages['isWienerClass'] = 'alert-success';
                            } else {
                                die('kazkode neisidejo i db');
                            }
                        }
                    } else {
                        $messages['moneyResult'] = 'No more cash in your account';
                        $messages['moneyResultClass'] = 'alert-warning';
                    }
                } else {
                    var_dump('kazkasai neveikiasai');
                }
            }
        }


        //Get user Balance
        $balance = $this->balanceModel->getBalanceById($_SESSION['user_id']);
        $data = [
            'title' => 'LET\'S PLAY!',
            'nickname' => $user['nickname'],
            'amount' => $postData['amount'] ?? null,
            'messages' => $messages ?? null,
            'balance' => $balance,
            'images' => $gameboard->getImages(),
        ];

        $this->view('game/gameplay', $data);
    }
}