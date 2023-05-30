@extends('layouts.admin')

@section('content')

        <div class="container">
            <div class="row mt-4">
                <h2>Crea nuovo Tipo di progetto:</h2>
                <form method="POST" action="{{route('admin.skills.store')}}">

                    @csrf

                    <div class="mb-3">
                        <label for="type" class="form-label">Nome tipologia:</label>
                        <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" type="type" value="{{old('type')}}">
                        @if ($errors->has('type'))
                            @error('type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        @elseif ($errors->any() && old('type'))
                            <p class="text-success">Type Added!</p>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary my-4">Save new Type</button>

            </form>

        </div>
    </div>

@endsection