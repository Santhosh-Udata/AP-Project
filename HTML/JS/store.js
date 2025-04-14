function changeColor(button) {
    // Reset all buttons to default color
    const buttons = document.querySelectorAll('.sidebar-btn');
    buttons.forEach(btn => btn.style.backgroundColor = '#f0f0f0');

    // Change the clicked button's color
    button.style.backgroundColor = '#a0c4ff';

    // Ensure sidebar is visible from top to bottom after scrolling 250px
}
const sidebar = document.querySelector('.side-bar');
window.onscroll = function () {
    if (window.scrollY > 250) {
        sidebar.style.position = 'fixed';
        sidebar.style.top = '0';
        sidebar.style.bottom = '0';
    } else {
        sidebar.style.position = 'absolute';
        sidebar.style.top = '250px';
    }
};