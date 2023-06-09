@extends('layouts.admin')

@section('content')

<div class="d-flex flex-wrap">
    @foreach ($projects as $project)
        <div class="card m-3 position-relative" id="projectCardIndex" style="width: 18rem;">
            @if (!empty($project->image))
                <img src="{{ asset('storage/' . $project->image) }}" class="card-img-top" alt="{{$project->title}}">
            @else
                <img src="https://i.ebayimg.com/images/g/BBYAAOSwT-Neb3XT/s-l400.jpg" class="card-img-top" alt="{{$project->title}}">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{$project->title}}</h5>
                <p class="card-text">{{$project->sub_title}}</p>
            </div>
            <div class="text-center mb-2">
                <a href="{{route('admin.projects.edit', $project->slug)}}" class="btn btn-primary">Edit Project</a> {{-- as specified in web.php --}}
                <a href="{{route('admin.projects.show', $project->slug)}}" class="btn btn-primary">See Project</a> 
            </div>
            <form action="{{route('admin.projects.destroy', ['project'=> $project->slug])}}" method="POST" class="delete-btn position-absolute">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa-solid fa-trash-can"></i></button>
            </form>
        </div>
    @endforeach
</div>

@endsection