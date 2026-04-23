<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            🎓 Kairos Smart Path - Tableau de Bord
        </h2>
    </x-slot>

    <div class="py-6 px-4">

        {{-- Score de réussite --}}
        <div class="bg-white rounded-lg shadow p-6 mb-6 text-center">
            <h3 class="text-lg font-bold text-gray-700 mb-2">Score de Réussite Global</h3>
            <div class="text-6xl font-bold text-green-500">{{ $score }}%</div>
            <p class="text-gray-500 mt-2">Moyenne générale : {{ $moyenne }} / 20</p>
        </div>

        {{-- Notes par matière --}}
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <h3 class="text-lg font-bold text-gray-700 mb-4">📊 Mes Notes</h3>
            @if($notes->isEmpty())
                <p class="text-gray-400">Aucune note enregistrée pour le moment.</p>
            @else
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b">
                            <th class="py-2">Matière</th>
                            <th class="py-2">Note</th>
                            <th class="py-2">Coefficient</th>
                            <th class="py-2">Absences</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($notes as $note)
                        <tr class="border-b">
                            <td class="py-2">{{ $note->matiere }}</td>
                            <td class="py-2 {{ $note->note < 10 ? 'text-red-500' : 'text-green-500' }}">
                                {{ $note->note }}/20
                            </td>
                            <td class="py-2">{{ $note->coefficient }}</td>
                            <td class="py-2">{{ $note->absences }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            <a href="{{ route('notes.create') }}" 
               class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">
                + Ajouter une note
            </a>
        </div>

        {{-- Groupes de tutorat --}}
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <h3 class="text-lg font-bold text-gray-700 mb-4">👥 Groupes de Tutorat</h3>
            @if($groupes->isEmpty())
                <p class="text-gray-400">Aucun groupe disponible.</p>
            @else
                @foreach($groupes as $groupe)
                <div class="border rounded p-3 mb-2">
                    <p class="font-bold">{{ $groupe->nom }}</p>
                    <p class="text-gray-500 text-sm">{{ $groupe->matiere }} - {{ $groupe->jour }} à {{ $groupe->heure }}</p>
                </div>
                @endforeach
            @endif
            <a href="{{ route('groupes.create') }}" 
               class="mt-4 inline-block bg-green-500 text-white px-4 py-2 rounded">
                + Créer un groupe
            </a>
        </div>

        {{-- Ressources --}}
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-bold text-gray-700 mb-4">📚 Ressources Récentes</h3>
            @if($ressources->isEmpty())
                <p class="text-gray-400">Aucune ressource disponible.</p>
            @else
                @foreach($ressources as $ressource)
                <div class="border rounded p-3 mb-2">
                    <p class="font-bold">{{ $ressource->titre }}</p>
                    <p class="text-gray-500 text-sm">{{ $ressource->matiere }} - {{ $ressource->type }}</p>
                </div>
                @endforeach
            @endif
        </div>

    </div>
</x-app-layout>
