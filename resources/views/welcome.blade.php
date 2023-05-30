@extends('layouts.guest')
@section('content')

<div class="p-5 mb-4 bg-light rounded-3">
    <div class="d-flex justify-content-between">
        <h1 class="display-5 fw-bold">
            My Project's Portfolio
        </h1>
        <div>
            <a href="#" class="btn btn-primary btn-lg" type="button">View All Projects</a>
        </div>
    </div>
    <div class="d-flex flex-wrap justify-content-between mt-4">
        @for ($i = 0; $i < 8; $i++)
            @if ($i < count($projects))
                @php $project = $projects[$i]; @endphp
                <div class="card p-2 m-3" style="width: 18rem;">
                    <img src="{{$project->image}}" class="card-img-top" alt="{{$project->title}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$project->title}}</h5>
                        <p class="card-text">{{$project->sub_title}}</p>
                    </div>
                </div>
            @else
                @break
            @endif
        @endfor
    </div>
</div>

<div class="content">
    <div class="container">
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora temporibus, dicta nemo aliquam totam nisi deserunt soluta quas voluptatum ab beatae praesentium necessitatibus minus, facilis illum rerum officiis accusamus dolores!</p>
    </div>
</div>
@endsection