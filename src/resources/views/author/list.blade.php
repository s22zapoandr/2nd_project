@extends('layout')
@section('content')
 <h1>{{ $title }}</h1>
 @if (count($items) > 0)
 <table class="table table-striped table-hover table-sm">
 <a href="/authors/create" class="btn btn-primary">Izveidot jaunu</a>
Route::get('/authors/update/{author}', [AuthorController::class, 'update']);
Route::post('/authors/patch/{author}', [AuthorController::class, 'patch']);
 <thead class="thead-light">
 <tr>
 <th>ID</td>
<th>Name</td>
<th>&nbsp;</td>
 </tr>
 </thead>
 <tbody>
 @foreach($items as $author)
 <tr>
 <td>{{ $author->id }}</td>
 <td>{{ $author->name }}</td>
 <a href="/authors/update/{{ $author->id }}" class="btn btn-outline-primary btnsm">Edit</a>
 <form action="/authors/delete/{{ $author->id }}" method="post" class="deletionform d-inline">
 @csrf
 <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
</form>

 </tr>
 @endforeach
 </tbody>
 </table>
 @else
 <p>No entries found in database</p>
 @endif
@endsection
