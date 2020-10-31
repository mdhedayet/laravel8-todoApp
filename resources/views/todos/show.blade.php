@extends('layout.app')
@section('title')
    <title>Todo Descrition</title>
@endsection
@section('content')
              <div class="card">
                <div class="card-header">
                    <h5>
                        {{$todo->name}} 
                        <a href="/todos/{{$todo->id}}/edit" class="btn btn-primary float-right btn-sm px-4">Edit</a>

                        @if ($todo->completed==0)
                        <a href="/todos/{{$todo->id}}/done" class="btn btn-info float-right btn-sm mx-3">Mark As Done</a>
                        @else
                        <a href="/todos/{{$todo->id}}/done" class="btn btn-warning float-right btn-sm mx-3">Mark As UnDone</a>
                        @endif
                </h5>
                </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            {{$todo->description}}
                        </li>
                    </ul>
            </div>
@endsection