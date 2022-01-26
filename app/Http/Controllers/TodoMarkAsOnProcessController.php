<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoMarkAsOnProcessController extends Controller
{
    public function update($id)
    {
        $data = Todo::findOrFail($id);
        $data->update([
            'status' => 'On Process'
        ]);

        return redirect()->route('todo.index')->with('success', 'Data Berhasil Diubah');
    }
}
