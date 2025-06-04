document.addEventListener("DOMContentLoaded", function () {
  // Elements
  const phoneInput = document.getElementById("phone-number");
  const countryCodeSelect = document.getElementById("country-code");
  const continueBtn = document.querySelector(".continue-btn");
  const fbBtn = document.querySelector(".fb-btn");
  const ggBtn = document.querySelector(".gg-btn");
  const qrTimer = document.querySelector(".qr-code p:last-child");

  // Phone/Email Validation
  function validateInput(input) {
    const phoneRegex = /^\d{9,12}$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return phoneRegex.test(input) || emailRegex.test(input);
  }

  // Handle Continue Button Click
  continueBtn.addEventListener("click", function () {
    const inputValue = phoneInput.value.trim();
    const countryCode = countryCodeSelect.value;

    if (!inputValue) {
      alert("Vui lòng nhập số điện thoại hoặc email.");
      return;
    }

    if (!validateInput(inputValue)) {
      alert("Số điện thoại hoặc email không hợp lệ.");
      return;
    }

    // Simulate form submission
    console.log(`Submitting: ${countryCode}${inputValue}`);
    alert("Tiếp tục với " + countryCode + inputValue);
    // Add actual form submission logic here (e.g., API call)
  });

  // Social Login Handlers
  fbBtn.addEventListener("click", function () {
    alert("Đăng nhập bằng Facebook - Chức năng này cần tích hợp Facebook SDK.");
    // Placeholder for Facebook SDK login
  });

  ggBtn.addEventListener("click", function () {
    alert(
      "Đăng nhập bằng Google - Chức năng này cần tích hợp Google Sign-In API."
    );
    // Placeholder for Google Sign-In API
  });

  // QR Code Timer
  let timeLeft = 1 * 60 + 58; // 04:58 in seconds
  function updateTimer() {
    if (timeLeft <= 0) {
      qrTimer.textContent = "Mã đã hết hạn";
      return;
    }
    const minutes = Math.floor(timeLeft / 60);
    const seconds = timeLeft % 60;
    qrTimer.textContent = `Mã sẽ hết hạn sau ${minutes
      .toString()
      .padStart(2, "0")}:${seconds.toString().padStart(2, "0")}`;
    timeLeft--;
  }
  updateTimer();
  setInterval(updateTimer, 1000);
});
