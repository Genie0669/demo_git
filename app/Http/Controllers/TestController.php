<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function index()
	{
	    $datas = \App\Test::orderBy('created_at', 'desc')->get();
		return view('index', compact('datas'));
	}

	public function create()
	{
	    return view('create');
	}

	public function store(Request $request)
	{
	    $data = \App\Test::create($request->all());
		return redirect('/show/'.$data->id);
	}

	public function show($id)
	{
	    $data = \App\Test::find($id);
		return view('show', compact('data'));
	}
	
	public function edit($id)
	{
	    $data = \App\Test::find($id);
		return view('edit', compact('data'));
	}

	public function update(Request $request, $id)
	{
	    $data = \App\Test::find($request->id)->update($request->all());
		return redirect('/show/'.$id);
	}
	
	public function destroy($id)
	{
	    $data = \App\Test::destroy($id);
		return redirect('/index');
	}
	
}
