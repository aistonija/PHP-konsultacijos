<?php

$result = [
    "https://picsum.photos/200/300?random=" . rand(0, 1000),
    "https://picsum.photos/200/300?random=" . rand(0, 1000),
    "https://picsum.photos/200/300?random=" . rand(0, 1000),
    "https://picsum.photos/200/300?random=" . rand(0, 1000)
];

echo json_encode($result);