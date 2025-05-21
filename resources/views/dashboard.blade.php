<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de bord') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Header avec avatar -->
                    <div class="card mb-4">
                        <div class="card-body bg-primary text-white rounded p-4">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="rounded-circle bg-white text-primary d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; font-size: 2rem;">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <h3 class="fs-2 mb-0">Bienvenue, {{ Auth::user()->name }}!</h3>
                                    <p class="mb-0">Gérez votre profil, vos projets et vos compétences</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Informations du profil -->
                        <div class="col-md-6 mb-4">
                            <div class="card h-100 shadow-sm">
                                <div class="card-header bg-light">
                                    <h4 class="mb-0 d-flex align-items-center">
                                        <i class="fas fa-user me-2"></i>
                                        Informations du profil
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3 pb-3 border-bottom">
                                        <small class="text-muted d-block">Nom</small>
                                        <strong>{{ Auth::user()->name }}</strong>
                                    </div>
                                    <div class="mb-3 pb-3 border-bottom">
                                        <small class="text-muted d-block">Email</small>
                                        <strong>{{ Auth::user()->email }}</strong>
                                    </div>
                                    <div class="mb-3 pb-3 border-bottom">
                                        <small class="text-muted d-block">Titre</small>
                                        <strong>{{ Auth::user()->title ?? 'Non défini' }}</strong>
                                    </div>
                                    <div class="mb-3 pb-3 border-bottom">
                                        <small class="text-muted d-block">Bio</small>
                                        <strong>{{ Auth::user()->bio ?? 'Non définie' }}</strong>
                                    </div>
                                    <div class="mb-4">
                                        <small class="text-muted d-block">Nom d'utilisateur</small>
                                        <strong>{{ Auth::user()->username ?? 'Non défini' }}</strong>
                                    </div>
                                    
                                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary w-100">
                                        <i class="fas fa-edit me-2"></i>Modifier mon profil
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Actions rapides -->
                        <div class="col-md-6 mb-4">
                            <div class="card h-100 shadow-sm">
                                <div class="card-header bg-light">
                                    <h4 class="mb-0 d-flex align-items-center">
                                        <i class="fas fa-bolt me-2"></i>
                                        Actions rapides
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="list-group">
                                        <a href="{{ route('projects.index') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                            <div>
                                                <i class="fas fa-project-diagram me-2 text-primary"></i>
                                                Gérer mes projets
                                            </div>
                                            <span class="badge bg-primary rounded-pill">{{ Auth::user()->projects->count() }}</span>
                                        </a>
                                        <a href="{{ route('skills.index') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                            <div>
                                                <i class="fas fa-code me-2 text-primary"></i>
                                                Gérer mes compétences
                                            </div>
                                            <span class="badge bg-primary rounded-pill">{{ Auth::user()->skills->count() }}</span>
                                        </a>
                                        
                                        @if(Auth::user()->username)
                                            <a href="{{ route('profile.show', Auth::user()->username) }}" class="list-group-item list-group-item-action">
                                                <i class="fas fa-eye me-2 text-primary"></i>
                                                Voir mon profil public
                                            </a>
                                            <a href="{{ route('pdf.generate', Auth::user()->username) }}" class="list-group-item list-group-item-action">
                                                <i class="fas fa-file-pdf me-2 text-primary"></i>
                                                Générer mon CV en PDF
                                            </a>
                                        @else
                                            <div class="list-group-item list-group-item-warning">
                                                <i class="fas fa-exclamation-triangle me-2"></i>
                                                Veuillez définir un nom d'utilisateur dans votre profil pour accéder à votre profil public et générer votre CV
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Statistiques -->
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="card bg-primary text-white shadow-sm">
                                <div class="card-body text-center py-4">
                                    <h1 class="display-4">{{ Auth::user()->projects->count() }}</h1>
                                    <p class="mb-0">Projets</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card bg-success text-white shadow-sm">
                                <div class="card-body text-center py-4">
                                    <h1 class="display-4">{{ Auth::user()->skills->count() }}</h1>
                                    <p class="mb-0">Compétences</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card bg-info text-white shadow-sm">
                                <div class="card-body text-center py-4">
                                    <h1 class="display-4">{{ Auth::user()->username ? '1' : '0' }}</h1>
                                    <p class="mb-0">Profil public</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <x-slot name="scripts">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    </x-slot>
</x-app-layout>