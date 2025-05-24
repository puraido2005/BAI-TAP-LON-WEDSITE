document.getElementById('countryCode').addEventListener('change', function() {
    const phoneInput = document.getElementById('phone');
    phoneInput.value = this.value;
});

document.getElementById('registerForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const phone = document.getElementById('phone').value;
    const countryCode = document.getElementById('countryCode').value;

    let phoneRegex;
    if (countryCode === '+84') {
        phoneRegex = /^\+840[1-9][0-9]{8,9}$/;
    } else if (countryCode === '+1') {
        phoneRegex = /^\+1[0-9]{10}$/;
    } else if (countryCode === '+44') {
        phoneRegex = /^\+44[0-9]{10}$/;
    } else if (countryCode === '+81') {
        phoneRegex = /^\+81[0-9]{10}$/;
    } else if (countryCode === '+86') {
        phoneRegex = /^\+86[0-9]{11}$/;
    }

    if (phoneRegex.test(phone)) {
        alert('Đăng ký thành công! Vui lòng kiểm tra tin nhắn để tiếp tục.');
    } else {
        alert('Số điện thoại không hợp lệ. Vui lòng kiểm tra lại định dạng số theo quốc gia.');
    }
});

document.querySelectorAll('.social-btn').forEach(button => {
    button.addEventListener('click', () => {
        alert(`Đăng nhập bằng ${button.textContent} đang được xử lý...`);
    });
});