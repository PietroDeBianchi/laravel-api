@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row my-5">
        <table class="table table-hover table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Type</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($skills as $skill)
                    <tr>
                        <th>{{$skill->id}}</th>
                        <td>{{$skill->type}}</td>
                        </td>
                        <td class="d-flex">
                            <div class="me-2 my-2">
                                <a href="{{route('admin.skills.edit',['skill'=>$skill->slug])}}" class="btn btn-warning">Edit</a>
                            </div>
                            <form  class="my-2" action="{{route('admin.skills.destroy',['skill'=>$skill->slug])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <dir>
            <a href="{{route('admin.skills.create')}}" class="btn btn-primary">Add Skill</a>
        </dir>
    </div>

</div>
@endsection