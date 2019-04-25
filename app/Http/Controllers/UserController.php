<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('user')->get();
        return view('user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empty_user=(object)[
			'uid'=>'',
			'username'=>'',
			'password'=>''
		];

		return view('user.form', ['user' => $empty_user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
		
		$id = DB::table('user')->insertGetId(
		[
		'username' => $request->input('username'),
		'password' => $request->input('password')
		]
		);
		
       return redirect('user/login')->with('message', 'Add Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = DB::table('user')->where('uid', '=',$id)->first();
		return view('user.view', ['user' =>$users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $user = DB::table('user')->where('uid', '=',$id)->first();
		 return view('user.form', ['user' => $user]);
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
		 $customMessages = [
			'required' => 'The :attribute field is required.= ='
		];
		 $validatedData = $request->validate($request,[
			'username' => 'bail|required|max:3',
			'password' => 'required',
		],$customMessages);
		/*
		 $validatedData = $request->validate([
			'username' => 'bail|required|max:3',
			'password' => 'required',
		]);
		*/
		
		$data=array();
		if($request->input('username')!="")	
		{
			$data['username']=$request->input('username');
		}
		
		if($request->input('password')!="")	
		{
			$data['password']=$request->input('password');
		}
		$id = DB::table('user')->where('uid',$id)
            ->update($data);		
       return redirect('user/index')->with('message', 'Edit Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	
	/**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function login_form()
    {

		return view('user.login');
    }
	
	/**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
		$user_check = DB::table('user')
		->where('username', '=',$request->input('username'))
		->where('password', '=',$request->input('password'))
		->first();
		if(!isset($user_check))
		{
			return view('user.login');
		}
		else if(isset($user_check->uid)&&isset($user_check->username))
		{
			$request->session()->put('uid', $user_check->uid);
			$request->session()->put('username', $user_check->username);
			//return  redirect()->route('index');
			return redirect('user');
		}
		/*
		else
		{
			return view('user.login',['alertmsg'=>'登入失敗']);
		}
		*/
    }
	
	/**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
		$request->session()->forget('uid');
		$request->session()->forget('username');
		return redirect('user');
    }
}
