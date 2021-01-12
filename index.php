<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Gallery</title>
</head>
<body>
<div id="gallery"></div>
<div>
    <button id="loadButton">Load More</button>
</div>
<script>
    let gallery = document.getElementById('gallery');
    let loadButton = document.getElementById('loadButton');

    function addItem(src) {
        // <img src="https://picsum.photos/200/300?random=123">
        let element = document.createElement("img")
        element.src = src;
        gallery.append(element)
    }

    function loadMore() {
        fetch('more.php')
            .then((response) => {
                return response.json()
            })
            .then((srcArray) => {
                srcArray.map(src => addItem(src))
            })
    }

    loadMore();

    loadButton.addEventListener('click', loadMore);
</script>
</body>
</html>
