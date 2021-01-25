<?php include 'includes/header.php'; ?>
<div class="container mt-5">
    <form class="d-flex flex-column w-50 m-auto" method="POST">
        <input class="mb-2 p-2" type="url" name="movie_img" placeholder="Provide Movie Image as URL" />
        <div id="error_movie_img" class="movie_error text-danger"></div>
        <input class="mb-2 p-2" type="text" name="movie_title" placeholder="Enter Movie Name" />
        <div id="error_movie_title" class="movie_error text-danger"></div>
        <input class="mb-2 p-2" type="text" name="movie_year" placeholder="Enter Year Movie was released" />
        <div id="error_movie_year" class="movie_error text-danger"></div>


        <label for="genre">Check one Genre</label>
        <div>
            <input type="radio" id="genre_fantasy" name="movie_genre" value="Fantasy" checked />
            <label for="genre_fantasy">Fantasy</label>
        </div>
        <div>
            <input type="radio" id="genre_drama" name="movie_genre" value="Drama" />
            <label for="genre_drama">Drama</label>
        </div>

        <div>
            <input type="radio" id="genre_comedy" name="movie_genre" value="Comedy" />
            <label for="genre_comedy">Comedy</label>
        </div>

        <div>
            <input type="radio" id="genre_action" name="movie_genre" value="Action" />
            <label for="genre_action">Action</label>
        </div>
        <div class="w-100 text-center">
            <button class="mt-3 btn btn-primary w-50" type="submit" name="butonke" value="submit">Add Movie</button>
        </div>
    </form>
    <div class="message"></div>
</div>
</body>
<?php include 'includes/footer.php'; ?>