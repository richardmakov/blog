<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\DB;




class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.posts.index')->only('index');
        $this->middleware('can:admin.posts.create')->only('create', 'store');
        $this->middleware('can:admin.posts.edit')->only('edit', 'update');
        $this->middleware('can:admin.posts.destroy')->only('destroy');
        $this->middleware('can:admin.posts.show')->only('show', 'edit', 'update', 'destroy');
    }

    public function index()
    {
        return view('admin.posts.index');
    }

    public function create()
    {

        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'))->with('info', 'The post was created successfully');;
    }

    public function store(PostRequest $request)
    {

        /* Storage::put('posts', $request->file('file')); */

        $post = Post::create($request->all());

        if ($request->file('file')) {
            $url = Storage::put('posts', $request->file('file'));

            $post->image()->create([
                'url' => $url
            ]);
        }

        if ($request->tags) {
            $post->tags()->attach([1, 2, 3]);
        }

        return redirect()->route('admin.posts.edit', $post);
    }

    public function edit(Post $post)
    {
        $user = auth()->user();
        if ($this->userHasRole($user->id, 'editor') || $this->isAuthor($user->id, $post->id)) {
            $categories = Category::pluck('name', 'id');
            $tags = Tag::all();

            return view('admin.posts.edit', compact('post', 'categories', 'tags'));
        } else {
            abort(403, 'Unauthorized action.');
        }
    }


    public function update(PostRequest $request, Post $post)
    {

        $user = auth()->user();
        if ($this->userHasRole($user->id, 'editor') || $this->isAuthor($user->id, $post->id)) {

            $post->update($request->all());

            if ($request->file('file')) {
                $url = Storage::put('posts', $request->file('file'));

                if ($post->image) {
                    Storage::delete($post->image->url);

                    $post->image->update([
                        'url' => $url
                    ]);
                } else {
                    $post->image()->create([
                        'url' => $url
                    ]);
                }
            }

            if ($request->tags) {
                $post->tags()->sync($request->tags);
            }
            return redirect()->route('admin.posts.edit', $post)->with('info', 'The post was updated successfully');
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    public function destroy(Post $post)
    {
        $user = auth()->user();
        if ($this->userHasRole($user->id, 'editor') || $this->isAuthor($user->id, $post->id)) {
            $post->delete();

            return redirect()->route('admin.posts.index')->with('info', 'The post was deleted successfully');
        } else {
            abort(403, 'Unauthorized action.');
        }
    }
    
    public function show()
    {
        return view('admin.posts.show');
    }

    protected function userHasRole($userId, $role)
    {
        return DB::table('model_has_roles')
            ->where('model_id', $userId)
            ->where('model_type', 'App\\Models\\User')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->where('roles.name', $role)
            ->exists();
    }

    protected function isAuthor($userId, $postId)
    {
        return DB::table('posts')
            ->where('id', $postId)
            ->where('user_id', $userId)
            ->exists();
    }
}
