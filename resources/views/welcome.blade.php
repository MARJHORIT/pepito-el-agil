<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sistema de Cajas | Bienvenido</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Outfit', sans-serif;
            min-height: 100vh;
            background: url('https://images.unsplash.com/photo-1557682250-33bd709cbe85?w=1600') center/cover fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        
        /* Overlay degradado */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(30, 58, 138, 0.85), rgba(59, 130, 246, 0.75));
        }
        
        /* Tarjeta principal con efecto Glassmorphism */
        .hero-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-radius: 2rem;
            padding: 2.5rem;
            max-width: 480px;
            width: 90%;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.25);
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.2);
            z-index: 10;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            animation: fadeInUp 0.6s ease-out;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .hero-card:hover {
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 35px 55px rgba(0, 0, 0, 0.3);
        }
        
        /* Logo */
        .logo {
            background: rgba(255, 255, 255, 0.2);
            width: 110px;
            height: 110px;
            border-radius: 2rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            transition: all 0.3s;
            animation: pulseLogo 2s infinite;
        }
        
        @keyframes pulseLogo {
            0%, 100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.3);
            }
            50% {
                transform: scale(1.05);
                box-shadow: 0 0 20px 5px rgba(255, 255, 255, 0.2);
            }
        }
        
        .logo i {
            font-size: 3.2rem;
            color: white;
        }
        
        /* Títulos */
        h1 {
            font-size: 2rem;
            font-weight: 700;
            color: white;
            margin-bottom: 0.5rem;
            letter-spacing: -0.5px;
        }
        
        .subtitle {
            color: rgba(255, 255, 255, 0.85);
            font-size: 0.9rem;
            margin-bottom: 2rem;
            line-height: 1.5;
        }
        
        /* Botones */
        .btn-group {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }
        
        .btn {
            flex: 1;
            padding: 0.9rem;
            border-radius: 1rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            font-size: 0.95rem;
            cursor: pointer;
        }
        
        .btn-primary {
            background: white;
            color: #1e3a8a;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 25px -8px rgba(0, 0, 0, 0.2);
            background: #f8fafc;
        }
        
        .btn-secondary {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(5px);
        }
        
        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-3px);
            border-color: rgba(255, 255, 255, 0.5);
        }
        
        /* Características */
        .features {
            display: flex;
            justify-content: center;
            gap: 1.8rem;
            flex-wrap: wrap;
            padding-top: 1rem;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .feature {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.8);
            transition: all 0.3s;
        }
        
        .feature:hover {
            transform: translateY(-2px);
            color: white;
        }
        
        .feature i {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.9);
        }
        
        /* Partículas decorativas */
        .particle {
            position: fixed;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
        }
        
        /* Responsive */
        @media (max-width: 550px) {
            .hero-card {
                padding: 1.8rem;
                width: 92%;
            }
            .btn-group {
                flex-direction: column;
                gap: 0.8rem;
            }
            h1 {
                font-size: 1.6rem;
            }
            .logo {
                width: 85px;
                height: 85px;
            }
            .logo i {
                font-size: 2.5rem;
            }
            .features {
                gap: 1rem;
            }
            .feature {
                font-size: 0.7rem;
            }
        }
        
        @media (max-width: 380px) {
            .features {
                flex-direction: column;
                gap: 0.6rem;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <!-- Partículas animadas -->
    <div id="particles"></div>
    
    <div class="hero-card">
        <!-- Logo -->
        <div class="logo">
            <i class="fas fa-cash-register"></i>
        </div>
        
        <!-- Título -->
        <h1>Sistema de Cajas</h1>
        <p class="subtitle">
            Gestión inteligente de ingresos y egresos<br>
            Controla tus finanzas de forma fácil y segura
        </p>
        
        <!-- Botones -->
        <div class="btn-group">
            <a href="{{ route('login') }}" class="btn btn-primary">
    <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
</a>
<a href="{{ route('register') }}" class="btn btn-secondary">
    <i class="fas fa-user-plus"></i> Registrarse
</a>

        </div>
        
        <!-- Características -->
        <div class="features">
            <div class="feature">
                <i class="fas fa-chart-line"></i>
                <span>En tiempo real</span>
            </div>
            <div class="feature">
                <i class="fas fa-shield-alt"></i>
                <span>Datos seguros</span>
            </div>
            <div class="feature">
                <i class="fas fa-mobile-alt"></i>
                <span>Responsive</span>
            </div>
            <div class="feature">
                <i class="fas fa-cloud"></i>
                <span>En la nube</span>
            </div>
        </div>
    </div>
    
    <script>
        // Crear partículas animadas
        function createParticles() {
            const container = document.getElementById('particles');
            const particleCount = 40;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                
                const size = Math.random() * 6 + 2;
                particle.style.width = size + 'px';
                particle.style.height = size + 'px';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.top = Math.random() * 100 + '%';
                particle.style.animation = `floatParticle ${Math.random() * 8 + 5}s infinite ease-in-out`;
                particle.style.opacity = Math.random() * 0.5 + 0.2;
                
                container.appendChild(particle);
            }
        }
        
        // Animación de partículas
        const style = document.createElement('style');
        style.textContent = `
            @keyframes floatParticle {
                0%, 100% {
                    transform: translateY(0) translateX(0);
                }
                25% {
                    transform: translateY(-30px) translateX(20px);
                }
                75% {
                    transform: translateY(30px) translateX(-20px);
                }
            }
        `;
        document.head.appendChild(style);
        
        createParticles();
    </script>
</body>
</html>