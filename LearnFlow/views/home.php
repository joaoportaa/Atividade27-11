<div class="text-center my-10">
    <h2 class="text-3xl font-bold mb-6 text-gray-800">Bem-vindo ao seu fluxo de aprendizado</h2>
    
    <!-- Carrossel Interativo com Setas e Centralizado -->
    <div class="relative w-full max-w-xl mx-auto rounded-xl overflow-hidden shadow-2xl bg-gray-300">
        
        <!-- Contêiner de Slides -->
        <div id="carousel-container" class="flex transition-transform duration-500 ease-in-out">
            <!-- Os slides serão injetados aqui via JS -->
        </div>

        <!-- Botão Anterior -->
        <button onclick="prevSlide()" class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-3 hover:bg-opacity-75 transition rounded-r-lg">
            &lt;
        </button>

        <!-- Botão Próximo -->
        <button onclick="nextSlide()" class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-3 hover:bg-opacity-75 transition rounded-l-lg">
            &gt;
        </button>

    </div>
    
    <p class="mt-8 text-lg text-gray-600">A melhor plataforma para organizar suas matérias, anotações e revisões.</p>
    <p class="text-sm text-gray-500">Clique nas setas para navegar entre as imagens de inspiração.</p>
</div>

<script>
    // Script do Carrossel Interativo
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
</script>