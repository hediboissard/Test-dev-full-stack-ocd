{{-- resources/views/people/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="page-title">Liste des personnes</h1>

        <div class="action-buttons">
            <a href="{{ route('people.create') }}" class="create-link">Créer une nouvelle Personne</a>
            
            @if (auth()->check())
                <form action="{{ route('logout') }}" method="POST" class="logout-form">
                    @csrf
                    <button type="submit" class="logout-btn">Se déconnecter</button>
                </form>
            @endif
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <ul class="people-list">
            @foreach($people as $person)
                <li class="person-item">
                    <span class="person-name">{{ $person->first_name }} {{ $person->last_name }}</span>
                    <span class="person-creator">
                        Créé par {{ $person->user ? $person->user->name : 'Utilisateur inconnu' }}
                    </span>
                    <a href="{{ route('people.show', $person->id) }}" class="view-link">Voir</a>
                </li>
            @endforeach
        </ul>
    </div>

    <style>
        .container {
            width: 80%;
            margin: 0 auto;
            padding-top: 20px;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .action-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .create-link {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1.2rem;
        }

        .create-link:hover {
            background-color: #45a049;
        }

        .logout-form {
            text-align: right;
        }

        .logout-btn {
            background-color: #f44336;
            color: white;
            padding: 10px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .logout-btn:hover {
            background-color: #e53935;
        }

        .alert-success {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .people-list {
            list-style-type: none;
            padding: 0;
        }

        .person-item {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .person-name {
            font-size: 1.3rem;
            font-weight: bold;
            color: #333;
        }

        .person-creator {
            font-size: 1rem;
            color: #777;
        }

        .view-link {
            font-size: 1.1rem;
            color: #007bff;
            text-decoration: none;
        }

        .view-link:hover {
            text-decoration: underline;
        }
    </style>
@endsection
