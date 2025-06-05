document.addEventListener('DOMContentLoaded', () => {
    const socialIcons = document.querySelectorAll('.social-icons a');
    socialIcons.forEach(icon => {
        icon.addEventListener('mouseover', () => {
            icon.style.opacity = '0.8';
        });
        icon.addEventListener('mouseout', () => {
            icon.style.opacity = '1';
        });
    });
});