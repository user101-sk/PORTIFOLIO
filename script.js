document.addEventListener('DOMContentLoaded', () => {
    const animatedElements = document.querySelectorAll('.animate-on-scroll');

    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.2
    };

    const observerCallback = (entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
            }
        });
    };

    const observer = new IntersectionObserver(observerCallback, observerOptions);

    animatedElements.forEach(element => {
        observer.observe(element);
    });
});
// --- Lógica do Dark Mode ---
const themeToggle = document.getElementById('theme-toggle');
const body = document.body;
const icon = themeToggle.querySelector('i');

// Verifica se a pessoa já tinha escolhido o modo escuro antes
if (localStorage.getItem('tema') === 'escuro') {
    body.classList.add('dark-mode');
    icon.classList.replace('fa-moon', 'fa-sun');
}

themeToggle.addEventListener('click', () => {
    // Alterna a classe dark-mode no body
    body.classList.toggle('dark-mode');
    
    // Troca o ícone e salva a escolha no navegador
    if (body.classList.contains('dark-mode')) {
        localStorage.setItem('tema', 'escuro');
        icon.classList.replace('fa-moon', 'fa-sun');
    } else {
        localStorage.setItem('tema', 'claro');
        icon.classList.replace('fa-sun', 'fa-moon');
    }
});