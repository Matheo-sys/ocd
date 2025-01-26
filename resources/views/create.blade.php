@extends('layouts.app')

@section('content')
    <h1>Créer une nouvelle personne</h1>

    <form method="POST" action="{{ route('people.store') }}">
        @csrf
        <div>
            <label for="first_name">Prénom</label>
            <input type="text" name="first_name" required>
        </div>
        <div>
            <label for="last_name">Nom</label>
            <input type="text" name="last_name" required>
        </div>
        <div>
            <label for="birth_name">Nom de naissance (facultatif)</label>
            <input type="text" name="birth_name">
        </div>
        <div>
            <label for="middle_names">Prénoms secondaires (facultatif)</label>
            <input type="text" name="middle_names">
        </div>
        <div>
            <label for="date_of_birth">Date de naissance (facultatif)</label>
            <input type="date" name="date_of_birth">
        </div>
        <button type="submit">Créer</button>
    </form>
@endsection
