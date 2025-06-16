document.addEventListener('DOMContentLoaded', () => {
    const qrCode = document.querySelector('.footer-qr');
    qrCode.addEventListener('mouseover', () => {
        qrCode.style.opacity = '0.8';
    });
    qrCode.addEventListener('mouseout', () => {
        qrCode.style.opacity = '1';
    });
});