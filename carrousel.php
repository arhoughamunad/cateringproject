<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Restaurant Carousel</title> -->
</head>

<body>
    <div class="restaurant-carousel-container">
		<!-- Flechas de navegación -->
		<button class="restaurant-carousel-prev">
			<i class="fas fa-chevron-left"></i>
		</button>
		<button class="restaurant-carousel-next">
			<i class="fas fa-chevron-right"></i>
		</button>
        <div class="restaurant-carousel-track">
            <!-- Card 1 -->
            <div class="restaurant-carousel-card">
                <img src="img/catering_services.png" alt="Dish 1">
                <h2>Servicio de catering</h2>
                <p>Nosotros no solo servimos comida, creamos experiencias gastronómicas. Desde una cena romántica hasta un evento empresarial, diseñamos menús pensados para emocionar.</p>
                <a href="formviewer.php?form=1">
                    <button>Solicitar Servicio</button>
                </a>
            </div>
            <!-- Card 2 -->
            <div class="restaurant-carousel-card">
                <img src="img/cocteleria_services.png" alt="Dish 2">
                <h2>Servicio de coctelería</h2>
                <p>Imagina una barra personalizada que cobra vida frente a tus ojos. Nuestro servicio de coctelería no se trata solo de preparar bebidas, sino de crear momentos memorables. Contamos con bartenders apasionados que dominan el arte de la mixología clásica y contemporánea.</p>
                <a href="formviewer.php?form=2">
                    <button>Solicitar Servicio</button>
                </a>
            </div>
            <!-- Card 3 -->
            <div class="restaurant-carousel-card">
                <img src="img/Menaje_services.png" alt="Dish 3">
                <h2>Servicio de alquiler de menaje</h2>
                <p>Elegancia y funcionalidad en cada detalle. Ofrecemos una selección cuidada de menaje —platos, copas, cubiertos, mantelería y más— para que tu evento tenga el estilo que deseas, sin preocuparte por el montaje o la logística.</p>
                <a href="formviewer.php?form=3">
                    <button>Solicitar Servicio</button>
                </a>
            </div>
        </div>
    </div>

    <script>
        const carouselTrack = document.querySelector('.restaurant-carousel-track');
        const cards = document.querySelectorAll('.restaurant-carousel-card');
        const navButtons = document.querySelectorAll('.restaurant-carousel-nav button');
        let currentIndex = 0;
        let autoSlideInterval;
        let startX = 0;
        let isDragging = false;

        // Function to move to a specific card
        const moveToCard = (index) => {
            currentIndex = index;
            const offset = -currentIndex * 100;
            carouselTrack.style.transform = `translateX(${offset}%)`;
            updateNavButtons();
        };

        // Update navigation buttons
        const updateNavButtons = () => {
            navButtons.forEach((button, index) => {
                button.classList.toggle('active', index === currentIndex);
            });
        };

        // Auto slide functionality
        const startAutoSlide = () => {
            autoSlideInterval = setInterval(() => {
                currentIndex = (currentIndex + 1) % cards.length;
                moveToCard(currentIndex);
            }, 3000);
        };

        // Stop auto slide on touch or drag
        const stopAutoSlide = () => {
            clearInterval(autoSlideInterval);
        };

        // Add event listeners for navigation buttons
        navButtons.forEach((button, index) => {
            button.addEventListener('click', () => {
                stopAutoSlide();
                moveToCard(index);
                startAutoSlide();
            });
        });

        // Touch and drag functionality
        const handleDragStart = (clientX) => {
            startX = clientX;
            isDragging = true;
            stopAutoSlide();
        };

        const handleDragMove = (clientX) => {
            if (!isDragging) return;
            const currentX = clientX;
            const diff = startX - currentX;
            if (Math.abs(diff) > 50) {
                isDragging = false;
                if (diff > 0 && currentIndex < cards.length - 1) {
                    moveToCard(currentIndex + 1);
                } else if (diff < 0 && currentIndex > 0) {
                    moveToCard(currentIndex - 1);
                }
                startAutoSlide();
            }
        };

        // Touch events for mobile
        carouselTrack.addEventListener('touchstart', (e) => {
            handleDragStart(e.touches[0].clientX);
        });

        carouselTrack.addEventListener('touchmove', (e) => {
            handleDragMove(e.touches[0].clientX);
        });

        // Mouse events for desktop
        carouselTrack.addEventListener('mousedown', (e) => {
            handleDragStart(e.clientX);
        });

        carouselTrack.addEventListener('mousemove', (e) => {
            handleDragMove(e.clientX);
        });

        carouselTrack.addEventListener('mouseup', () => {
            isDragging = false;
        });

        carouselTrack.addEventListener('mouseleave', () => {
            isDragging = false;
        });

        // Start auto slide on page load
        startAutoSlide();
		// Selecciona los botones de navegación
		const prevButton = document.querySelector('.restaurant-carousel-prev');
		const nextButton = document.querySelector('.restaurant-carousel-next');

		// Evento para retroceder con la flecha izquierda
		prevButton.addEventListener('click', () => {
			stopAutoSlide();
			if (currentIndex > 0) {
				moveToCard(currentIndex - 1);
			} else {
				moveToCard(cards.length - 1); // Si está en la primera, vuelve a la última
			}
			startAutoSlide();
		});

		// Evento para avanzar con la flecha derecha
		nextButton.addEventListener('click', () => {
			stopAutoSlide();
			if (currentIndex < cards.length - 1) {
				moveToCard(currentIndex + 1);
			} else {
				moveToCard(0); // Si está en la última, vuelve a la primera
			}
			startAutoSlide();
		});

    </script>
</body>

</html>