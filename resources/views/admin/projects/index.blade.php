@extends('layouts.admin')

@section('content')

<div class="d-flex flex-wrap">
    @foreach ($projects as $project)
        <div class="card p-2 m-3" style="width: 18rem;">
            <img src="{{$project->image}}" class="card-img-top" alt="{{$project->title}}">
            <div class="card-body">
                <h5 class="card-title">{{$project->title}}</h5>
                <p class="card-text">{{$project->sub_title}}</p>
            </div>
            <div class="text-center">
                <a href="{{route('admin.projects.edit', $project->slug)}}" class="btn btn-primary">Edit Project</a> {{-- as specified in web.php --}}
                <a href="{{route('admin.projects.show', $project->slug)}}" class="btn btn-primary">See Project</a> 
                <form action="{{route('admin.projects.destroy', ['project'=> $project->slug])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa-solid fa-trash-can"></i></button>
                </form>
            </div>
        </div>
    @endforeach
</div>

@endsection