<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            👥 Créer un Groupe de Tutorat
        </h2>
    </x-slot>

    <div class="py-6 px-4">
        <div class="bg-white rounded-lg shadow p-6">

            <form method="POST" action="{{ route('groupes.store') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Nom du groupe</label>
                    <input type="text" name="nom"
                           class="w-full border rounded p-2"
                           placeholder="Ex: Laravel Experts">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Matière</label>
                    <select name="matiere" class="w-full border rounded p-2">
                        <option value="Informatique">Informatique</option>
                        <option value="PHP/Laravel">PHP/Laravel</option>
                        <option value="Comptabilité">Comptabilité</option>
                        <option value="Communication">Communication</option>
                        <option value="Statistiques">Statistiques</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Type</label>
                    <select name="type" class="w-full border rounded p-2">
                        <option value="tutorat">Tutorat</option>
                        <option value="etude">Groupe d'études</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Jour</label>
                    <input type="date" name="jour"
                           class="w-full border rounded p-2">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Heure</label>
                    <input type="time" name="heure"
                           class="w-full border rounded p-2">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Taille max</label>
                    <input type="number" name="taille_max" min="2" max="10"
                           class="w-full border rounded p-2" value="4">
                </div>

                <button type="submit"
                        class="bg-green-500 text-white px-6 py-2 rounded">
                    Créer le groupe
                </button>

                <a href="{{ route('dashboard') }}"
                   class="ml-4 text-gray-500">Annuler</a>
            </form>

        </div>
    </div>
</x-app-layout>