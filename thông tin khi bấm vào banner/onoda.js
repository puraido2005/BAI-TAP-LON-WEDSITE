// Extract query parameters from the URL
const urlParams = new URLSearchParams(window.location.search);
const movieTitle = urlParams.get('title');
const movieDescription = urlParams.get('description');

// Update the page with the movie details
document.getElementById('movieTitle').textContent = movieTitle;
document.getElementById('movieDescription').textContent = movieDescription;

// Map movie titles to their poster images
const posterMap = {
  "Thám tử kiên": "/thông tin khi bấm vào banner/hình/thamtukiePOSTER.jpg",
  "MƯỢN HỒN ĐOẠT XÁC": "/thông tin khi bấm vào banner/hình/muonhondoatxacPoster.jpg",
  "LẬT MẶT 8: VÒNG TAY NẮNG": "/thông tin khi bấm vào banner/hình/lm8Poster(1).jpg",
  "ONODA - 10.000 ĐÊM TRONG RỪNG": "/thông tin khi bấm vào banner/hình/onodaPOSTER.jpg",
  "LỒNG TIẾNG - PHIM ĐIỆN ẢNH DORAEMON: NOBITA VÀ CUỘC PHIÊU LƯU VÀO THẾ GIỚI TRONG TRANH": "/thông tin khi bấm vào banner/hình/doraemon2025Poster.jpg",
  "NHIỆM VỤ: BẤT KHẢ THI - NGHIỆP BÁO CUỐI CÙNG": "/thông tin khi bấm vào banner/hình/mi2025Poster.jpg"
};

// Set the poster image based on the movie title
const posterImage = document.getElementById('moviePoster');
posterImage.src = posterMap[movieTitle] || "defaultPoster.jpg"; // Fallback if no match

// Add functionality to the "Play Now" button
document.querySelector('.play-btn').addEventListener('click', () => {
  alert(`Playing ${movieTitle}...`);
});

// Add functionality to the "Add to List" button
document.querySelector('.add-btn').addEventListener('click', () => {
  alert(`Added ${movieTitle} to your list!`);
});