document.addEventListener("scroll", highlightSection);
document.querySelectorAll(".navbar-nav .nav-link").forEach(link => {
    link.addEventListener("click", function() {
        // Espera un momento para permitir que el desplazamiento se complete
        setTimeout(highlightSection, 100);
    });
});

function highlightSection() {
    const sections = document.querySelectorAll("section");
    const navlinks = document.querySelectorAll(".navbar-nav .nav-link");

    let current = ""; 

    sections.forEach((section) => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.offsetHeight;
        const scrollPosition = window.scrollY + 110; // Ajuste para el margen

        // Verifica si el scroll está dentro de la sección
        if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
            current = section.getAttribute("id");
        }        
    });

    navlinks.forEach((link) => {
        link.classList.remove("active");
        // Asegúrate de que solo se resalten secciones válidas
        if (current && link.getAttribute("href") === `#${current}`) {
            link.classList.add("active");
        }
    });
}