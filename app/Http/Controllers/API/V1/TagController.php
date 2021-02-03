<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{ public function index(){
    return Tag::all();
}
    public function show( Tag $tag){
        return $tag;
    }
    public function store( Request $request){
        $tag= Tag::create($request->all());
        return $tag;
    }
    public function update( Request $request, Tag $tag){
        $tag->update($request->all());
        return  $tag;
    }
}
