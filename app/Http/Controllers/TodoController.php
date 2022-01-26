<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\Todo\StoreRequest;
use App\Http\Requests\Todo\UpdateRequest;

class TodoController extends Controller
{
    public function index()
    {
        $datas = Todo::where('user_id', Auth::id())->get();
        return view('todo.index', compact('datas'));
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(StoreRequest $request)
    {
        $data = Todo::create([
            'title' => $request->title,
            'detail' => $request->detail,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('todo.index')->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($id)
    {
        $data = Todo::findOrFail($id);

        return view('todo.edit', compact('data'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = Todo::findOrFail($id);
        $data->update([
            'title' => $request->title,
            'detail' => $request->detail,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('todo.index')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $data = Todo::findOrFail($id);
        $data->delete();

        return redirect()->route('todo.index')->with('success', 'Data Berhasil Dihapus');
    }
}
