<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            📚 Ajouter une Ressource
        </h2>
    </x-slot>

    <div class="py-6 px-4">
        <div class="bg-white rounded-lg shadow p-6">

            <form method="POST" action="{{ route('ressources.store') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Titre</label>
                    <input type="text" name="titre"
                           class="w-full border rounded p-2"
                           placeholder="Ex: Annales PHP 2023">
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
                        <option value="cours">Support de cours</option>
                        <option value="annale">Annale d'examen</option>
                        <option value="exercice">Exercice</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Lien du fichier (URL)</label>
                    <input type="text" name="fichier_url"
                           class="w-full border rounded p-2"
                           placeholder="Ex: https://drive.google.com/...">
                </div>

                <button type="submit"
                        class="bg-blue-500 text-white px-6 py-2 rounded">
                    Ajouter
                </button>

                <a href="{{ route('dashboard') }}"
                   class="ml-4 text-gray-500">Annuler</a>
            </form>

        </div>
    </div>
</x-app-layout>