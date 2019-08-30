<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\user\post;
use App\Model\user\category_post;
use Image;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
use Illuminate\Support\Str;

class PostUserController extends Controller
{
    public function index()
    {
        $post = post::all();
        $category_post = category_post::all();
        return response()->json($post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    public function store(Request $request)
    {
        $user = JWTAuth::toUser($request->token);
        
        // if ($request->hasFile('image')) {
        //     $imageName = $request->image->store('public');
        //     $image = $request->file('image');
        //     $imageName = time() . '.' . $image->getClientOriginalExtension();
        //     $location = public_path('post_image/' . $imageName);
        //     Image::make($image)->resize(900, 300)->save($location);
        // } else {
        //     return 'No';
        // }
        // $post = new post;
        // $post->image = $imageName;
        // $posts->title = $request->title;
        // $posts->subtitle = $request->subtitle;
        // $posts->body = $request->body;
        
        $posts = $request->all();
        $posts['slug'] = Str::slug($posts['title']);
        $posts["posted_by"] = $user->id;
        return Post::create($posts);
        // return response()->json($posts);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = posts::find($id);
        return response()->json($posts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $posts = post::find($id);
        $posts->title = $request->get('title');
        $posts->slug = $request->get('slug');
        $posts->body = $request->get('body');
        $posts->image = $request->get('image');
        $posts->categories()->sync($request->categories);
        $posts->save();

        return response()->json('Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $posts = post::find($id);
      $posts->delete();

      return response()->json('Successfully Deleted');
    }
}