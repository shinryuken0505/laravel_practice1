@extends('layouts.app')
@section('title', '登入')
@section('sidebar')
    @parent

    <br>This is appended to the master sidebar.
@endsection

@section('content')
		
		<form method="POST" action="/user/login">	
			@csrf
			<div class="form-group">
            <label for="username" class="col-sm-4 control-label">名稱</label>
            <div class="col-sm-5">
                <input type="text" id="username" name="username" class="form-control" value="" >
            </div>
			</div>
			<div class="form-group">
            <label for="password_n" class="col-sm-4 control-label">密碼
					</label>
            <div class="col-sm-5">
                <input type="password" id="password" name="password" class="form-control">
            </div>
			</div>
			<div class="form-group">
            <div class="col-sm-offset-2 col-sm-5">
                <button type="submit" class="btn btn-primary">登入</button>
            </div>
        </div>
		</form>
		
@endsection