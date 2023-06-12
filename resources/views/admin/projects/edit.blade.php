@extends('layouts.admin')

@section('page-title', 'Edit Project')

@section('content')

<div class="container-fluid mt-4 px-4" id="projectCardEdit">
    <form method="POST" action="{{ route('admin.projects.update', ['project' => $project->slug]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title', $project->title)}}">
                @error('title')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="sub_title" class="form-label">Sub Title</label>
                <input type="text" class="form-control @error('sub_title') is-invalid @enderror" id="sub_title" name="sub_title" value="{{old('sub_title', $project->sub_title)}}">
                @error('sub_title')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{old('description', $project->description)}}</textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                @foreach ($technologies as $technology)
                    <div class="pe-3 d-inline">
                        @if ($errors->any())
                            <input id="tech_{{$technology->id}}" @if (in_array($technology->id, old('technologies', []))) checked @endif type="checkbox" name="technologies[]" value="{{$technology->id}}">
                        @else
                            <input id="tech_{{$technology->id}}" @if ($project->technologies->contains($technology->id)) checked @endif type="checkbox" name="technologies[]" value="{{$technology->id}}">
                        @endif
                        <label for="tech_{{$technology->id}}" class="form-label">{{$technology->type}}</label>
                    </div>
                @endforeach
                @error('technology')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="skill_id" class="form-label">Skill</label>
                <select class="form-select" name="skill_id" id="skil_id">
                        <option value="#" @selected(old('skill_id', $project->skill_id) == '')>NULL</option>
                    @foreach ($skills as $skill)
                        <option value="{{$skill->id}}" @selected(old('skill_id', $project->skill_id) == $skill->id)>{{$skill->type}}</option>
                    @endforeach
                </select>
                @error('skill_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            @if ($project->image)
            <div class="imgageContainer position-relative">
                <img src="{{ asset('storage/' . $project->image) }}" class="card-img-top" alt="{{$project->title}}">
                <a href="{{ route('admin.projects.imageDelete', $project->slug) }}" class="btn btn-danger position-absolute"><i class="fa-solid fa-trash-can"></i></a>
            </div>
            @else
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            @endif
            <button type="submit" class="btn btn-primary mt-2">Save</button>
    </form>
</div>

@endsection