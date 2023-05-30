@extends('layouts.admin')

@section('content')

        <div class="container">
            <div class="row mt-4">
                <h2>Modifica Tipologia:</h2>
                <form method="POST" action="{{route('admin.skills.update',['skill'=>$skill->slug])}}">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="type" class="form-label">Skill</label>
                        <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" value="{{old('type',$skill->type)}}">
                        @if ($errors->has('type'))
                            @error('type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        @elseif ($errors->any() && old('type'))
                            <p class="text-success">Skill Updated!</p>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary my-4">Save</button>

            </form>

        </div>
    </div>

@endsection