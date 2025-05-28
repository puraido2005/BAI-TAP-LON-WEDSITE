// Kiểm tra trạng thái đăng nhập
console.log("Checking login status...");
if (!localStorage.getItem('isLoggedIn')) {
  console.log("Not logged in, redirecting to login.html");
  window.location.href = '/Admin/login.html';
} else {
  console.log("User is logged in, loading dashboard");
}

let movies = JSON.parse(localStorage.getItem('movies')) || [];
let editIndex = -1;
const moviesPerPage = 6;
let currentPage = 1;

function saveMovie() {
  const title = document.getElementById('movieTitle').value;
  const genre = document.getElementById('movieGenre').value;
  const views = parseInt(document.getElementById('movieViews').value);
  const rating = parseFloat(document.getElementById('movieRating').value);

  if (title && genre && !isNaN(views) && !isNaN(rating) && rating <= 10) {
    const movie = { title, genre, views, rating };
    if (editIndex >= 0) {
      movies[editIndex] = movie;
      editIndex = -1;
    } else {
      movies.push(movie);
    }
    localStorage.setItem('movies', JSON.stringify(movies));
    hideAddMovieForm();
    updateDashboard();
    clearForm();
  } else {
    alert('Please fill all fields correctly (rating 0-10)');
  }
}

function updateDashboard() {
  filterMovies();
  updateStats();
  updatePagination();
}

function updateStats() {
  const totalMovies = movies.length;
  const totalViews = movies.reduce((sum, movie) => sum + movie.views, 0);
  const avgRating = movies.length ? (movies.reduce((sum, movie) => sum + movie.rating, 0) / movies.length).toFixed(1) : 0;

  document.getElementById('totalMovies').textContent = totalMovies;
  document.getElementById('totalViews').textContent = totalViews;
  document.getElementById('avgRating').textContent = avgRating;
  document.getElementById('lastUpdated').textContent = new Date().toLocaleString();
}

function filterMovies() {
  const searchTerm = document.getElementById('searchInput').value.toLowerCase();
  const genreFilter = document.getElementById('genreFilter').value;
  const sortBy = document.getElementById('sortBy').value;

  let filteredMovies = [...movies].filter(movie => {
    const matchesSearch = movie.title.toLowerCase().includes(searchTerm);
    const matchesGenre = !genreFilter || movie.genre === genreFilter;
    return matchesSearch && matchesGenre;
  });

  if (sortBy === 'views') {
    filteredMovies.sort((a, b) => b.views - a.views);
  } else if (sortBy === 'rating') {
    filteredMovies.sort((a, b) => b.rating - a.rating);
  } else {
    filteredMovies.sort((a, b) => a.title.localeCompare(b.title));
  }

  const start = (currentPage - 1) * moviesPerPage;
  const end = start + moviesPerPage;
  const paginatedMovies = filteredMovies.slice(start, end);

  const movieList = document.getElementById('movieList');
  movieList.innerHTML = '';

  paginatedMovies.forEach((movie, index) => {
    const globalIndex = start + index;
    const card = document.createElement('div');
    card.className = 'movie-card';
    card.setAttribute('data-genre', movie.genre);
    card.innerHTML = `
      <h4>${movie.title}</h4>
      <p>Genre: ${movie.genre}</p>
      <p>Views: ${movie.views}</p>
      <p>Rating: ${movie.rating}/10</p>
      <div class="actions">
        <button onclick="editMovie(${globalIndex})">Edit</button>
        <button class="delete" onclick="deleteMovie(${globalIndex})">Delete</button>
      </div>
    `;
    movieList.appendChild(card);
  });
}

function updatePagination() {
  const totalPages = Math.ceil(movies.length / moviesPerPage);
  const pagination = document.getElementById('pagination');
  pagination.innerHTML = '';

  for (let i = 1; i <= totalPages; i++) {
    const button = document.createElement('button');
    button.textContent = i;
    button.disabled = i === currentPage;
    button.onclick = () => {
      currentPage = i;
      filterMovies();
    };
    pagination.appendChild(button);
  }
}

function showAddMovieForm() {
  document.getElementById('formTitle').textContent = 'Add Movie';
  document.getElementById('addMovieForm').style.display = 'flex';
}

function editMovie(index) {
  const movie = movies[index];
  document.getElementById('movieTitle').value = movie.title;
  document.getElementById('movieGenre').value = movie.genre;
  document.getElementById('movieViews').value = movie.views;
  document.getElementById('movieRating').value = movie.rating;
  editIndex = index;
  document.getElementById('formTitle').textContent = 'Edit Movie';
  document.getElementById('addMovieForm').style.display = 'flex';
}

function deleteMovie(index) {
  if (confirm('Are you sure you want to delete this movie? This action cannot be undone.')) {
    movies.splice(index, 1);
    localStorage.setItem('movies', JSON.stringify(movies));
    updateDashboard();
  }
}

function hideAddMovieForm() {
  document.getElementById('addMovieForm').style.display = 'none';
}

function clearForm() {
  document.getElementById('movieTitle').value = '';
  document.getElementById('movieGenre').value = '';
  document.getElementById('movieViews').value = '';
  document.getElementById('movieRating').value = '';
}

function logout() {
  console.log("Logging out...");
  localStorage.removeItem('isLoggedIn');
  localStorage.removeItem('userEmail');
  window.location.href = '/Admin/login.html';
}

// Initial load
updateDashboard();