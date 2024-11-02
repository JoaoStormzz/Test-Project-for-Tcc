const toggleButton = document.getElementById('toggleTheme');
const body = document.body;
const header = document.querySelector('header'); // Seleciona o header
const mainContent = document.querySelector('.main-content'); // Seleciona o main-content

toggleButton.addEventListener('click', function () {
    body.classList.toggle('dark-theme'); // Alterna a classe dark-theme no body
    header.classList.toggle('dark-theme'); // Alterna a classe dark-theme no header
    mainContent.classList.toggle('dark-theme'); // Alterna a classe dark-theme na main-content
});

function autoResize(textarea) {
    textarea.style.height = 'auto';  // Reseta a altura para recalcular
    textarea.style.height = textarea.scrollHeight + 'px';  // Ajusta a altura ao conteúdo
}