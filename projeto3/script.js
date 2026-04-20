document.addEventListener('DOMContentLoaded', () => {
    const menuItems = document.querySelectorAll('.menu-item');
    const mobileMenuItems = document.querySelectorAll('.mobile-menu-item');
    const sections = document.querySelectorAll('section[id]');
    const hamburgerButton = document.querySelector('.hamburger-menu');
    const mobileMenu = document.querySelector('.mobile-menu');
    const closeMobileMenuButton = document.querySelector('.close-mobile-menu');
    const animatedElements = document.querySelectorAll('.animate-on-scroll');

    const removeActiveClass = () => {
        menuItems.forEach(item => {
            item.classList.remove('active');
        });
        mobileMenuItems.forEach(item => {
            item.classList.remove('active');
        });
    };

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

    const onScroll = () => {
        const scrollY = window.pageYOffset;
        sections.forEach(current => {
            const sectionHeight = current.offsetHeight;
            const sectionTop = current.offsetTop - 80;
            const sectionId = current.getAttribute('id');
            if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
                removeActiveClass();
                addActiveClass(sectionId);
            }
        });
    };

    window.addEventListener('scroll', onScroll);
    onScroll();

    menuItems.forEach(item => {
        item.addEventListener('click', (e) => {
            e.preventDefault();
            const targetId = item.getAttribute('href').substring(1);
            const targetSection = document.getElementById(targetId);
            if (targetSection) {
                window.scrollTo({
                    top: targetSection.offsetTop - 70,
                    behavior: 'smooth'
                });
                removeActiveClass();
                addActiveClass(targetId);
            }
        });
    });

    hamburgerButton.addEventListener('click', () => {
        mobileMenu.classList.add('is-open');
    });

    closeMobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.remove('is-open');
    });

    mobileMenuItems.forEach(item => {
        item.addEventListener('click', (e) => {
            e.preventDefault();
            const targetId = item.getAttribute('href').substring(1);
            const targetSection = document.getElementById(targetId);
            if (targetSection) {
                window.scrollTo({
                    top: targetSection.offsetTop - 70,
                    behavior: 'smooth'
                });
                mobileMenu.classList.remove('is-open');
                removeActiveClass();
                addActiveClass(targetId);
            }
        });
    });

    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.2
    };

    const observerCallback = (entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const delay = entry.target.dataset.delay ? parseInt(entry.target.dataset.delay) : 0;
                setTimeout(() => {
                    entry.target.classList.add('is-visible');
                }, delay);
            } else {
                entry.target.classList.remove('is-visible');
            }
        });
    };

    const observer = new IntersectionObserver(observerCallback, observerOptions);

    animatedElements.forEach(element => {
        observer.observe(element);
    });
});