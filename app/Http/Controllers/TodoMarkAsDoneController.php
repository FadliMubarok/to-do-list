<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoMarkAsDoneController extends Controller
{
    public function update($id)
    {
        $data = Todo::findOrFail($id);
        $data->update([
            'status' => 'Done'
        ]);

        return redirect()->route('todo.index')->with('success', 'Data Berhasil Diubah');
    }
}
