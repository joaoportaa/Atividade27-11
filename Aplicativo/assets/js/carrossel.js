 const images = [
        { url: "https://images.unsplash.com/photo-1497633762265-9d179a990aa6?w=800&q=80", alt: "Estudando no Computador" },
        { url: "https://images.unsplash.com/photo-1513258496098-b1a737505391?w=800&q=80", alt: "Estudando com Livros" },
        { url: "https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=800&q=80", alt: "Estudo em Grupo" }
    ];
    
    let currentSlide = 0;
    const container = document.getElementById('carousel-container');
    const slideWidth = 100; // 100% da largura do contêiner

    // 1. Cria os elementos HTML (os slides)
    images.forEach(img => {
        const div = document.createElement('div');
        div.className = 'flex-shrink-0 w-full h-80'; // Fixa a largura e altura do slide
        div.innerHTML = `<img src="${img.url}" alt="${img.alt}" class="w-full h-full object-cover">`;
        container.appendChild(div);
    });

    // 2. Função para atualizar a posição do carrossel
    function updateCarousel() {
        const offset = -currentSlide * slideWidth;
        container.style.transform = `translateX(${offset}%)`;
    }

    // 3. Funções de Navegação Manual
    function nextSlide() {
        currentSlide = (currentSlide + 1) % images.length;
        updateCarousel();
        resetAutoSlide();
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + images.length) % images.length;
        updateCarousel();
        resetAutoSlide();
    }

    // 4. Automação
    let autoSlideInterval = setInterval(nextSlide, 3500); // Rotação automática a cada 3.5s

    function resetAutoSlide() {
        clearInterval(autoSlideInterval);
        autoSlideInterval = setInterval(nextSlide, 3500);
    }
    
    // Garante que o carrossel comece na posição 0
    updateCarousel();