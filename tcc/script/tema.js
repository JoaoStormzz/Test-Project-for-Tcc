function toggleTheme() {
    let body = document.body;
    body.classList.toggle("light-mode");
    body.classList.toggle("dark-mode");
}

window.onload = checkTimeAndChangeTheme;