@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Créer un contact</h3>
                <form method='post' action='{{route('contacts.store')}}'>
                    <!-- TODO mise en place de la form pour créer un contact -->
                    @csrf
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Entrer le nom" value="{{old('name')}}">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="text">Telephone</label>
                            <input name="tel" type="text" class="form-control @error('tel') is-invalid @enderror" id="tel" placeholder="Entrer le numéro de téléphone" value="{{old('tel')}}">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Entrer votre email" value="{{old('email')}}">
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