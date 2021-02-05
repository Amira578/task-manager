<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagNewRequest;
use App\Http\Requests\TagUpdateRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Http\Resources\TagListResource;
use App\Http\Resources\TagShowResource;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{ public function index()
{
    return TagListResource::collection( Tag::all());
}
    public function show( Tag $tag)
    {
        return (new TagShowResource($tag));
    }
    public function store( TagNewRequest $request)
    {
        $tag= Tag::create($request->all());
        return $tag;
    }
    public function update(TagUpdateRequest $request, Tag $tag)
    {
        $tag->update($request->all());
        return  $tag;
    }
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return "tag deleted";
    }
}
