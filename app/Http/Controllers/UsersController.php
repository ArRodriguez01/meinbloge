<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index',[
            'users' =>User::all(),
        ]);

    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', [
            'user' =>$user,
        ]);
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return redirect()->route('users', ['id' => $user->id]);
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users')->with('success', 'El usuario ha sido eliminado correctamente.');
    }
}
