<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>La Liga de los Sueños</title>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <!-- Styles -->
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            
            html, body {
                font-family: 'Figtree', sans-serif;
                height: 100%;
                width: 100%;
                overflow-x: hidden;
            }
            
            .container {
                display: flex;
                min-height: 100vh;
                width: 100%;
                flex-direction: row;
            }
            
            .left-section {
                flex: 2;
                position: relative;
                background: #ffffff;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                padding: 1rem;
                min-height: 100vh;
            }
            
            .right-section {
                flex: 1;
                background-color: #FF7033;
                padding: 2rem;
                display: flex;
                flex-direction: column;
                justify-content: center;
                min-height: 100vh;
            }
            
            .logo {
                position: absolute;
                top: 20px;
                left: 20px;
                width: 120px;
                z-index: 10;
                max-width: 100%;
            }
            
            .social-icons {
                display: flex;
                gap: 10px;
                flex-wrap: wrap;
            }
            
            .social-icon {
                width: 30px;
                height: 30px;
                background-color: white;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }
            
            .social-icon:hover {
                transform: translateY(-3px);
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            }
            
            .header-nav {
                position: absolute;
                top: 30px;
                left: 160px;
                display: flex;
                align-items: flex-start;
                gap: 30px;
                z-index: 5;
                flex-wrap: wrap;
            }
            
            .header-location {
                color: #333;
                font-weight: 500;
                margin-right: 10px;
            }
            
            .location-group {
                display: flex;
                align-items: center;
                flex-wrap: wrap;
                margin-bottom: 10px;
            }
            
            .hero-content {
                max-width: 90%;
                text-align: center;
                position: relative;
                z-index: 3;
                padding-top: 100px;
                width: 100%;
            }
            
            .hero-bubble {
                background-image: url('data:image/svg+xml;utf8,<svg viewBox="0 0 200 100" xmlns="http://www.w3.org/2000/svg"><path d="M50,10 C25,10 10,25 10,50 C10,75 25,90 50,90 L150,90 C175,90 190,75 190,50 C190,25 175,10 150,10 Z" fill="%23FF7033" /></svg>');
                background-repeat: no-repeat;
                background-size: 100% 100%;
                padding: 20px 15px;
                margin-bottom: 15px;
                transform: scale(1);
                transition: transform 0.3s ease;
            }
            
            .hero-bubble:hover {
                transform: scale(1.02);
            }
            
            .hero-text {
                color: white;
                font-size: clamp(18px, 3vw, 24px);
                font-weight: bold;
                text-shadow: 2px 2px 3px rgba(0,0,0,0.3);
                -webkit-text-stroke: 1px black;
                line-height: 1.2;
            }
            
            .hero-subtext {
                color: white;
                font-size: clamp(14px, 2vw, 16px);
                margin-top: 5px;
                text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
                -webkit-text-stroke: 0.5px black;
            }
            
            .slider-container {
                width: 100%;
                max-width: 95%;
                height: 100%;

                margin: 0 auto;
                position: relative;
                overflow: hidden;
                z-index: 2;
                background-color: #ffffff;
                padding: 0px;
                border-radius: 10px;
                box-sizing: border-box;
            }

            .slider {
                display: flex;
                transition: transform 0.5s ease-in-out;
                width: 100%;
                height: 100%;
                position: relative;
            }

            .slide {
                width: 100%;
                min-width: 100%;
                max-width: 100%;
                height: 100%;
                flex: 0 0 100%;
                position: relative;
                overflow: hidden;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .hero-image {
                max-width: 100%;
                max-height: 100%;
                object-fit: contain;
                display: block;
                filter: drop-shadow(0 10px 15px rgba(0,0,0,0.2));
                transition: transform 0.3s ease;
            }
            
            .slide:hover .hero-image {
                transform: translateY(-5px);
            }
            
            .slider-nav {
                display: flex;
                justify-content: center;
                margin-top: 10px;
                position: relative;
                z-index: 5;
            }
            
            .slider-dot {
                width: 10px;
                height: 10px;
                background-color: rgba(255, 112, 51, 0.3);
                border-radius: 50%;
                margin: 0 5px;
                cursor: pointer;
                transition: background-color 0.3s ease, transform 0.3s ease;
            }
            
            .slider-dot.active {
                background-color: #FF7033;
                transform: scale(1.2);
            }
            
            .slider-dot:hover {
                background-color: rgba(255, 112, 51, 0.7);
            }
            
            .slider-btn {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                width: 35px;
                height: 35px;
                background-color: rgba(255, 112, 51, 0.7);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                z-index: 10;
                font-size: 18px;
                font-weight: bold;
                border: none;
                color: white;
                transition: background-color 0.3s ease, transform 0.3s ease;
            }
            
            .slider-btn:hover {
                background-color: #FF7033;
                transform: translateY(-50%) scale(1.1);
            }
            
            .slider-btn.prev {
                left: 10px;
            }
            
            .slider-btn.next {
                right: 10px;
            }
            
            .form-title {
                color: white;
                font-size: clamp(22px, 4vw, 28px);
                font-weight: bold;
                text-align: center;
                margin-bottom: 15px;
                text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
            }
            
            .form-subtitle {
                color: white;
                font-size: clamp(14px, 2vw, 16px);
                text-align: center;
                margin-bottom: 25px;
                opacity: 0.9;
            }
            
            .form-group {
                margin-bottom: 20px;
                position: relative;
            }
            
            .form-control {
                width: 100%;
                padding: 10px 0;
                background-color: transparent;
                border: none;
                border-bottom: 1px solid rgba(255, 255, 255, 0.7);
                color: white;
                font-size: 16px;
                outline: none;
                transition: border-color 0.3s ease;
            }
            
            .form-control:focus {
                border-bottom: 2px solid white;
            }
            
            .form-control::placeholder {
                color: rgba(255,255,255,0.7);
                transition: color 0.3s ease, transform 0.3s ease;
            }
            
            .form-control:focus::placeholder {
                color: rgba(255,255,255,0.4);
                transform: translateY(-5px);
            }
            
            .submit-button {
                background-color: white;
                color: #333;
                border: none;
                border-radius: 25px;
                padding: 12px 20px;
                font-size: clamp(14px, 2vw, 16px);
                font-weight: bold;
                text-transform: uppercase;
                cursor: pointer;
                margin-top: 15px;
                transition: all 0.3s ease;
                width: 100%;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                position: relative;
                overflow: hidden;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
            }
            
            .submit-button:hover {
                background-color: #f0f0f0;
                transform: translateY(-2px);
                box-shadow: 0 6px 12px rgba(0,0,0,0.15);
            }
            
            .submit-button:active {
                transform: translateY(0);
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            }
            
            .star {
                position: absolute;
                color: #f2f2f2;
                font-size: 30px;
                opacity: 0.4;
                z-index: 2;
                animation: twinkle 5s infinite alternate;
                text-shadow: 0 0 10px rgba(242, 242, 242, 0.5);
            }
            
            .star:nth-child(1) {
                top: 20%;
                left: 15%;
                animation-delay: 0s;
            }
            
            .star:nth-child(2) {
                bottom: 30%;
                right: 20%;
                animation-delay: 1s;
            }
            
            .star:nth-child(3) {
                top: 40%;
                right: 15%;
                animation-delay: 2s;
                font-size: 20px;
            }
            
            .star:nth-child(4) {
                bottom: 40%;
                left: 10%;
                animation-delay: 3s;
                font-size: 25px;
            }
            
            @keyframes twinkle {
                0% {
                    opacity: 0.2;
                    transform: scale(0.8);
                }
                100% {
                    opacity: 0.6;
                    transform: scale(1.1);
                }
            }
            
            /* Tablets */
            @media (max-width: 1024px) {
                .container {
                    flex-direction: column;
                }
                
                .left-section, .right-section {
                    min-height: auto;
                }
                
                .left-section {
                    flex: 0 0 60%;
                    padding-bottom: 2rem;
                }
                
                .right-section {
                    flex: 0 0 40%;
                }
                
                .header-nav {
                    position: relative;
                    top: 0;
                    left: 0;
                    width: 100%;
                    padding: 80px 20px 20px;
                    justify-content: space-around;
                }
                
                .location-group {
                    flex-direction: column;
                    align-items: center;
                    text-align: center;
                }
                
                .hero-content {
                    padding-top: 20px;
                }
                
                .slider-container {
                    height: 40vh;
                }
                
                .logo {
                    width: 100px;
                    top: 15px;
                    left: 15px;
                }
            }
            
            /* Mobile Landscape */
            @media (max-width: 768px) {
                .container {
                    flex-direction: column;
                }
                
                .left-section, .right-section {
                    width: 100%;
                    min-height: auto;
                }
                
                .left-section {
                    flex: 0 0 auto;
                    padding: 1rem;
                }
                
                .right-section {
                    flex: 0 0 auto;
                    padding: 1.5rem;
                }
                
                .header-nav {
                    flex-direction: column;
                    align-items: center;
                    gap: 15px;
                    padding: 80px 10px 20px;
                }
                
                .location-group {
                    flex-direction: column;
                    align-items: center;
                    margin-bottom: 15px;
                }
                
                .slider-container {
                    height: 35vh;
                    max-width: 100%;
                }
                
                .form-group {
                    margin-bottom: 15px;
                }
            }
            
            /* Mobile Portrait */
            @media (max-width: 576px) {
                .container {
                    flex-direction: column;
                }
                
                .left-section {
                    padding: 0.8rem;
                    padding-top: 120px;
                }
                
                .right-section {
                    padding: 1.2rem;
                }
                
                .header-nav {
                    padding: 0px 10px 10px;
                }
                
                .logo {
                    width: 100px;
                    top: 10px;
                    left: 10px;
                }
                
                .slider-container {
                    height: 30vh;
                }
                
                .slider-btn {
                    width: 28px;
                    height: 28px;
                    font-size: 14px;
                }
                
                .form-group {
                    margin-bottom: 12px;
                }
                
                .submit-button {
                    padding: 10px 15px;
                    font-size: 14px;
                }
            }
            
            /* Para pantallas muy pequeñas */
            @media (max-width: 375px) {
                .header-nav {
                    padding-top: 0px;
                }
                
                .slider-container {
                    height: 20vh;
                }
                
                .social-icons {
                    gap: 5px;
                }
                
                .social-icon {
                    width: 25px;
                    height: 25px;
                }
                
                .form-control {
                    font-size: 14px;
                }
            }
            
            /* Reglas para dispositivos en orientación landscape */
            @media (max-height: 500px) and (orientation: landscape) {
                .container {
                    flex-direction: row;
                }
                
                .left-section, .right-section {
                    min-height: 100vh;
                }
                
                .left-section {
                    flex: 1.5;
                }
                
                .right-section {
                    flex: 1;
                }
                
                .header-nav {
                    top: 10px;
                    left: 100px;
                    flex-direction: column;
                    align-items: flex-start;
                    padding: 0;
                }
                
                .slider-container {
                    height: 60vh;
                    margin-top: 50px;
                }
                
                .form-group {
                    margin-bottom: 10px;
                }
            }
            
            /* Para pantallas grandes */
            @media (min-width: 1440px) {
                .header-nav {
                    left: 180px;
                    gap: 40px;
                }
                
                .slider-container {
                    max-width: 800px;
                    height: 60vh;
                }
                
                .hero-text {
                    font-size: 28px;
                }
                
                .hero-subtext {
                    font-size: 18px;
                }
                
                .form-title {
                    font-size: 32px;
                }
                
                .form-subtitle {
                    font-size: 18px;
                }
                
                .form-control {
                    font-size: 18px;
                }
                
                .submit-button {
                    font-size: 18px;
                    padding: 15px 25px;
                }
                .form-control.is-invalid {
                    border-color: #dc3545;
                    background-image: none;
                }

                .text-danger {
                    color: #dc3545 !important;
                }

                /* Si quieres resaltar el borde del input cuando hay error */
                input.form-control:has(+ .text-danger) {
                    border-color: #dc3545;
                }
            }
            
            /* Estilos para los mensajes de error */
            .text-danger {
                color: #ffffff !important; /* Texto blanco para mayor contraste */
                background-color: rgba(220, 53, 69, 0.7); /* Fondo rojo semi-transparente */
                border-radius: 4px;
                padding: 5px 8px;
                margin-top: 5px;
                font-size: 14px;
                display: block; /* Para que ocupe su propio espacio */
                animation: fadeIn 0.3s ease-in; /* Animación suave */
            }

            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(-5px); }
                to { opacity: 1; transform: translateY(0); }
            }

            /* Resaltar el input con error */
            .form-control.is-invalid,
            input.form-control:has(+ .text-danger) {
                border-color: #f8d7da !important;
                border-bottom: 2px solid #f8d7da !important;
                box-shadow: 0 0 0 2px rgba(220, 53, 69, 0.25);
            }
            
            /* Estilo para el mensaje de éxito */
            .alert-success {
                background-color: #FF7033;
                color: white;
                border-radius: 4px;
                padding: 10px 15px;
                margin-top: 15px;
                text-align: center;
                animation: fadeIn 0.5s ease;
                border: none;
            }

            /* Agregar estos estilos a tu sección de CSS */

            .submit-button:disabled {
                opacity: 0.6 !important;
                cursor: not-allowed !important;
                background-color: #e0e0e0 !important;
                transform: none !important;
                box-shadow: none !important;
            }

            .submit-button:disabled:hover {
                background-color: #e0e0e0 !important;
                transform: none !important;
                box-shadow: none !important;
            }

            /* Estilos para campos válidos */
            .form-control.valid {
                border-bottom: 2px solid #FF7033 !important;
            }

            /* Animación suave al habilitar el botón */
            .submit-button {
                transition: opacity 0.3s ease, background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="left-section">
                <img src="{{ asset('images/logo.png') }}" alt="La Liga de los Sueños" class="logo">
                
                <div class="header-nav">
                    <div class="location-group">
                        <span class="header-location">Espumas medellín</span>
                        <div class="social-icons">
                            <a href="https://www.facebook.com/AuxsisESPM" class="social-icon" target="_blank" rel="noopener noreferrer">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="#FF7033">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>
                            <a href="https://www.instagram.com/espumasmedellin/" class="social-icon" target="_blank" rel="noopener noreferrer">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="#FF7033">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                                </svg>
                            </a>
                            <a href="https://www.linkedin.com/company/espumas-medellin/" class="social-icon" target="_blank" rel="noopener noreferrer">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="#FF7033">
                                    <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    
                    <div class="location-group">
                        <span class="header-location">Espumados del Litoral</span>
                        <div class="social-icons">
                            <a href="https://www.facebook.com/profile.php?id=61571445715819" class="social-icon" target="_blank" rel="noopener noreferrer">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="#FF7033">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>
                            <a href="https://www.instagram.com/espumadosdellitoral_/" class="social-icon" target="_blank" rel="noopener noreferrer">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="#FF7033">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                                </svg>
                            </a>
                            <a href="https://www.linkedin.com/company/espumados-del-litoral-s-a-la-original/" class="social-icon" target="_blank" rel="noopener noreferrer">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="#FF7033">
                                    <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="hero-content">
                    <div class="slider-container">
                        <button class="slider-btn prev" onclick="moveSlide(-1)">&#10094;</button>
                        <div class="slider">
                            <div class="slide">
                                <img src="{{ asset('images/slider-1.png') }}" alt="Superhéroe de Almohada 1" class="hero-image">
                            </div>
                            <div class="slide">
                                <img src="{{ asset('images/slider-2.png') }}" alt="Superhéroe de Almohada 2" class="hero-image">
                            </div>
                        </div>
                        <button class="slider-btn next" onclick="moveSlide(1)">&#10095;</button>
                        
                        <div class="slider-nav">
                            <span class="slider-dot active" onclick="currentSlide(0)"></span>
                            <span class="slider-dot" onclick="currentSlide(1)"></span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="right-section">
                <h1 class="form-title">¡OBTÉN TU KIT DEL SUEÑO GRATIS!</h1>
                <p class="form-subtitle">Solo ingresa tus datos y comienza a dormir mejor.</p>
                
                <form id="dreamLeagueForm" action="{{ route('unirse.store') }}" method="POST" autocomplete="on" class="dream-form" novalidate>
                    @csrf
                
                    <div class="form-group">
                        <input type="text" name="nombre" placeholder="Nombre completo" class="form-control" 
                                value="{{ old('nombre') }}" autocomplete="name" required>
                        @error('nombre')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <div class="form-group">
                        <input type="email" name="email" placeholder="E-mail" class="form-control" 
                                value="{{ old('email') }}" autocomplete="email" required>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <div class="form-group">
                        <input type="tel" name="celular" placeholder="Celular" class="form-control" 
                                value="{{ old('celular') }}" autocomplete="tel" required>
                        @error('celular')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <!-- NUEVO CAMPO EMPRESA -->
                    <div class="form-group">
                        <select name="empresa" class="form-control" required>
                            <option value="" style="color: black;">Cual es tu empresa mas cercana?</option>
                            <option style="color: black;" value="Espumas Medellín S.A" {{ old('empresa') == 'Espumas Medellín S.A' ? 'selected' : '' }}>
                                Espumas Medellín S.A
                            </option>
                            <option style="color: black;" value="Espumados del Litoral" {{ old('empresa') == 'Espumados del Litoral' ? 'selected' : '' }}>
                                Espumados del Litoral S.A
                            </option>
                        </select>
                        @error('empresa')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <button type="submit" class="submit-button">
                        <span>OBTÉN TU KIT DEL SUEÑO GRATIS</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line x1="12" y1="15" x2="12" y2="3"></line>
                        </svg>
                    </button>
                
                    @if(session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif
                
                    <div class="alert alert-success mt-3" id="success-message" style="display: none;"></div>
                </form>
                
            </div>
        </div>

       <!-- Scripts para el slider y la validación del formulario -->
<script>
    let slideIndex = 0;
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.slider-dot');
    
    function showSlide(n) {
        if (n >= slides.length) slideIndex = 0;
        if (n < 0) slideIndex = slides.length - 1;
        
        document.querySelector('.slider').style.transform = `translateX(-${slideIndex * 100}%)`;
        dots.forEach(dot => dot.classList.remove('active'));
        dots[slideIndex].classList.add('active');
    }
    
    function moveSlide(n) {
        showSlide(slideIndex += n);
    }
    
    function currentSlide(n) {
        showSlide(slideIndex = n);
    }
    
    showSlide(slideIndex);
    
    setInterval(() => {
        moveSlide(1);
    }, 10000);
    
    window.addEventListener('resize', function() {
        if (window.innerWidth <= 768) {
            const viewportHeight = window.innerHeight;
            const sliderContainer = document.querySelector('.slider-container');
            sliderContainer.style.height = `${viewportHeight * 0.35}px`;
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        const images = document.querySelectorAll('.hero-image');
        images.forEach(img => {
            img.addEventListener('load', function() {
                this.style.opacity = 1;
            });
            img.style.opacity = 0;
            img.style.transition = 'opacity 0.5s ease';
        });

        const form = document.querySelector('form');
        const submitButton = document.querySelector('.submit-button');
        const successMessage = document.getElementById('success-message');

        // Nueva función para abrir el enlace de Drive según la empresa
        function openGoogleDriveLink(empresa) {
            const driveUrlMedellin = "https://drive.google.com/file/d/1FzuDqG3DZBLFpin_uAWVrk72TR4tj5MM/view";
            const driveUrlLitoral = "https://drive.google.com/file/d/1by9EJ-Qr1zrJOW-xsbWaKXGOyF42hgDn/view";
            const url = (empresa === 'Espumados del Litoral') ? driveUrlLitoral : driveUrlMedellin;
            window.open(url, '_blank');
        }

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            const dynamicErrors = document.querySelectorAll('.text-danger:not(.laravel-error)');
            dynamicErrors.forEach(el => el.remove());

            submitButton.disabled = true;
            submitButton.style.opacity = '0.6';

            const formData = new FormData(form);
            const selectedEmpresa = form.querySelector('select[name="empresa"]')?.value || '';

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                },
                redirect: 'manual'
            })
            .then(response => {
                if (response.redirected) {
                    return { success: true, message: '¡Te has unido a la Liga de los Sueños!' };
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    if (successMessage) {
                        successMessage.textContent = data.message || '¡Te has unido a la Liga de los Sueños!';
                        successMessage.style.display = 'block';
                    }

                    form.reset();
                    openGoogleDriveLink(selectedEmpresa);

                    document.querySelectorAll('.form-control').forEach(el => {
                        el.classList.remove('is-invalid', 'valid');
                    });
                } else if (data.errors) {
                    Object.keys(data.errors).forEach(field => {
                        const input = document.querySelector(`[name="${field}"]`);
                        if (input) {
                            const errorDiv = document.createElement('div');
                            errorDiv.classList.add('text-danger');
                            errorDiv.textContent = data.errors[field][0];
                            input.after(errorDiv);
                            input.classList.add('is-invalid');
                        }
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                if (successMessage) {
                    successMessage.textContent = '¡Te has unido a la Liga de los Sueños!';
                    successMessage.style.display = 'block';
                }
                openGoogleDriveLink(selectedEmpresa);
                form.reset();
            })
            .finally(() => {
                submitButton.disabled = false;
                submitButton.style.opacity = '1';
            });
        });

        const errorMessages = document.querySelectorAll('.text-danger');
        errorMessages.forEach(function(errorMsg) {
            const inputField = errorMsg.previousElementSibling;
            if (inputField && inputField.classList.contains('form-control')) {
                inputField.classList.add('is-invalid');
                errorMsg.classList.add('laravel-error');
            }
        });

        const successAlert = document.querySelector('.alert-success');
        if (successAlert && successAlert.style.display !== 'none') {
            setTimeout(function() {
                successAlert.style.transition = 'opacity 0.5s ease';
                successAlert.style.opacity = '0';
                setTimeout(function() {
                    successAlert.style.display = 'none';
                }, 500);
            }, 5000);
        }
    });
</script>

    </body>
</html>