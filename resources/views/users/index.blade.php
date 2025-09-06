@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>All Users</h3>

    @if($users->count() > 0)
        <div class="list-group">
            @foreach($users as $user)
                <div class="list-group-item mb-2">
                    <h5>{{ $user->name }} <small class="text-muted">({{ $user->email }})</small></h5>
                    <p>Institution: {{ $user->institution ?? 'Not set' }}</p>

                    @if($user->researchInterests->count() > 0)
                        <p><strong>Research Interests:</strong></p>
                        <ul>
                            @foreach($user->researchInterests as $interest)
                                <li>{{ $interest->name }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted">No research interests added yet.</p>
                    @endif

                    @if($user->groups->count() > 0)
                        <p><strong>Groups:</strong></p>
                        <ul>
                            @foreach($user->groups as $group)
                                <li>{{ $group->name }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted">No groups joined yet.</p>
                    @endif
                </div>
            @endforeach
        </div>
    @else
        <p class="text-muted">No users found.</p>
    @endif
</div>
@endsection
