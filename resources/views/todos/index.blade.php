@extends('layout.app')
@section('title')
    <title>Todos App</title>
@endsection
@section('content')
    <div class="card">
              <div class="card-header ">
                    <h5>Todos List</h5>
              </div>
              <ul class="list-group list-group-flush">
                  @foreach ($todos->reverse() as $todo)
                  <li class="list-group-item">
                      @if ($todo->completed==0)
                      <i class="far fa-times-circle text-danger"></i>
                      @else
                        <i class="fas fa-check-circle text-success"></i>
                      @endif{{ $todo->name }} 
                  <a href="/todos/{{$todo->id}}" class="btn btn-primary btn-sm float-right px-3">View</a>
                  <a href="/todos/{{$todo->id}}/delete" class="btn btn-danger btn-sm float-right mx-3">Delete</a>
                  </li>
                  @endforeach
              </ul>
      </div>
@endsection