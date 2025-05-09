@extends("welcome")
@section('contenu')
<div class="max-w-7xl mx-auto py-10 px-4">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Interface Administrateur</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white p-6 rounded-lg shadow mb-10">
        <h2 class="text-2xl font-semibold mb-4 text-gray-700">Utilisateurs</h2>
        <table class="min-w-full bg-white text-left text-sm">
            <thead>
                <tr class="border-b">
                    <th class="py-2 px-4">Nom</th>
                    <th class="py-2 px-4">Email</th>
                    <th class="py-2 px-4">Rôle</th>
                    <th class="py-2 px-4">Changer de rôle</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($utilisateurs as $user)
                <tr class="border-t">
                    <td class="py-2 px-4">{{ $user->name }}</td>
                    <td class="py-2 px-4">{{ $user->email }}</td>
                    <td class="py-2 px-4">{{ $user->role }}</td>
                    <td class="py-2 px-4">
                        <form action="{{ route('admin.updateRole', $user->users_id) }}"  method="POST" class="flex items-center space-x-2">
                            @csrf
                            <select name="role" class="border border-gray-300 rounded px-2 py-1 text-sm">
                                <option value="visiteur" @selected($user->role === 'visiteur')>Visiteur</option>
                                <option value="chercheur" @selected($user->role === 'chercheur')>Chercheur</option>
                                <option value="admin" @selected($user->role === 'admin')>Admin</option>
                            </select>
                            <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-xs">Modifier</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-2xl font-semibold mb-4 text-gray-700">Chercheurs</h2>
        <ul class="space-y-4">
            @foreach ($chercheurs as $chercheur)
            <li class="border-b pb-4">
                <p class="font-semibold">{{ $chercheur->user->name ?? 'Nom introuvable' }}</p>
                <p class="text-sm text-gray-600">{{ Str::limit($chercheur->biographie, 100) ?? 'Pas de biographie' }}</p>
            </li>
            @endforeach
        </ul>
    </div>

    <div class="mt-3 w-full">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="p-2 w-full block bg-red-500 hover:bg-red-600 text-white font-semibold py-3 text-center rounded-lg">Se déconnecter</button>
        </form>
    </div>
</div>
@endsection
