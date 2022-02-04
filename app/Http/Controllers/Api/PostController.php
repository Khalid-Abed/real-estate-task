<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Image;
class PostController extends Controller
{
    public function index()
    {
        $posts=Post::latest()->paginate(5);
        if(is_null($posts)){
            return $this->sendError('There is No Post');
        }
        $data['posts']=$posts;
        return $this->sendResponse($data,'All Posts');
    }

    public function show($id)
    {
        $post=Post::find($id);
        if(is_null($post)){
            return $this->sendError('This post is not found !');
        };
        $data['post']=$post;
        $data['user']=$post->user;
        return $this->sendResponse($data,'Post data');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required|max:2048',
            'contact_number' => 'required||unique:posts,contact_number',
            'image' => 'mimes:png,jpg,jpeg|max:1024',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $post = new Post;
        if ($request->hasFile('image')){
            $name=time().$request->file('image')->getClientOriginalName();
            Image::make($request->file('image'))->resize(800,300)->save(public_path('images/posts/'.$name));
            $post->image=$name;
        }

        $post->user_id=auth()->user()->id;
        $post->title=$request->title;
        $post->description=$request->description;
        $post->contact_number=$request->contact_number;
        $post->save();

        return $this->sendResponse($post,'Post Created Successfully');
    }

    public function update(Request $request,$id)
    {
        $post=Post::find($id);
        if(!$post)
        {
            return $this->sendError('Not found.', 'Post Not found');
        }
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required|max:2048',
            'contact_number' => 'required||unique:posts,contact_number,'.$post->id,
            'image' => 'mimes:png,jpg,jpeg|max:1024',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        if ($request->hasFile('image')){
            $path=public_path('images/posts/'.$post->image);
            if($path)
            {
                @unlink($path);
            }
            $name=time().$request->file('image')->getClientOriginalName();
            Image::make($request->file('image'))->resize(800,300)->save(public_path('images/posts/'.$name));
            $post->image=$name;
        }
        $post->title=$request->title;
        $post->description=$request->description;
        $post->contact_number=$request->contact_number;
        $post->save();
        return $this->sendResponse($post,'Post Updataed Successfully');
    }

    public function destroy(Request $request,$id)
    {
        $post=Post::find($id);
        if(!$post)
        {
            return $this->sendError('Not Found','Post is Not Founded');
        }
        $post->delete();
        return $this->sendResponse($post,'Post is Deleted Successfuly');
    }

}
