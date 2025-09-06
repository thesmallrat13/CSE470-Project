<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResourceController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->get('q'));

        $resources = Resource::query()
            ->when($q, function ($query) use ($q) {
                $query->where(function ($sub) use ($q) {
                    $sub->where('title', 'like', "%{$q}%")
                        ->orWhere('description', 'like', "%{$q}%")
                        ->orWhere('tags', 'like', "%{$q}%");
                });
            })
            ->orderByDesc('created_at')
            ->paginate(12)
            ->withQueryString();

        return view('resources.index', compact('resources', 'q'));
    }

    public function create()
    {
        return view('resources.create');
    }

    public function store(Request $request)
    {
        // Since you said we’re back to “link only” (no image), link stays REQUIRED
        $validated = $request->validate([
            'title'       => ['required', 'string', 'min:3', 'max:200'],
            'description' => ['required', 'string', 'min:5', 'max:2000'],
            'link'        => ['required', 'url', 'max:2048'],
            'tags'        => ['nullable', 'string', 'max:255'],
        ]);

        // Normalize tags a bit (lowercase, trim spaces)
        if (!empty($validated['tags'])) {
            $normalized = collect(explode(',', $validated['tags']))
                ->map(fn ($t) => strtolower(trim($t)))
                ->filter()
                ->unique()
                ->implode(', ');
            $validated['tags'] = $normalized;
        }

        $validated['user_id'] = Auth::id();

        Resource::create($validated);

        return redirect()
            ->route('resources.index')
            ->with('success', 'Resource added successfully!');
    }

    public function show(Resource $resource)
    {
        return view('resources.show', compact('resource'));
    }
}
