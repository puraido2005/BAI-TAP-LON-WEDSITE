function showPopup(title, description) {
  document.getElementById("popupTitle").textContent = title;
  document.getElementById("popupDescription").textContent = description;
  document.getElementById("popup").style.display = "block";
  document.getElementById("overlay").style.display = "block";
}

function closePopup() {
  document.getElementById("popup").style.display = "none";
  document.getElementById("overlay").style.display = "none";
}
