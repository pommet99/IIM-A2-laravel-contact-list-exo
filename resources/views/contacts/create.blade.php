@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Create a Contact</h3>
                    <!-- TODO mise en place de la form pour créer un contact -->
                    <form action="{{route('contacts')}}" methode="post">
                     @csrf
                     @method('put')

                     <input type="text" name="name" value="{{old('name', "valeur par defaut")}}">

                     @error('name')
                     Error in "name"
                     @enderror

                     <input type="text" name="tel" value="{{old('tel', "valeur par defaut")}}">

                     @error('tel')
                     Error in "tel"
                     @enderror

                     <input type="text" name="email" value="{{old('email', "valeur par defaut")}}">

                     @error('email')
                     Error in "email"
                     @enderror

                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
            </div>
        </div>
    </div>
@endsection
