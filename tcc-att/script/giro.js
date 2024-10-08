document.querySelector('.cadastrar-link').addEventListener('click', function(e) {
    e.preventDefault(); // Previne o comportamento padrão do link
    const container = document.querySelector('.login-container');
    const link = this;

    // Adiciona a classe de rotação ao contêiner
    container.classList.add('rotate');

    // Aguarda a animação terminar e redireciona
    setTimeout(() => {
        window.location.href = link.href; // Redireciona para a nova página
    }, 600); // Tempo da animação
});