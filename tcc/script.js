document.addEventListener('DOMContentLoaded', () => {
    document.addEventListener("scroll", function () {
        const header = document.querySelector(".page-header");
        if (header) {
            header.style.height = window.scrollY > 200 ? "50px" : "150px";
        }

        const iconheader = document.querySelector(".icone");
        if (iconheader) {
            iconheader.style.height = window.scrollY > 200 ? "50px" : "150px";
        }

    });
});