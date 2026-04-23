<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ➕ Ajouter une Note
        </h2>
    </x-slot>

    <div class="py-6 px-4">
        <div class="bg-white rounded-lg shadow p-6">

            <form method="POST" action="{{ route('notes.store') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Matière</label>
                    <input type="text" name="matiere" 
                           class="w-full border rounded p-2"
                           placeholder="Ex: PHP/Laravel, Comptabilité...">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Note (sur 20)</label>
                    <input type="number" name="note" min="0" max="20" step="0.5"
                           class="w-full border rounded p-2">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Coefficient</label>
                    <input type="number" name="coefficient" min="1"
                           class="w-full border rounded p-2">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Absences</label>
                    <input type="number" name="absences" min="0"
                           class="w-full border rounded p-2" value="0">
                </div>

                <button type="submit" 
                        class="bg-blue-500 text-white px-6 py-2 rounded">
                    Enregistrer
                </button>

                <a href="{{ route('dashboard') }}" 
                   class="ml-4 text-gray-500">Annuler</a>
            </form>

        </div>
    </div>
</x-app-layout>