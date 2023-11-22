document.addEventListener('DOMContentLoaded', () => {
  eventListeners();
  darkmode();
});

function darkmode() {
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');
    const botonDarkMode = document.querySelector('.dark-mode-boton');

    if (prefiereDarkMode.matches) {
        document.body.classList.add('dark-mode');
    }

    botonDarkMode.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
    });

    prefiereDarkMode.addEventListener('change', () => {
        document.body.classList.toggle('dark-mode');
    });
}

function eventListeners() {
    const mobilMenu = document.querySelector('.mobile-menu');

    mobilMenu.addEventListener('click', navegacionResponsive);

}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');
    
    navegacion.classList.toggle('mostrar');
}