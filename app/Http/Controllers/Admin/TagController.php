<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TagController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.tags.index')->only('index');
        $this->middleware('can:admin.tags.create')->only('create', 'store');
        $this->middleware('can:admin.tags.edit')->only('edit', 'update');
        $this->middleware('can:admin.tags.destroy')->only('destroy');
    }

    public function index()
    {

        $tags = Http::get('http://blog.test/api/obtener-tags');
        $datos = json_decode($tags->getBody(), true);
        
        return view('admin.tags.index', ['tags' => $datos]);
       
    }

    public function create()
    {

        $colors = [
            'red' => 'Red',
            'yellow' => 'Yellow',
            'green' => 'Green',
            'blue' => 'Blue',
            'indigo' => 'Indigo',
            'purple' => 'Purple',
            'pink' => 'Pink',
            'gray' => 'Gray'

        ];

        return view('admin.tags.create', compact('colors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:tags',
            'color' => 'required'
        ]);

        $tag = Tag::create($request->all());

        return redirect()->route('admin.tags.edit', compact('tag')) > with('info', 'The tag was created successfully');
    }

    public function edit($id)
    {

        $colors = [
            'red' => 'Red',
            'yellow' => 'Yellow',
            'green' => 'Green',
            'blue' => 'Blue',
            'indigo' => 'Indigo',
            'purple' => 'Purple',
            'pink' => 'Pink',
            'gray' => 'Gray'

        ];

        $tags = Tag::all();

        $tag = null;
        foreach ($tags as $tagf) {
            if ($tagf->id == $id) {
                $tag = $tagf;
            }
        }

        return view('admin.tags.edit', compact('tag', 'colors'));
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:tags,slug,$tag->id",
            'color' => 'required'
        ]);

        $tag->update($request->all());

        return redirect()->route('admin.tags.edit', $tag)->with('info', 'The tag was updated successfully');
    }

    public function destroy($id)
    {

        $tags = Tag::all();

        $tag = null;
        foreach ($tags as $tagf) {
            if ($tagf->id == $id) {
                $tag = $tagf;
            }
        }

        $tag->delete();

        return redirect()->route('admin.tags.index')->with('info', 'The tag was deleted successfully');
    }
}
