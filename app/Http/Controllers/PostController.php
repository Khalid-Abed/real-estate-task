<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
// use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
                        $btn = '<a href="javascript:void(0)" data-id="'.$data->id.'" id="edit-record" class="editbtn btn btn-warning btn-sm">edit</a>';
                        $btn .= '<a href="javascript:void(0)" data-id="'.$data->id.'" id="delete-record" class="deletebtn  btn btn-danger btn-sm mx-1">Delete</a>';
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required|max:2048',
            'contact_number' => 'required|unique:posts,contact_number',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'image' => 'mimes:png,jpg,jpeg|max:1024',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $post = new Post;

            // $name=time().$request->file('image')->getClientOriginalName();
            $name=time().$request->file('image')->extension();
            $request->file('image')->move(public_path('images/posts'),$name);
            $post->image=$name;

            $post->title = $request->input('title');
            $post->contact_number = $request->input('contact_number');
            $post->description = $request->input('description');
            $post->save();
            return response()->json([
                'status'=>200,
                'message'=>'Post Added Successfully.'
            ]);
        }

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
        // return view('posts.edit',compact('post'));
        if($post)
        {
            return response()->json([
                'status'=>200,
                'post'=> $post,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Post Found.'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required|max:2048',
            'contact_number' => 'required|unique:posts,contact_number,'.$post->id,
            'image' => 'mimes:png,jpg,jpeg|max:1024',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            if($post)
            {
                $post->title = $request->input('title');
                $post->contact_number = $request->input('contact_number');
                $post->description = $request->input('description');
                $post->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Post Updated Successfully.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No Post Found.'
                ]);
            }

        }
        // resize image intervension
        // if($request->hasFile('image'))
        // {
        //     $path = public_path('images/posts/'.$post->image);
        //     if(is_file($path)){
        //         unlink('images/posts/'.$post->image);
        //     }

        //     $name=time().$request->image->getClientOriginalName();
        //     $request->image->move(public_path('images/posts'),$name);
        //     $post->update([
        //         'image'=>$name
        //     ]);
        // }
        // $post->update([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'contact_number' => $request->contact_number,
        // ]);
        // return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if($post)
        {
            $post->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Post Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Post Found.'
            ]);
        }
    }
}
