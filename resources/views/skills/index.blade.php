<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mes Compétences') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('status'))
                        <div class="alert alert-success mb-4">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('skills.store') }}" class="mb-4">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-9">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nouvelle compétence" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary w-100">Ajouter</button>
                            </div>
                        </div>
                    </form>

                    <h4 class="mb-3">Compétences actuelles</h4>

                    @if($skills->count() > 0)
                        <div class="d-flex flex-wrap gap-2">
                            @foreach($skills as $skill)
                                <div class="badge bg-primary p-2 d-flex align-items-center">
                                    {{ $skill->name }}
                                    <form action="{{ route('skills.destroy', $skill) }}" method="POST" class="ms-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-close btn-close-white" style="font-size: 0.5rem;" aria-label="Supprimer"></button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="alert alert-info">
                            Vous n'avez pas encore ajouté de compétences. Utilisez le formulaire ci-dessus pour commencer.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>