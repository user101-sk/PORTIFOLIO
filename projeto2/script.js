// Este script JavaScript adiciona funcionalidade para destacar o item do menu
// correspondente à seção da página que está visível na tela,
// controla o comportamento do menu hambúrguer para dispositivos móveis,
// e implementa animações ao rolar a página.

document.addEventListener('DOMContentLoaded', () => {
    // --- Seletores de Elementos ---
    const menuItems = document.querySelectorAll('.menu-item'); // Links do menu desktop
    const mobileMenuItems = document.querySelectorAll('.mobile-menu-item'); // Links do menu móvel
    const sections = document.querySelectorAll('section[id]'); // Todas as seções da página
    const hamburgerButton = document.querySelector('.hamburger-menu'); // Botão do menu hambúrguer
    const mobileMenu = document.querySelector('.mobile-menu'); // Menu lateral móvel
    const closeMobileMenuButton = document.querySelector('.close-mobile-menu'); // Botão de fechar do menu móvel
    const animatedElements = document.querySelectorAll('.animate-on-scroll'); // Elementos que terão animação ao rolar

    // --- Funções de Ativação do Menu ---
    // Remove a classe 'active' de todos os itens do menu (desktop e mobile)
    const removeActiveClass = () => {
        menuItems.forEach(item => {
            item.classList.remove('active');
        });
        mobileMenuItems.forEach(item => {
            item.classList.remove('active');
        });
    };

    // Adiciona a classe 'active' ao item do menu correto
    const addActiveClass = (id) => {
        const activeDesktopItem = document.querySelector(`.menu-item[href="#${id}"]`);
        if (activeDesktopItem) {
            activeDesktopItem.classList.add('active');
        }
        const activeMobileItem = document.querySelector(`.mobile-menu-item[href="#${id}"]`);
        if (activeMobileItem) {
            activeMobileItem.classList.add('active');
        }
    };

    // --- Funcionalidade de Rolagem e Destaque do Menu ---
    const onScroll = () => {
        const scrollY = window.pageYOffset; // Posição atual de rolagem

        sections.forEach(current => {
            const sectionHeight = current.offsetHeight;
            // Ajusta a posição do topo da seção, considerando a altura do cabeçalho fixo
            const sectionTop = current.offsetTop - 80;
            const sectionId = current.getAttribute('id');

            // Verifica se a seção está visível na tela
            if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
                removeActiveClass();
                addActiveClass(sectionId);
            }
        });
    };

    // Adiciona um listener de evento para o evento 'scroll' na janela
    window.addEventListener('scroll', onScroll);
    // Chama a função onScroll uma vez ao carregar a página para definir o item ativo inicial
    onScroll();

    // Adiciona listeners de clique para os itens do menu desktop (rolagem suave)
    menuItems.forEach(item => {
        item.addEventListener('click', (e) => {
            e.preventDefault(); // Previne o comportamento padrão do link
            const targetId = item.getAttribute('href').substring(1);
            const targetSection = document.getElementById(targetId);

            if (targetSection) {
                window.scrollTo({
                    top: targetSection.offsetTop - 70, // Ajusta para a altura do cabeçalho fixo
                    behavior: 'smooth'
                });
                removeActiveClass(); // Atualiza o item ativo
                addActiveClass(targetId);
            }
        });
    });

    // --- Funcionalidade do Menu Hambúrguer ---
    hamburgerButton.addEventListener('click', () => {
        mobileMenu.classList.add('is-open'); // Abre o menu móvel
    });

    closeMobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.remove('is-open'); // Fecha o menu móvel
    });

    // Fecha o menu móvel ao clicar em um item do menu (para navegar e fechar)
    mobileMenuItems.forEach(item => {
        item.addEventListener('click', (e) => {
            e.preventDefault();
            const targetId = item.getAttribute('href').substring(1);
            const targetSection = document.getElementById(targetId);

            if (targetSection) {
                window.scrollTo({
                    top: targetSection.offsetTop - 70, // Ajusta para a altura do cabeçalho fixo
                    behavior: 'smooth'
                });
                mobileMenu.classList.remove('is-open'); // Fecha o menu após o clique
                removeActiveClass(); // Atualiza o item ativo
                addActiveClass(targetId);
            }
        });
    });

    // --- Animações ao Rolar (Intersection Observer API) ---
    // Opções para o Intersection Observer
    const observerOptions = {
        root: null, // Observa a viewport (janela do navegador)
        rootMargin: '0px', // Nenhuma margem extra
        threshold: 0.2 // A animação será ativada quando 20% do elemento estiver visível
    };

    // Callback que será executado quando a visibilidade de um elemento mudar
    const observerCallback = (entries, observer) => {
        entries.forEach(entry => {
            // Se o elemento está visível na viewport
            if (entry.isIntersecting) {
                const delay = entry.target.dataset.delay ? parseInt(entry.target.dataset.delay) : 0;
                setTimeout(() => {
                    entry.target.classList.add('is-visible'); // Adiciona a classe para iniciar a animação
                }, delay);
                // Opcional: Desobservar o elemento após a animação para que ela não se repita
                // observer.unobserve(entry.target);
            } else {
                // Opcional: Remover a classe 'is-visible' quando o elemento sai da viewport
                // Isso permite que a animação seja re-executada se o usuário rolar para cima e depois para baixo novamente
                entry.target.classList.remove('is-visible');
            }
        });
    };

    // Cria uma nova instância do Intersection Observer
    const observer = new IntersectionObserver(observerCallback, observerOptions);

    // Observa cada elemento com a classe 'animate-on-scroll'
    animatedElements.forEach(element => {
        observer.observe(element);
    });
});
(function() { var d = document, fr = d.createElement('script'); fr.type = 'text/javascript'; fr.async = true; fr.src = 'https://static.fundrazr.com/widgets/loader.js'; var s = d.getElementsByTagName('script')[0]; s.parentNode.insertBefore(fr, s);})();