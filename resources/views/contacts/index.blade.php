@extends('layouts.app');

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- TODO href de la balise <a> pour pointer vers la route de création de contact -->
                <a class="btn btn-primary float-right" href="create.blade.php">Add a Contact</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- TODO : Début de la boucle -->
                    @forelse($contacts as $contact)
                    <tr>
                        <td>{{$contact->id}}</td>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->tel}}</td>
                        <td>{{$contact->email}}</td>

                        <td>
                            <!-- TODO href de la balise <a> pour pointer vers la route de modification du contact -->
                            <a class="btn btn-primary" href="{{route('contacts.edit', $contact->id)}}">Modify</a>
                            <a class="btn btn-danger" onclick="document.getElementById('delete-form-{{$contact->id}}').submit()">Delete</a>
                            

                            <!-- TODO Form pour la suppression d'un contact -->
                            <form id="delete-form-{{$contact->id}}" method='post' action="{{route('contacts.destroy', $contact->id)}}">
                            @csrf
                            @method('delete')

                            </form>
                        </td>
                    </tr>
                    <!-- TODO : Conditions pas de contact -->
                    @empty
                    <tr>
                        <td>You don't have any contacts</td>
                    </tr>
                    <!-- TODO : FIN Boucle -->
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
