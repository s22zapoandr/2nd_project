<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author
class AuthorController extends Controller
{
    // display all authors
 public function list()
 {
 $items = Author::orderBy('name', 'asc')->get();
 return view(
 'author.list',
 [
 'title' => 'Authors',
 'items' => $items
 ]
 );
 }
public function create()
{
 return view(
 'author.form',
 [
 'title' => 'Add new author',
 'author' => new Author()
 ]
 );
}
public function put(Request $request)
{
 $validatedData = $request->validate([
 'name' => 'required',
 ]);
 $author = new Author();
 $author->name = $validatedData['name'];
 $author->save();
 return redirect('/authors');
}
public function update(Author $author)
{
 return view(
 'author.form',
 [
 'title' => 'Edit author',
 'author' => $author
 ]
 );
}
public function patch(Author $author, Request $request)
{
 $validatedData = $request->validate([
 'name' => 'required',
 ]);
 $author->name = $validatedData['name'];
 $author->save();
 return redirect('/authors');
}
public function delete(Author $author)
{
 $author->delete();
 return redirect('/authors');
}

};
