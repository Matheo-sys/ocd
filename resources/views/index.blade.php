@extends('layouts.app')

@section('content')
    <h1>Liste des Personnes</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <ul>
        @foreach($people as $person)
            <li>
                <a href="{{ route('people.show', $person->id) }}">
                    {{ $person->first_name }} {{ $person->last_name }} - Créé par : {{ $person->createdBy->name }}
                </a>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('people.create') }}">Créer une nouvelle personne</a>
@endsection
