<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeliveryPro - Gestion des Livraisons</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        /* Hero Section */
        .hero-section {
            max-width: 1400px;
            margin: 0 auto;
            padding: 80px 50px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .hero-content {
            color: white;
            animation: fadeInLeft 1s ease-out;
        }

        .hero-content h1 {
            font-size: 3.5em;
            margin-bottom: 20px;
            line-height: 1.2;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .hero-content p {
            font-size: 1.3em;
            margin-bottom: 40px;
            opacity: 0.95;
            line-height: 1.6;
        }

        .cta-buttons {
            display: flex;
            gap: 20px;
        }

        .btn-primary {
            background: white;
            color: #667eea;
            padding: 15px 40px;
            font-size: 1.1em;
        }

        .btn-primary:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 30px rgba(255, 255, 255, 0.3);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 15px 40px;
            font-size: 1.1em;
            border: 2px solid white;
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: scale(1.05);
        }

        .hero-image {
            animation: fadeInRight 1s ease-out;
        }

        .delivery-illustration {
            width: 100%;
            height: 400px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 150px;
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            animation: float 3s ease-in-out infinite;
        }

        /* Features Section */
        .features-section {
            max-width: 1400px;
            margin: 0 auto;
            padding: 60px 50px;
        }

        .features-title {
            text-align: center;
            color: white;
            font-size: 2.5em;
            margin-bottom: 50px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 35px;
            text-align: center;
            transition: all 0.3s ease;
            animation: fadeInUp 1s ease-out;
            animation-fill-mode: both;
        }

        .feature-card:nth-child(1) { animation-delay: 0.1s; }
        .feature-card:nth-child(2) { animation-delay: 0.2s; }
        .feature-card:nth-child(3) { animation-delay: 0.3s; }
        .feature-card:nth-child(4) { animation-delay: 0.4s; }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }

        .feature-icon {
            font-size: 60px;
            margin-bottom: 20px;
        }

        .feature-card h3 {
            color: #333;
            font-size: 1.5em;
            margin-bottom: 15px;
        }

        .feature-card p {
            color: #666;
            line-height: 1.6;
        }

        /* Animations */
        @keyframes slideDown {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        @keyframes rotate {
            0%, 100% {
                transform: rotate(0deg);
            }
            50% {
                transform: rotate(5deg);
            }
        }
        a{
            text-decoration: none;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar {
                padding: 15px 20px;
                flex-direction: column;
                gap: 20px;
            }

            .hero-section {
                grid-template-columns: 1fr;
                padding: 40px 20px;
                gap: 40px;
            }

            .hero-content h1 {
                font-size: 2.5em;
            }

            .cta-buttons {
                flex-direction: column;
            }

            .features-section {
                padding: 40px 20px;
            }

            .auth-buttons {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    
        <?php
            include "../views/nav.php";

        ?>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1>Gérez vos livraisons en toute simplicité</h1>
            <p>Une plateforme complète pour optimiser et suivre toutes vos opérations de livraison en temps réel.</p>
            <div class="cta-buttons">
                <a href="inscription.html"><button class="btn btn-primary">Démarrer maintenant</button></a>
                <button class="btn btn-secondary" onclick="handleDecouvrir()">Découvrir</button>
            </div>
        </div>
        <div class="hero-image">
            <div class="delivery-illustration">📦</div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <h2 class="features-title">Nos Fonctionnalités</h2>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🚀</div>
                <h3>Suivi en Temps Réel</h3>
                <p>Suivez vos colis et livraisons en temps réel avec notre système de géolocalisation avancé.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📊</div>
                <h3>Tableau de Bord</h3>
                <p>Visualisez toutes vos statistiques et performances dans un tableau de bord intuitif.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🔔</div>
                <h3>Notifications</h3>
                <p>Recevez des alertes instantanées pour chaque étape de la livraison.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">⚡</div>
                <h3>Optimisation</h3>
                <p>Optimisez vos itinéraires et réduisez vos coûts de livraison automatiquement.</p>
            </div>
        </div>
    </section>

    <script>

        function handleDecouvrir() {
            animateButton(event.target);
            
            setTimeout(() => {
                // Scroll vers les fonctionnalités
                document.querySelector('.features-section').scrollIntoView({ 
                    behavior: 'smooth' 
                });
            }, 300);
        }

        function animateButton(btn) {
            btn.style.transform = 'scale(0.95)';
            setTimeout(() => {
                btn.style.transform = '';
            }, 150);
        }

        // Animation des cartes au scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.feature-card').forEach(card => {
            observer.observe(card);
        });

        // Effet parallaxe léger sur l'illustration
        document.addEventListener('mousemove', (e) => {
            const illustration = document.querySelector('.delivery-illustration');
            const x = (e.clientX / window.innerWidth - 0.5) * 20;
            const y = (e.clientY / window.innerHeight - 0.5) * 20;
            illustration.style.transform = `translate(${x}px, ${y}px)`;
        });
    </script>
</body>
</html>