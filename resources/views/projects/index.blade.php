<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mes Projets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-row justify-between items-center mb-6">
                        <h3 class="text-lg font-bold mb-4">Ajouter un nouveau projet</h3>
                        <a href="{{ route('projects.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Nouveau projet
                        </a>
                    </div>

                    @if($projects->count() > 0)
                        <h3 class="text-lg font-bold mb-4">Mes projets</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($projects as $project)
                                <div class="border rounded-lg p-4 shadow-sm">
                                    <h4 class="font-bold">{{ $project->title }}</h4>
                                    <p class="text-gray-600 mb-2">{{ Str::limit($project->description, 100) }}</p>
                                    
                                    <div class="flex justify-between mt-4">
                                        <a href="{{ route('projects.edit', $project) }}" class="text-blue-500 hover:text-blue-700">
                                            Modifier
                                        </a>
                                        
                                        <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce projet?')">
                                                Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500">Vous n'avez pas encore de projets.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>