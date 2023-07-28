<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
  public function addNote(Request $req) {
    $data = $req->validate([
      'noteTitle' => 'required',
      'noteContent' => 'required',
      'noteColor' => 'required',
    ]);

    $note = new Note;
    $note->title = strip_tags($req->noteTitle);
    $note->content = strip_tags($req->noteContent);
    $note->color = $req->noteColor;
    $note->user_id = auth()->id();
    $note->save();
    return redirect()->back();
  }
  public function deleteNote(Note $note) {
    $note->delete();
    return redirect()->route('dashboard');
  }
  public function updateNote(Request $req, Note $note) {
    $data = $req->validate([
      'noteTitle' =>'required',
      'noteContent' =>'required',
    ]);
    $data['color'] = $req->noteColor;
    $data['title'] = strip_tags($data['noteTitle']);
    $data['content'] = strip_tags($data['noteContent']);
    $note->update($data);
    return redirect()->route('dashboard');
  }
  public function updateNotePage(Note $note) {
    return view('editnote', ['note'=> $note]);
  }
  public function getAllNote() {
    $allNotes = [];
    if(auth()->check()) {
      $allNotes = auth()->user()->usersAllNotes()->latest()->get();
    }
    return view('/dashboard', ['notes' => $allNotes]);
  }
}
 