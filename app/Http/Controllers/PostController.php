<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$posts = PostModel::all();
        //$posts = PostModel::orderBy('id', 1);
        $posts = PostModel::select('*')->orderBy('id', 'desc')->get();
        return view('post.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        //handle the file upload 
        if ($request->hasFile('cover_image')) 
        {
            $fileNameWithEXT = $request->file('cover_image')->getClientOriginalName();

            $fileName = pathinfo($fileNameWithEXT, PATHINFO_FILENAME);

            $extension = $request->file('cover_image')->getClientOriginalExtension();

            $fileNameToStore = $fileName .'_'.time().'.'.$extension;

            $path = $request->file('cover_image')->storeAs('public/cover_image', $fileNameToStore);

        }
        else
        {
            $fileNameToStore = 'noimage.jpg';
        }

        //PostModel::create($request->all());

        //atau

        $post = new PostModel;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = Auth::id();
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect()->route('posts.index')->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = PostModel::find($id);
        return view('post.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = PostModel::find($id);
        if(Auth::id() !== $post->user_id)
        {
            return redirect()->route('posts.index')->with('error','You Cant edit other article.');
        }
        return view('post.edit')->with('post', $post);
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
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        //handle the file upload 
        if ($request->hasFile('cover_image')) 
        {
            $fileNameWithEXT = $request->file('cover_image')->getClientOriginalName();

            $fileName = pathinfo($fileNameWithEXT, PATHINFO_FILENAME);

            $extension = $request->file('cover_image')->getClientOriginalExtension();

            $fileNameToStore = $fileName .'_'.time().'.'.$extension;

            $path = $request->file('cover_image')->storeAs('public/cover_image', $fileNameToStore);

        }

        //$PostModel->update($request->all());

        $post = PostModel::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image'))
        {
            $post->cover_image = $fileNameToStore;
        }
        $post->save();

        return redirect()->route('posts.index')->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$PostModel->delete();
        $post = PostModel::find($id);
        if(Auth::id() !== $post->user_id)
        {
            return redirect()->route('posts.index')->with('error','You Cant Delete other article.');
        }

        if($post->cover_image != 'noimage.jpg')
        {
            Storage::delete('public/cover_image/'.$post->cover_image);
        }
        $post->delete();

        return redirect()->route('posts.index')->with('success','Post Delete successfully');
    }
}
