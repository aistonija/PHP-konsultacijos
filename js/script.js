const form = document.querySelector("form");

if (form) {
  const insert_movie = () => {
    const form_data = new FormData(form);

    fetch("api/create.php", {
      method: "POST",
      body: form_data,
    })
      .then((response) => {
        if (!response.ok) {
          showMessage("text-danger", response.statusText);
        } else {
          showMessage("text-primary", "Movie added successfully!");
        }
      })
      .catch((err) => {
        showMessage("text-danger", err);
      });
  };

  form.addEventListener("submit", (event) => {
    event.preventDefault();
    insert_movie();
  });

  const showMessage = (textColor, message) => {
    const message_box = document.querySelector(".message");
    const span = document.createElement("span");
    span.textContent = message;
    span.classList.add(textColor);
    message_box.classList.add("text-center", "m-3");
    message_box.append(span);
  };
}

const movies_container = document.querySelector(".movies");

if (movies_container) {
  const load_movies = () => {
    const create_movie_table = (movie) => {
      const div = document.createElement("div");
      const img = document.createElement("img");
      const title = document.createElement("h2");
      const year = document.createElement("h5");
      const genre = document.createElement("h5");
      img.src = movie.movie_img;
      img.classList.add("image", "w-25");
      title.textContent = movie.movie_title;
      title.classList.add("text-info");
      year.textContent = movie.movie_year;
      genre.textContent = movie.movie_genre;

      div.append(img, title, year, genre);
      div.classList.add("movie");

      return div;
    };

    fetch("api/list.php", {
      method: "GET",
    })
      .then((response) => {
        return response.json();
      })
      .then((movies) => {
        movies.forEach((movie) => {
          movies_container.append(create_movie_table(movie));
        });
      });
  };

  window.onload = () => {
    load_movies();
  };
}
