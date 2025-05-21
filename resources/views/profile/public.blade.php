<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profil de') }} {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Bannière du profil -->
            <div class="bg-primary text-white p-4 rounded-lg shadow-sm mb-4">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <div class="rounded-circle bg-white text-primary d-flex align-items-center justify-content-center" style="width: 100px; height: 100px; font-size: 2.5rem;">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                    </div>
                    <div class="col">
                        <h1 class="display-5 mb-0">{{ $user->name }}</h1>
                        <p class="lead mb-0">{{ $user->title ?? 'Développeur Web' }}</p>
                        @if(auth()->check() && auth()->user()->username === $user->username)
                            <a href="{{ route('pdf.generate', $user->username) }}" class="btn btn-light mt-2">
                                <i class="fas fa-file-pdf me-2"></i>Télécharger le CV (PDF)
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Informations personnelles -->
                <div class="col-md-4 mb-4">
                    <div class="bg-white p-4 rounded-lg shadow-sm h-100">
                        <h3 class="border-bottom pb-2 mb-3">Informations</h3>
                        
                        @if($user->bio)
                            <div class="mb-3">
                                <h5>Bio</h5>
                                <p>{{ $user->bio }}</p>
                            </div>
                        @endif
                        
                        <div class="mb-3">
                            <h5>Contact</h5>
                            <p><i class="fas fa-envelope me-2"></i>{{ $user->email }}</p>
                        </div>
                    </div>
                </div>
                
                <!-- Compétences -->
                <div class="col-md-8 mb-4">
                    <div class="bg-white p-4 rounded-lg shadow-sm">
                        <h3 class="border-bottom pb-2 mb-3">Compétences</h3>
                        
                        @if($skills->count() > 0)
                            <div class="d-flex flex-wrap gap-2">
                                @foreach($skills as $skill)
                                    <span class="badge bg-primary p-2">{{ $skill->name }}</span>
                                @endforeach
                            </div>
                        @else
                            <p class="text-muted">Aucune compétence renseignée.</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Projets -->
            <div class="bg-white p-4 rounded-lg shadow-sm mb-4">
                <h3 class="border-bottom pb-2 mb-3">Projets</h3>
                
                @if($projects->count() > 0)
                    <div class="row">
                        @foreach($projects as $project)
                            <div class="col-md-6 col-lg-4 mb-4">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $project->title }}</h5>
                                        <p class="card-text">{{ $project->description }}</p>
                                        @if($project->link)
                                            <a href="{{ $project->link }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-external-link-alt me-1"></i>Visiter
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted">Aucun projet renseigné.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>