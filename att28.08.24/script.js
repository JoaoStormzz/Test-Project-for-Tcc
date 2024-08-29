document.addEventListener('DOMContentLoaded', () => {
    const loadingOverlay = document.getElementById('loadingOverlay');
    const loginLink = document.getElementById('loginLink');
    const signUpLink = document.getElementById('signUpLink');
    const loginLinkBack = document.getElementById('loginLinkBack');
    const loginForm = document.getElementById('loginForm');
    const signupForm = document.getElementById('signupForm');
    const body = document.body;

    function closeForms() {
        if (loginForm) loginForm.classList.add('hidden');
        if (signupForm) signupForm.classList.add('hidden');
        body.classList.remove('blurred-background');
    }

    function showLoading() {
        if (loadingOverlay) loadingOverlay.style.display = 'flex';
    }

    function hideLoading() {
        if (loadingOverlay) loadingOverlay.style.display = 'none';
    }

    // Exibir overlay de carregamento antes da navegação
    document.addEventListener('click', (event) => {
        if (event.target.closest('a[href]') && !event.target.closest('#loginLink, #signUpLink, #loginLinkBack')) {
            event.preventDefault();
            showLoading();
            setTimeout(() => {
                window.location.href = event.target.closest('a').href;
            }, 500);
        }
    });

    // Manipulação dos formulários de login e cadastro
    if (loginLink && loginForm && signupForm && signUpLink && loginLinkBack) {
        loginLink.addEventListener('click', (event) => {
            event.preventDefault();
            loginForm.classList.toggle('hidden');
            signupForm.classList.add('hidden');
            body.classList.toggle('blurred-background');
        });

        signUpLink.addEventListener('click', (event) => {
            event.preventDefault();
            loginForm.classList.add('hidden');
            signupForm.classList.remove('hidden');
            body.classList.add('blurred-background');
        });

        loginLinkBack.addEventListener('click', (event) => {
            event.preventDefault();
            signupForm.classList.add('hidden');
            loginForm.classList.remove('hidden');
            body.classList.add('blurred-background');
        });

        document.addEventListener('click', (event) => {
            if (
                !loginForm.contains(event.target) &&
                !signupForm.contains(event.target) &&
                !loginLink.contains(event.target) &&
                !signUpLink.contains(event.target) &&
                !loginLinkBack.contains(event.target)
            ) {
                closeForms();
            }
        });
    }

    // Manipulação do cabeçalho e ícone
    document.addEventListener("scroll", function () {
        var header = document.querySelector(".page-header");
        if (header) {
            header.style.height = window.scrollY > 200 ? "50px" : "150px";
        }
        
        var iconheader = document.querySelector(".icone");
        if (iconheader) {
            iconheader.style.height = window.scrollY > 200 ? "50px" : "150px";
        }
    });
});
