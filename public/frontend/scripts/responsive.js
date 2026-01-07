const menuBtn = document.getElementById('menu-btn');
const mobileMenu = document.getElementById('mobile-menu');

menuBtn.addEventListener('click', () => {
    toggleMenu();
});

const toggleMenu = () => {
    if (mobileMenu.style.transform === 'scaleY(1)') {
        mobileMenu.style.transform = 'scaleY(0)';
        mobileMenu.style.opacity = '0%';
    } else {
        mobileMenu.style.transform = 'scaleY(1)';
        mobileMenu.style.opacity = '100%';
    }
};