@extends('layouts.app')

@section('content')
    <h1>Détails de la personne</h1>
    <p><strong>Prénom:</strong> {{ $person->first_name }}</p>
    <p><strong>Nom:</strong> {{ $person->last_name }}</p>
    <p><strong>Nom de naissance:</strong> {{ $person->birth_name }}</p>
    <p><strong>Prénoms secondaires:</strong> {{ $person->middle_names }}</p>
    <p><strong>Date de naissance:</strong> {{ $person->date_of_birth }}</p>
    <p><strong>Créé par:</strong> {{ $person->createdBy->name }}</p>

    <h3>Enfants :</h3>
    <ul>
        @foreach($person->children as $child)
            <li>{{ $child->child->first_name }} {{ $child->child->last_name }}</li>
        @endforeach
    </ul>

    <h3>Parents :</h3>
    <ul>
        @foreach($person->parents as $parent)
            <li>{{ $parent->parent->first_name }} {{ $parent->parent->last_name }}</li>
        @endforeach
    </ul>

    <a href="{{ route('people.index') }}">Retour à la liste</a>
@endsection
