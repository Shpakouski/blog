<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function __construct()
{
    $this->middleware('auth')->except('index','show');
}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        /*
         * Just for fun search, not seriously
         * */

        if($request->search){
            $posts = Post::where('title','like', '%'.$request->search.'%')
                ->orWhere('description','like', '%'.$request->search.'%')
                ->orderBy('created_at', 'DESC')
                ->get();

            return view('posts.index',compact(['posts','request']));
        }



        $posts = Post::orderBy('created_at', 'DESC')->paginate(4);


        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->author_id = Auth::user()->id;
        $post->short_title = Str::length($request->title) > 30 ? Str::substr($request->title, 0, 30) . '...' : $request->title;
        $post->description = $request->description;

        if($request->file('img')){
            $path=Storage::putFile('public',$request->file('img'));
            $url = Storage::url($path);
            $post->img=$url;
        }
        $post->save();
        return redirect()->route('posts.index')->with('success','Пост успешно создан!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if(!$post){
            return redirect()->route('posts.index')->withErrors('Такой страницы не найдено!');
        }
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if(!$post){
            return redirect()->route('posts.index')->withErrors('Такой страницы не найдено!');
        }
        if($post->author->id !== Auth::user()->id){
            return redirect()->route('posts.index')->withErrors('Вы не можете редактировать данный пост');
        }
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);
        if(!$post){
            return redirect()->route('posts.index')->withErrors('Такой страницы не найдено!');
        }
        if($post->author->id !== Auth::user()->id){
            return redirect()->route('posts.index')->withErrors('Вы не можете редактировать данный пост');
        }
        $post->title=$request->title;
        $post->short_title = Str::length($request->title) > 30 ? Str::substr($request->title, 0, 30) . '...' : $request->title;
        $post->description=$request->description;

        if($request->file('img')){
            $path=Storage::putFile('public',$request->file('img'));
            $url = Storage::url($path);
            $post->img=$url;
        }
        $post->update();
        return redirect()->route('posts.show',['post'=>$post->id])->with('success','Пост успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if(!$post){
            return redirect()->route('posts.index')->withErrors('Такой страницы не найдено!');
        }
        if($post->author->id !== Auth::user()->id){
            return redirect()->route('posts.index')->withErrors('Вы не можете удалить данный пост');
        }
        $post->delete();
        return redirect()->route('posts.index')->with('success','Пост успешно удален!');
    }
}
