<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view ('todos.index')->with('todos', Todo::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        /* $rules = [
			'name' => 'required|string|min:3|max:100',
			'description' => 'required|string|min:3|max:255',
		];
        
        $validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect('/new-todos')
			->withInput()
			->withErrors($validator);
		}
		else{
            $data =request()->all();
            $todo = new Todo();
            $todo->name = $data['name'];
            $todo->description = $data['description'];
            $todo->save();
            return redirect('/');
        } */
    
        
        $validatedData = $request->validate([
        'name' => 'required|min:3|max:300',
        'description' => 'required|min:3|max:5000',
        ]);
        
        $data =request()->all();
        $todo = new Todo();

        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;

        $todo->save();

        session()->flash('success','Todo create successfully.');

        return redirect('/');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view ('todos.show')->with('todo', Todo::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::find($id);
        return view('todos.edit')->with('todo',$todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
        'name' => 'required|min:3|max:300',
        'description' => 'required|min:3|max:5000',
        ]);

        $data =request()->all();
        $todo = Todo::find($id);

        $todo->name = $data['name'];
        $todo->description = $data['description'];

        $todo->save();
        session()->flash('success','Todo update successfully.');
        return redirect()->action([TodoController::class, 'show'],[$id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function done($id)
    {
        $todo = Todo::find($id);
        if ($todo->completed==0) {
            $todo->completed="1";
            $todo->save();
            session()->flash('success','Todo mark as done successfully.');
        }else {
            $todo->completed="0";
            $todo->save();
            session()->flash('success','Todo mark as undone successfully.');
        }
        
        return redirect()->action([TodoController::class, 'show'],[$id]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
        session()->flash('success','Todo deleted successfully.');
        return redirect('/');
    }
}
