<?php

$month_days = 31;
$current_day = rand(1, 31);
$kwh_price = 0.07;

$total_kwh = 0;

for ($day = 1; $day <= $month_days; $day++) {
    if ($day <= $current_day) {
        $kwh_used = rand(2, 5);
        $total_kwh += $kwh_used;
    } else {
        break;
    }
}

$total_bill = number_format($kwh_price * $total_kwh, 2);
var_dump($total_bill);

