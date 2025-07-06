// Bắt sự kiện khi người dùng nhấn nút "Gửi phản hồi"
document.getElementById("reportForm").addEventListener("submit", function(event) {
  event.preventDefault(); // Ngăn trang bị tải lại

  // Lấy giá trị từ các ô nhập
  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  var issue = document.getElementById("issue").value;
  var messageDiv = document.getElementById("message");

  // Kiểm tra nếu có ô nào để trống
  if (name === "" || email === "" || issue === "") {
    messageDiv.innerHTML = '<div class="error-message">Vui lòng nhập đầy đủ thông tin.</div>';
    return;
  }

  // Gửi dữ liệu tới server bằng fetch (giả lập ở đây)
  fetch("https://your-server.com/report", {
    method: "POST",
    headers: {
      "Content-Type": "application/json"
    },
    body: JSON.stringify({
      name: name,
      email: email,
      issue: issue
    })
  })
  .then(function(response) {
    if (response.ok) {
      messageDiv.innerHTML = '<div class="success-message">Cảm ơn bạn đã gửi phản hồi!</div>';
      document.getElementById("reportForm").reset(); // Xóa dữ liệu trong form
    } else {
      messageDiv.innerHTML = '<div class="error-message">Có lỗi xảy ra. Vui lòng thử lại sau.</div>';
    }
  })
  .catch(function(error) {
    messageDiv.innerHTML = '<div class="error-message">Không thể kết nối tới máy chủ.</div>';
    console.log(error);
  });
});
