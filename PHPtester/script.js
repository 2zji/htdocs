const lightBulb = document.querySelector('.light-bulb');
const switchButton = document.getElementById('switch');
switchButton.addEventListener('click', () => {
lightBulb.classList.toggle('on');
});