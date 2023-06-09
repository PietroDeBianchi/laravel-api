@extends('layouts.admin')

@section('page-title', $project->title)

@section('content')

<div class="container" id="ContainerCard">
    <div id="projectCard">
        <h1>{{$project->title}}</h1>
        <h4>{{$project->sub_title}}</h4>
        <div class="mb-2">
            @foreach ($project->technologies as $technology)
                <span class="badge text-bg-primary">{{$technology->type}}</span>
            @endforeach
        </div>
        <p>{{$project->description}}</p>
        <p>{{$project->skill?$project->skill->type:'NULL'}}</p>
        @if ($project->image)
            <img class="card-img-top py-2" src="{{ asset('storage/' . $project->image)}}" alt="{{$project->title}}">
        @else
            <img class="card-img-top py-2" src="https://i.ebayimg.com/images/g/BBYAAOSwT-Neb3XT/s-l400.jpg" alt="{{$project->title}}">
        @endif
    </div>
    <div>
        <a href="{{route('admin.projects.index')}}" class="btn btn-primary">Go Back to List</a> 
    </div>
</div>


@endsection