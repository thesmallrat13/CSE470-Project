@extends('layouts.app')

@section('content')
<h2>{{ $group->name }} - Progress</h2>

<form method="POST" action="{{ route('groups.progress.store', $group->id) }}">
    @csrf
    <input type="text" name="stage" placeholder="New Stage" required>
    <button type="submit">Add Stage</button>
</form>

<ul>
@foreach($progresses as $p)
    <li>
        <a href="{{ route('groups.progress.toggle', $p->id) }}">
            [{{ $p->completed ? '✔' : '❌' }}] {{ $p->stage }}
        </a>
    </li>
@endforeach
</ul>
@endsection
