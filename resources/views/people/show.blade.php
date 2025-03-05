@extends('layouts.app')

@section('content')
    <h1>{{ $person->name }}</h1>
    <p>Email: {{ $person->email }}</p>
    <p>Créé par: {{ $person->user->name }}</p>

    <h3>Enfants</h3>
    <ul>
        @foreach($person->children as $child)
            <li>{{ $child->name }}</li>
        @endforeach
    </ul>

    <h3>Parent</h3>
    @if($person->parent)
        <p>{{ $person->parent->name }}</p>
    @else
        <p>Aucun parent enregistré.</p>
    @endif

    <a href="{{ route('people.index') }}">Retour à la liste</a>
@endsection
