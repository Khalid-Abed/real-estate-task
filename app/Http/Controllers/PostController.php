<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
// use DataTables;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Post::select('*');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        $btn = '<a href="javascript:void(0)" data-id="'.$data->id.'" id="edit-record" class="edit btn btn-warning btn-sm">edit</a>';
                        $btn .= '<a href="javascript:void(0)" data-id="'.$data->id.'" id="delete-record" class="delete btn btn-danger btn-sm mx-1">Delete</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('posts.index');
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
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        // resize image intervension
        $imageName='';
        if($request->hasFile('image'))
        {
            $name=time().$request->image->getClientOriginalName();
            $request->image->move(public_path('images/posts'),$name);
            $imageName=$name;
        }
        Post::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'contact_number' => $request->contact_number,
            'image' => $imageName,
        ]);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        // resize image intervension
        if($request->hasFile('image'))
        {
            $path = public_path('images/posts/'.$post->image);
            if(is_file($path)){
                unlink('images/posts/'.$post->image);
            }

            $name=time().$request->image->getClientOriginalName();
            $request->image->move(public_path('images/posts'),$name);
            $post->update([
                'image'=>$name
            ]);
        }
        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'contact_number' => $request->contact_number,
        ]);
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
