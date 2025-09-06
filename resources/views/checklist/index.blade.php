@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">My Checklist</h2>

    <ul class="list-group">
        @foreach($items as $item)
            <li class="list-group-item d-flex align-items-center">
                <div class="form-check">
                    <input 
                        class="form-check-input toggle-checklist"
                        type="checkbox"
                        id="item-{{ $item->id }}"
                        data-id="{{ $item->id }}"
                        {{ $item->is_checked ? 'checked' : '' }}
                    >
                    <label 
                        class="form-check-label ms-2 {{ $item->is_checked ? 'text-decoration-line-through text-muted' : '' }}"
                        for="item-{{ $item->id }}"
                    >
                        {{ $item->title }}
                    </label>
                </div>
            </li>
        @endforeach
    </ul>
</div>

<script>
document.querySelectorAll('.toggle-checklist').forEach(cb => {
    cb.addEventListener('change', function() {
        fetch(`/checklist/${this.dataset.id}/toggle`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
            },
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                const label = this.nextElementSibling;
                if (data.is_checked) {
                    label.classList.add('text-decoration-line-through', 'text-muted');
                } else {
                    label.classList.remove('text-decoration-line-through', 'text-muted');
                }
            } else {
                alert('Error updating checklist!');
            }
        })
        .catch(() => alert('Error updating checklist!'));
    });
});
</script>
@endsection
