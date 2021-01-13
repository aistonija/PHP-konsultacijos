<?php

require_once 'Product.php';
require_once 'VendingMachine.php';

$products = [
    new Product('Snickers', 'A01', 10, 0.9),
    new Product('Twix', 'A02', 2, 0.8),
    new Product('Jelly Beans', 'A03', 5, 1.3),
    new Product('Coca-Cola', 'A04', 0, 1.1),
    new Product('Orange Juice', 'A05', 4, 1.5),
    new Product('Water', 'A06', 1, 0.6),
];

$vending_machine = new VendingMachine($products);

if (!empty($_POST)) {
    $product_code = $_POST['item_code'];
    $amount = floatval($_POST['amount']);
    $text = $vending_machine->vend($product_code, $amount);
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vending Machine</title>
    <style>
    table {
        width: 500px;
        margin: auto;
        text-align: center;
        border: 1px solid #222222;
    }

    table tr td {
        padding: 10px;
        border: 1px solid #222222;
    }

    table thead {
        background-color: #222222;
        color: white;

    }

    table thead th {
        padding: 10px;
    }

    form {
        width: 300px;
        margin: 20px auto;
        display: flex;
        flex-direction: column;
    }

    form input {
        margin-bottom: 10px;
        padding: 5px;
    }

    h2 {
        text-align: center;
    }
    </style>
</head>

<body>
    <section>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Quantity</th>
                    <th>Price Eur</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vending_machine->getProducts() as $item) : ?>
                <tr>
                    <td><?php print $item->getTitle() ?></td>
                    <td><?php print $item->getCode() ?></td>
                    <td><?php print $item->getQuantity() ?></td>
                    <td><?php print number_format($item->getPrice(), 2) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
    <form method="POST">
        <input type="text" name="item_code" placeholder="enter product code"
            value="<?php echo $_POST['item_code'] ?? null ?>">
        <input type="text" name="amount" placeholder="enter amount of money"
            value="<?php echo $_POST['amount'] ?? null ?>">
        <button type="submit">Buy Snack</button>
    </form>
    <h2><?php echo $text ?? null; ?></h2>
</body>

</html>