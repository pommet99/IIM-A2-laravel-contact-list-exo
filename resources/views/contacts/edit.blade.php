@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- TODO Afficher le nom du contact -->
                <h3>Modification du contact <b>{{$contact->name}}</b></h3>
                <form action="{{route('contacts.update', $contact->id)}}" method="post">
                    <!-- TODO mise en place de la form pour modifier un contact -->

                    @csrf
                    @method("put")
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Modifier le nom" value="{{$contact->name}}">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="text">Telephone</label>
                            <input name="tel" type="text" class="form-control @error('tel') is-invalid @enderror" id="tel" placeholder="Modifier le numéro de téléphone" value="{{$contact->tel}}">
                                @error('tel')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Modifier l'email" value="{{$contact->email}}">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection