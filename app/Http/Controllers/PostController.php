<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = DB::table('post')->get();
		$posts = Post::all();
        return view('post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $empty_post=(object)[
			'subject'=>'',
			'content'=>'',
			'uid'=>$request->session()->get('uid'),
		];

		return view('post.form', ['post' => $empty_post]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
		/*
		$id = DB::table('post')->insertGetId(
		[
		'subject' => $request->input('subject'),
		'content' => $request->input('content'),
		'uid' => $request->input('uid'),
		]
		);*/
		$post = new Post;
		$post->subject = request('subject');
		$post->content = request('content');
		$post->uid = request('uid');
		$post->save();
		
       return redirect('post/add')->with('message', 'Add Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = DB::table('post')->where('id', '=',$id)->first();
		return view('post.view', ['post' =>$posts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         //$post = DB::table('post')->where('id', '=',$id)->first();
		 $post = Post::findOrFail($id);
		 return view('post.form', ['post' => $post]);
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
		/*
		$data=array();
		if($request->input('subject')!="")	
		{
			$data['subject']=$request->input('subject');
		}
		
		if($request->input('content')!="")	
		{
			$data['content']=$request->input('content');
		}
		
		$data['uid']=$request->input('uid');
		$id = DB::table('post')->where('id',$id)
            ->update($data);
		*/
		
		$post = Post::findOrFail($id);
		if($request->input('subject')!="")	
		{
			$post->subject = request('subject');
		}
		
		if($request->input('content')!="")	
		{
			//$data['content']=$request->input('content');
			$post->content = request('content');
		}
		$post->save();			
       return redirect('post/index')->with('message', 'Edit Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		 //DB::table('post')->where('id',$id)->delete();
		 $post = Post::where('id',$id)->first();
		 $post->delete();
         return redirect('post/index')->with('message', 'Delete Success!');
    }
	
	
}
