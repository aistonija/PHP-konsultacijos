const form = document.querySelector("form");

if (form) {
  const insert_movie = () => {
    const form_data = new FormData(form);

    fetch("api/create.php", {
      method: "POST",
      body: form_data,
    })
      .then((response) => {
        return response.json();
      })
      .then((data) => {
        document.querySelectorAll(".movie_error").forEach((value) => {
          value.textContent = "";
        });
        if (data.status === "OK") {
          showMessage("text-success", "Operation was successful");
        } else {
          for (let key in data.errors) {
            let value = data.errors[key];
            let error_element = document.getElementById(`error_${key}`);
            if (error_element) {
              error_element.textContent = value;
            }
          }
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
    movies_container.innerHTML = "";

    const delete_movie = (movie) => {
      const form_data = new FormData();
      form_data.append("id", movie.id);
      fetch("api/delete.php", {
        method: "POST",
        body: form_data,
      })
        .then(() => {
          load_movies();
          alert("Movie Deleted");
        })
        .catch((err) => {
          showMessage("text-danger", err);
        });
    };

    const edit_movie = (movie) => {
      window.location = "editPost.php?id=" + movie.id;
    };

    const create_movie_table = (movie) => {
      const div = document.createElement("div");
      const img = document.createElement("img");
      const title = document.createElement("h2");
      const year = document.createElement("h5");
      const genre = document.createElement("h5");
      const editbtn = document.createElement("button");
      const deletebtn = document.createElement("button");
      img.src = movie.movie_img;
      img.classList.add("image", "w-25");
      title.textContent = movie.movie_title;
      title.classList.add("text-info");
      year.textContent = movie.movie_year;
      genre.textContent = movie.movie_genre;

      editbtn.textContent = "Edit";
      editbtn.addEventListener("click", () => {
        edit_movie(movie);
      });

      deletebtn.textContent = "Delete";
      deletebtn.addEventListener("click", () => {
        delete_movie(movie);
      });

      div.append(img, title, year, genre, editbtn, deletebtn);
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
