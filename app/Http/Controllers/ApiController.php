<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class ApiController extends Controller
{
    public function obeterTags()
    {
        $tags = Tag::all();

        return response()->json($tags);
    }
}
