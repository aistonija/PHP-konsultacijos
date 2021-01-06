<?php

# 9. Multiply String Characters

function multiplyCharacters($string, $multiplier)
{
    $characters = str_split($string);
    $result = '';

    foreach ($characters as $char) {
        if ($char === ' ') {
            $result .= ' ';
        } else {
            $result .= str_repeat($char, $multiplier);
        }
    }

    return $result;
}


var_dump($_POST);

if (isset($_POST['submit'])) {
    $output = multiplyCharacters($_POST['string'], $_POST['multiplier']);
} else {
    $output = 'You haven\'t entered anything';
}

?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
    <form action="<?php print $_SERVER['PHP_SELF'] ?>" method="post">
        <div>
            <label>Enter any word</label>
            <input type="text" name="string">
        </div>
        <div>
            <label>Enter any number</label>
            <input type="number" name="multiplier">
        </div>
        <button type="submit" name="submit"> SUBMIT</button>
    </form>
    <div><?php print $output ?></div>
    </body>
    </html>

