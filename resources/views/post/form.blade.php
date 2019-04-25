@extends('layouts.app')
@section('title', '表單作業')
@section('sidebar')
    @parent

    <br>This is appended to the master sidebar.
@endsection

@section('content')
		
		@if(empty($post->subject))
		<form method="POST" action="/post/store">
		@else
		<form method="POST" action="/post/update/{{$post->pid}}">	
		@endif	
			@csrf
			 <input type="hidden" id="uid" name="uid" class="form-control" value="{{$post->uid}}" >
			<div class="form-group">
            <label for="subject" class="col-sm-4 control-label">主旨</label>
            <div class="col-sm-5">
                <input type="text" id="subject" name="subject" class="form-control" value="{{$post->subject}}" >
            </div>
			</div>
			<div class="form-group">
            <label for="password_n" class="col-sm-4 control-label">內容
			</label>
            <div class="col-sm-5">
                <textarea type="text" id="content" name="content" class="form-control">{{$post->content}}</textarea>
            </div>
			</div>
			<div class="form-group">
            <div class="col-sm-offset-2 col-sm-5">
                <button type="submit" class="btn btn-primary">儲存設定</button>
            </div>
        </div>
		</form>
		
@endsection