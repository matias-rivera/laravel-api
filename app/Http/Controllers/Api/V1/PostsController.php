<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Resources\PostResource;
use App\Http\Resources\PostsCollection;

use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      
        return new PostsCollection(Post::with(['author','comments'])->paginate(2));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //
        PostResource::withoutWrapping();
        $post = Post::create($request->all());

        return (new PostResource($post))->response()->setStatusCode(200);
/*         return response()->json(['data' => $post],201);
 */    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        PostResource::withoutWrapping();
        return new PostResource($post);
        /* return response()->json(['data'=>$post],200); */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $post->update($request->all());

        return response()->json(['data'=>$post],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
            return response(null,204);
    }
}
