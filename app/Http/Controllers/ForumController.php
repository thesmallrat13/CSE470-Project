<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ForumPost;
use App\Models\ForumComment;
use App\Models\ForumVote;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->get('sort', 'recent');
        $query = ForumPost::with('user', 'comments', 'votes');

        if ($sort === 'votes') {
            $posts = $query->get()->sortByDesc->score();
        } else {
            $posts = $query->orderBy('created_at', 'desc')->get();
        }

        if ($request->has('search')) {
            $posts = $posts->filter(function ($post) use ($request) {
                return str_contains(strtolower($post->title), strtolower($request->search)) ||
                       str_contains(strtolower($post->content), strtolower($request->search));
            });
        }

        return view('forum.index', compact('posts', 'sort'));
    }

    public function show($id)
    {
        $post = ForumPost::with('user', 'comments.user', 'votes')->findOrFail($id);
        return view('forum.show', compact('post'));
    }

    public function store(Request $request)
    {
        ForumPost::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content,
        ]);
        return redirect()->route('forum.index');
    }

    public function comment(Request $request, $id)
    {
        ForumComment::create([
            'post_id' => $id,
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);
        return back();
    }

    public function vote($id, $type)
    {
        $vote = $type === 'up' ? 1 : -1;

        ForumVote::updateOrCreate(
            ['post_id' => $id, 'user_id' => Auth::id()],
            ['vote' => $vote]
        );

        return back();
    }
}
