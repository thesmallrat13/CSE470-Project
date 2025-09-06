@extends('layouts.app')

@section('content')
<h2>{{ $group->name }} - Resources</h2>

<form method="POST" action="{{ route('groups.resources.store', $group->id) }}">
    @csrf
    <input type="text" name="title" placeholder="Title" required>
    <input type="url" name="link" placeholder="Link" required>
    <button type="submit">Add Resource</button>
</form>

<ul>
@foreach($resources as $res)
    <li><a href="{{ $res->link }}" target="_blank">{{ $res->title }}</a> (by {{ $res->user->name }})</li>
@endforeach
</ul>
@endsection
