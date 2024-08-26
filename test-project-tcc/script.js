document.addEventListener('DOMContentLoaded', () => {
    const loginLink = document.getElementById('loginLink');
    const signUpLink = document.getElementById('signUpLink');
    const loginLinkBack = document.getElementById('loginLinkBack');
    const loginForm = document.getElementById('loginForm');
    const signupForm = document.getElementById('signupForm');
    const body = document.body;

    function closeForms() {
        loginForm.classList.add('hidden');
        signupForm.classList.add('hidden');
        body.classList.remove('blurred-background');
    }

    // Mostrar/ocultar o formulário de login e aplicar o blur ao fundo
    loginLink.addEventListener('click', (event) => {
        event.preventDefault();
        loginForm.classList.toggle('hidden');
        signupForm.classList.add('hidden'); // Certifica-se de que o formulário de cadastro esteja oculto
        body.classList.toggle('blurred-background');
    });

    // Mostrar o formulário de cadastro
    signUpLink.addEventListener('click', (event) => {
        event.preventDefault();
        loginForm.classList.add('hidden');
        signupForm.classList.remove('hidden');
    });

    // Voltar para o formulário de login
    loginLinkBack.addEventListener('click', (event) => {
        event.preventDefault();
        signupForm.classList.add('hidden');
        loginForm.classList.remove('hidden');
    });

    // Fechar os formulários ao clicar fora
    document.addEventListener('click', (event) => {
        if (
            !loginForm.contains(event.target) && 
            !signupForm.contains(event.target) && 
            !loginLink.contains(event.target) && 
            !signUpLink.contains(event.target)
        ) {
            closeForms();
        }
    });
});
