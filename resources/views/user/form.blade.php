@extends('layouts.app')
@section('title', 'Page Title')
@section('sidebar')
    @parent

    <br>This is appended to the master sidebar.
@endsection

@section('content')
		
		@if(empty($user->username))
		<form method="POST" action="/user/store">
		@else
		<form method="POST" action="/user/update/{{$user->uid}}">	
		@endif	
			@csrf
			<div class="form-group">
            <label for="username" class="col-sm-4 control-label">名稱</label>
            <div class="col-sm-5">
                <input type="text" id="username" name="username" class="form-control" value="{{$user->username}}" >
            </div>
			</div>
			<div class="form-group">
            <label for="password_n" class="col-sm-4 control-label">新密碼
			@if ($user->username!="")
				(不修改請留空)
			@endif
			</label>
            <div class="col-sm-5">
                <input type="password" id="password" name="password" class="form-control">
            </div>
			</div>
			<div class="form-group">
            <div class="col-sm-offset-2 col-sm-5">
                <button type="submit" class="btn btn-primary">儲存設定</button>
            </div>
        </div>
		</form>
		
@endsection