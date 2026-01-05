(function () {
    "use strict";
    
    // Dropdown on mouse hover - Modern vanilla JS
    function toggleNavbarMethod() {
        const dropdowns = document.querySelectorAll('.navbar .dropdown');
        
        if (window.innerWidth > 992) {
            dropdowns.forEach(dropdown => {
                const toggle = dropdown.querySelector('.dropdown-toggle');
                
                dropdown.addEventListener('mouseenter', () => {
                    if (toggle) {
                        toggle.click();
                        toggle.setAttribute('aria-expanded', 'true');
                    }
                });
                
                dropdown.addEventListener('mouseleave', () => {
                    if (toggle) {
                        toggle.click();
                        toggle.blur();
                        toggle.setAttribute('aria-expanded', 'false');
                    }
                });
            });
        } else {
            dropdowns.forEach(dropdown => {
                dropdown.replaceWith(dropdown.cloneNode(true));
            });
        }
    }
    
    // Initialize on load
    document.addEventListener('DOMContentLoaded', () => {
        toggleNavbarMethod();
    });
    
    // Re-initialize on resize with debounce
    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(toggleNavbarMethod, 250);
    });
    
    // Back to top button - Smooth with requestAnimationFrame
    const backToTop = document.querySelector('.back-to-top');
    
    if (backToTop) {
        // Show/hide on scroll with throttle
        let lastScroll = 0;
        let ticking = false;
        
        window.addEventListener('scroll', () => {
            lastScroll = window.pageYOffset;
            
            if (!ticking) {
                window.requestAnimationFrame(() => {
                    if (lastScroll > 100) {
                        backToTop.style.display = 'block';
                        backToTop.style.animation = 'slideInUp 0.5s ease-out';
                    } else {
                        backToTop.style.display = 'none';
                    }
                    ticking = false;
                });
                ticking = true;
            }
        });
        
        // Smooth scroll to top
        backToTop.addEventListener('click', (e) => {
            e.preventDefault();
            
            const scrollDuration = 1000;
            const scrollStep = -window.pageYOffset / (scrollDuration / 15);
            
            const scrollInterval = setInterval(() => {
                if (window.pageYOffset !== 0) {
                    window.scrollBy(0, scrollStep);
                } else {
                    clearInterval(scrollInterval);
                }
            }, 15);
        });
    }
    
    // Enhanced Image Loading with Intersection Observer
    const images = document.querySelectorAll('img[loading="lazy"]');
    
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.classList.add('loaded');
                    observer.unobserve(img);
                }
            });
        }, {
            rootMargin: '50px'
        });
        
        images.forEach(img => {
            img.classList.add('img-blur-up');
            imageObserver.observe(img);
        });
    }
    
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href === '#' || href === '#!') return;
            
            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Add active state to navigation on scroll
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
    
    window.addEventListener('scroll', () => {
        let current = '';
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            if (window.pageYOffset >= sectionTop - 200) {
                current = section.getAttribute('id');
            }
        });
        
        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${current}`) {
                link.classList.add('active');
            }
        });
    });

})();


    // Price carousel
    $(".price-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 45,
        dots: false,
        loop: false,
        nav : true,
        navText : [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            992:{
                items:2
            },
            1200:{
                items:3
            }
        }
    });


    // Team carousel
    $(".team-carousel, .related-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 45,
        dots: false,
        loop: false,
        nav : true,
        navText : [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            992:{
                items:2
            }
        }
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        items: 1,
        dots: true,
        loop: true,
    });
    
})(jQuery);

