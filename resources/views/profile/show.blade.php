<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profil de') }} {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Bannière du profil -->
            <div class="bg-indigo-600 text-white p-6 rounded-lg shadow-sm mb-6">
                <div class="flex items-center">
                    <div class="mr-4">
                        <div class="w-20 h-20 rounded-full bg-white text-indigo-600 flex items-center justify-center text-2xl font-bold">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold mb-0">{{ $user->name }}</h1>
                        <p class="text-xl">{{ $user->title ?? 'Développeur Web' }}</p>
                        @if(auth()->check() && auth()->user()->username === $user->username)
                            <a href="{{ route('pdf.generate', $user->username) }}" class="mt-2 inline-flex items-center px-4 py-2 bg-white text-indigo-600 rounded-md font-semibold">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                                Télécharger le CV (PDF)
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Informations personnelles -->
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-lg font-semibold border-b pb-2 mb-4">Informations</h3>
                    
                    @if($user->bio)
                        <div class="mb-4">
                            <h5 class="font-semibold mb-2">Bio</h5>
                            <p>{{ $user->bio }}</p>
                        </div>
                    @endif
                    
                    <div>
                        <h5 class="font-semibold mb-2">Contact</h5>
                        <p class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            {{ $user->email }}
                        </p>
                    </div>
                </div>
                
                <!-- Compétences -->
                <div class="md:col-span-2 bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-lg font-semibold border-b pb-2 mb-4">Compétences</h3>
                    
                    @if($user->skills->count() > 0)
                        <div class="flex flex-wrap gap-2">
                            @foreach($user->skills as $skill)
                                <span class="px-3 py-1 bg-indigo-100 text-indigo-800 rounded-full text-sm">{{ $skill->name }}</span>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500">Aucune compétence renseignée.</p>
                    @endif
                </div>
            </div>

            <!-- Projets -->
            <div class="mt-6 bg-white p-6 rounded-lg shadow-sm">
                <h3 class="text-lg font-semibold border-b pb-2 mb-4">Projets</h3>
                
                @if($user->projects->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($user->projects as $project)
                            <div class="border rounded-lg p-4 shadow-sm">
                                <h4 class="font-bold mb-2">{{ $project->title }}</h4>
                                <p class="text-gray-600 mb-4">{{ $project->description }}</p>
                                @if($project->link)
                                    <a href="{{ $project->link }}" target="_blank" class="inline-flex items-center text-indigo-600 hover:text-indigo-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                        </svg>
                                        Visiter
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500">Aucun projet renseigné.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>