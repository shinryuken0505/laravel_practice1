@extends('layouts.app')
@section('title', 'Page Title')
@section('sidebar')
    @parent

    <br>This is appended to the master sidebar.
@endsection

@section('content')
		
		
			<div class="form-group">
            <label for="subject" class="col-sm-4 control-label">主旨</label>
            <div class="col-sm-5">
              {{$post->subject}}
            </div>
			</div>
			
			<div class="form-group">
            <label for="subject" class="col-sm-4 control-label">內容</label>
            <div class="col-sm-5">
              {{$post->content}}
            </div>
			</div>
			
			<div class="form-group">
            <div class="col-sm-offset-2 col-sm-5">
                <button type="button" onclick="location.href='{{url()->previous()}}';" class="btn btn-primary">回上一頁</button>
            </div>
			</div>
	
		
@endsection