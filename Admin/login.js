function handleLogin() {
  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;

  // Kiểm tra thông tin đăng nhập (có thể thay đổi thành API hoặc database sau)
  const validEmail = "fake@.com.canhcanh";
  const validPassword = "vip999";

  if (email === validEmail && password === validPassword) {
    localStorage.setItem('isLoggedIn', 'true');
    localStorage.setItem('userEmail', email); // Lưu email để sử dụng sau
    window.location.href = '/dashboard/Dashboard.html'; // Chuyển hướng đến dashboard
  } else {
    alert('có cái mật khẩu cũng sai.');
  }
}

// Hiệu ứng đổi màu cho 4 chấm
function changeCircleColors() {
  const colors = ['#ff8787', '#6ff1c3', '#87c1ff', '#ffeb99'];
  const circles = [
    document.getElementById('circle1'),
    document.getElementById('circle2'),
    document.getElementById('circle3'),
    document.getElementById('circle4')
  ];
  let currentIndex = 0;

  setInterval(() => {
    circles.forEach((circle, index) => {
      const nextIndex = (currentIndex + index) % colors.length;
      circle.style.background = colors[nextIndex];
    });
    currentIndex = (currentIndex + 1) % colors.length;
  }, 1000);
}

// Khởi chạy hiệu ứng đổi màu
window.onload = changeCircleColors;