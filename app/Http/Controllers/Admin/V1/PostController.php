<?php

namespace App\Http\Controllers\Admin\V1;

use App\Constants\AdminConstants;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\V1\StorePostRequest;
use App\Http\Requests\Admin\V1\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the posts.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = Post::query();

        // Join with users table for owner name search/sort
        $query->leftJoin('users', 'posts.owner_id', '=', 'users.id');

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('posts.title', 'like', "%{$search}%")
                  ->orWhere('posts.description', 'like', "%{$search}%")
                  ->orWhere('users.first_name', 'like', "%{$search}%")
                  ->orWhere('users.last_name', 'like', "%{$search}%");
        }

        $sortBy = $request->get('sort_by');
        $sortOrder = $request->get('sort_order', 'desc');

        if (empty($sortBy)) {
            $sortBy = 'created_at'; // Default sort key (column name without table prefix)
        }

        // Determine the actual column(s) to order by, including table prefix
        if ($sortBy === 'owner_name') {
            $query->orderBy('users.first_name', $sortOrder);
            $query->orderBy('users.last_name', $sortOrder);
        } else {
            // Assume other sortable columns belong to the 'posts' table
            $query->orderBy('posts.' . $sortBy, $sortOrder);
        }

        $posts = $query->select('posts.*')->paginate(10);

        $pageConfigs = [
            'pageHeader' => false,
            'contentLayout' => 'content-left-sidebar',
            'pageClass' => 'posts-page'
        ];

        return view('admin.posts.list', compact('posts', 'pageConfigs'));
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $pageConfigs = [
            'pageHeader' => false,
            'contentLayout' => 'content-left-sidebar',
            'pageClass' => 'posts-page'
        ];
        return view('admin.posts.create', compact('pageConfigs'));
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  \App\Http\Requests\Admin\V1\StorePostRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();
        Post::create($validated);

        return redirect()->route('posts.index')->with('success', AdminConstants::POST_CREATED_SUCCESS);
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\View\View
     */
    public function edit(Post $post)
    {
        $post->load('owner'); // Eager load the owner relationship
        $pageConfigs = [
            'pageHeader' => false,
            'contentLayout' => 'content-left-sidebar',
            'pageClass' => 'posts-page'
        ];
        return view('admin.posts.edit', compact('post', 'pageConfigs'));
    }

    /**
     * Update the specified post in storage.
     *
     * @param  \App\Http\Requests\Admin\V1\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $validated = $request->validated();
        $post->update($validated);

        return redirect()->route('posts.index')->with('success', AdminConstants::POST_UPDATED_SUCCESS);
    }

    /**
     * Remove the specified post from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', AdminConstants::POST_DELETED_SUCCESS);
    }
}
