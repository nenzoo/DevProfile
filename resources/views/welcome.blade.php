<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'DevProfile') }}</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        .hero-section {
            padding: 80px 0;
            background-color: #f8f9fa;
        }
        
        .features-section {
            padding: 80px 0;
            background-color: #ffffff;
        }
        
        .feature-card {
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            height: 100%;
            transition: transform 0.3s;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
        }
        
        .feature-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color:rgb(11, 34, 164);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="#">DevProfile</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/dashboard') }}" class="nav-link">Tableau de bord</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">Connexion</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="btn btn-primary ms-2">Inscription</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-3">
                        <span class="text-primary">DevProfile</span>
                        <br>
                        <span class="fs-2">Votre portfolio professionnel</span>
                    </h1>
                    <p class="lead text-muted mb-4">
                        Créez votre profil de développeur, ajoutez vos projets et compétences, et générez votre CV en quelques clics !
                    </p>
                    <div class="d-flex gap-3">
                        <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-4 py-2">Commencer</a>
                        <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg px-4 py-2">Connexion</a>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="bg-primary p-5 rounded-3 text-center">
    <i class="fa-solid fa-user-tie text-white" style="font-size: 160px;"></i>
</div>

                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <div class="text-center mb-5">
                <h5 class="text-primary text-uppercase">Fonctionnalités</h5>
                <h2 class="fw-bold">Tout ce dont vous avez besoin</h2>
            </div>

            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="feature-card bg-white">
                        <div class="feature-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <h4>Profil personnalisé</h4>
                        <p class="text-muted">
                            Créez un profil professionnel qui met en valeur vos compétences et expériences.
                        </p>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="feature-card bg-white">
                        <div class="feature-icon">
                            <i class="fas fa-project-diagram"></i>
                        </div>
                        <h4>Gestion de projets</h4>
                        <p class="text-muted">
                            Ajoutez et présentez vos projets avec descriptions et liens.
                        </p>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="feature-card bg-white">
                        <div class="feature-icon">
                            <i class="fas fa-file-pdf"></i>
                        </div>
                        <h4>Export PDF</h4>
                        <p class="text-muted">
                            Générez un CV professionnel en PDF prêt à partager avec des recruteurs.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-light py-4">
        <div class="container">
            <p class="text-center text-muted mb-0">
                Created By Boudzouaou
            </p>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>