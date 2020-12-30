<?php


// Sudarykite masyvą iš skaičių.

$array = [7, 2, 8, 267, 5, 7, 16, -5, -6, -7, 15.22, 1.66, -69.55, 1, 5, 7, 5];
var_dump($array);

//1. Padauginti esamo masyvo narius iš 2

$array_double = [];
for ($i = 0; $i < count($array); $i++) {
    $array_double[] = $array[$i] * 2;
}

foreach ($array as $number) {
    $array_double[] = $number * 2;
}
//var_dump($array_double);

//2. Pakelti masyvo narius kvadratu

$array_power = [];
for ($i = 0; $i < count($array); $i++) {
    $array_power[] = $array[$i] ** 2;
}

foreach ($array as $number) {
    $array_power[] = $number * 2;
}
//var_dump($array_power);


//3. Padauginti masyvo narius iš jų index'o (vietos masyve)

$index_multiply = [];

for ($i = 0; $i < count($array); $i++) {
    $index_multiply[] = $array[$i] * $i;
}

foreach ($array as $key => $number) {
    $index_multiply[$key] = $number * $key;
}
//var_dump($index_multiply);

//4. Atrinkti tiktai teigimų elementų masyvą

$positives = [];

foreach ($array as $number) {
    if ($number >= 0) {
        $positives[] = $number;
    }
}

for ($i = 0; $i < count($array); $i++) {
    if ($array[$i] > 0) {
        $positives[] = $array[$i];
    }
}
//var_dump($positives);

//5. Atrinkti tiktai neigiamų elementų masyvą

$negatives = [];

foreach ($array as $number) {
    if ($number < 0) {
        $negatives[] = $number;
    }
}

for ($i = 0; $i < count($array); $i++) {
    if ($array[$i] < 0) {
        $arrayNegative[] = $array[$i];
    }
}
//var_dump($negatives);

//6. Atrinkti tiktai lyginių skaičių masyvą

$even_numbers = [];

foreach ($array as $number) {
    if (gettype($number) === 'integer' && $number % 2 === 0) {
        $even_numbers[] = $number;
    }
}

$even_numbers = [];
for ($i = 0; $i < count($array); $i++) {
    if (gettype($array[$i]) === "integer" && $array[$i] % 2 === 0) {
        $even_numbers[] = $array[$i];
    }
}
//var_dump($even_numbers);

//7. Atrinkti tiktai nelyginių skaičių masyvą

$odd_numbers = [];

foreach ($array as $number) {
    if (gettype($number) === 'integer' && $number % 2 === 1) {
        $even_numbers[] = $number;
    }
}

for ($i = 0; $i < count($array); $i++) {
    if (gettype($array[$i]) === "integer" && $array[$i] % 2 === 1) {
        $even_numbers[] = $array[$i];
    }
}

//var_dump($odd_numbers);

//8. Visas neigiamas vertes masyve padaryti teigiamomis
$make_positive = [];
//8.1

for ($i = 0; $i < count($array); $i++) {
    if ($array[$i] < 0) {
        $make_positive[] = $array[$i] * -1;
    } else {
        $make_positive[] = $array[$i];
    }
    //8.2
//    $make_positive[] = abs($array[$i]);
    //8.3
//    $make_positive[] = $array[$i] * ($array[$i] < 0 ? -1 : 1);

}

foreach ($array as $number) {
    if ($number < 0) {
        $make_positive[] = $number * -1;
    } else {
        $make_positive[] = $number;
    }

    // $make_positive[] = abs($number);

    // $make_positive[] = $number * ($number < 0 ? -1 : 1);
}
//var_dump($make_positive);

// 9. Pakelti visas masyvo reikšmes laipsniu 'index'

$power_of_index = [];

foreach ($array as $key => $number) {
    $power_of_index[] = $number ** $key;
}

for ($i = 1; $i < count($array); $i++) {

}
//var_dump($power_of_index);

//10. Atrinkti tik natūralių skaičių masyvą

$array_naturals = [];

foreach ($array as $number) {
    if (gettype($number) === 'integer' && $number > 0) {
        $array_naturals[] = $number;
    }
}

for ($i = 0; $i < count($array); $i++) {
    if (gettype($array[$i]) === "integer" && $array[$i] > 0) {
        $array_naturals[] = $array[$i];
    }
}
//var_dump($array_naturals);

//11. Suapvalinti visas masyvo reikšmes iki sveikų skaičių

$array_integers = [];
foreach ($array as $number) {
    $array_integers[] = intval(round($number));
}

for ($i = 0; $i < count($array); $i++) {
    $array_integers[] = intval(round($array[$i]));
}
//var_dump($array_integers);

//12. Atrinkti kas antrą elementą

$every_second = [];
for ($i = 0; $i < count($array); $i += 2) {
    $every_second[] = $array[$i];
}

foreach ($array as $key => $number) {
    if ($key % 2 === 0) {
        $every_second[] = $number;
    }
}
//var_dump($every_second);

//13. Atrinkti kas penktą elementą

$every_fifth = [];
for ($i = 0; $i < count($array); $i++) {
    if ($i % 5 === 0)
        $every_fifth[] = $array[$i];
}

foreach ($array as $key => $number) {
    if ($key % 5 === 0) {
        $every_fifth[] = $number;
    }
}
//var_dump($every_fifth);

//14. Apskaičiuoti visų masyvo elementų sumą

$total_sum = 0;

foreach ($array as $number) {
    $total_sum += $number;
}

//var_dump($total_sum);

//15. Apskaičiuoti visų masyvo elemento vidurkį

$sum = 0;

foreach ($array as $number) {
    $sum += $number;
}
$avg_num = $sum / count($array);

//var_dump($avg_num);

//16. Grąžinti didžiausią skaičių masyve

$highest = max($array);
var_dump($highest);

//17. Grąžinti mažiausią skaičių masyve

$lowest = min($array);
var_dump($lowest);

//18.  Išrikiuoti masyvo elementus nuo mažiausio iki didžiausio

sort($array);
var_dump($array);




