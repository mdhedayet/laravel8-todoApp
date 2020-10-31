@extends('layout.app')
@section('content')
<div class="card">
                <div class="card-header ">
                    <h5 class="text-center">Edit Todo</h5>
                </div>
     <div class="p-3"> 
         @if ($errors->any())
<div style="padding-bottom: .5rem!important;">
  <ul class="list-group">
      @foreach ($errors->all() as $error)
          <li class="list-group-item text-danger">
              {{$error}}
          </li>
      @endforeach
  </ul>
</div>
@endif     
        <form action="/update-todo/{{$todo->id}}" method="POST">
            @csrf
                
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Todo Name</label>
                    <input type="text" name="name" value="{{$todo->name}}" class="form-control" id="exampleInputTest1" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Todo Descritption</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" >{{$todo->description}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update Todo</button>
        </form>
    </div>
</div>
@endsection