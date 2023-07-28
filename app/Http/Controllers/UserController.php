<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\NoteController;

class UserController extends Controller
{
  public function login(Request $req) {
    $data = $req -> validate([
      'login_email' => 'required',
      'login_password' => 'required',
    ]);
    if(auth() -> attempt([
      'email' => $data['login_email'],
      'password' => $data['login_password'],
    ])) {
      $req -> session() -> regenerate();
    }
    return redirect()->route('dashboard');
  }

  public function logout(Request $req) {
    auth() -> logout();
    $req -> session() -> regenerate();
    return redirect('/');
  }

  public function register(Request $req) {
    $data = $req -> validate([
      'name' => 'required',
      'email' => ['required', 'email', Rule::unique('users', 'email')],
      'password' => ['required', 'confirmed', 'min:4', 'max:25']
    ]);

    $data['password'] = bcrypt($data['password']);
    $user = User::create($data);
    auth() -> login($user);

    return redirect('dashboard');
  }

  public function delete() {
    auth()->user()->delete();
    return redirect('/');
  }

  public function update(Request $req) {
    $data = $req->validate([
      'name' => 'required'
    ]);
    $data['name'] = strip_tags($data['name']);
    $user = auth()->user();
    $user -> update([
      'name' => $data['name']
    ]);
    return back();
  }

  public function updatePage(User $user) {
    return view('edituser', ['user'=> $user]);
  }
}
