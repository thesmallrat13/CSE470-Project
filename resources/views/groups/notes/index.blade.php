@extends('layouts.app')

@section('content')
<h2>{{ $group->name }} - Notes</h2>

<form method="POST" action="{{ route('groups.notes.store', $group->id) }}">
    @csrf
    <textarea name="note" placeholder="Add a note..." required></textarea>
    <button type="submit">Add Note</button>
</form>

<ul>
@foreach($notes as $n)
    <li>{{ $n->note }} (by {{ $n->user->name }})</li>
@endforeach
</ul>
@endsection
