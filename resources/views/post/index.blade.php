@extends('layouts.app')
@section('title', '帳號清單')


@section('content')
		<table class="table">
		<tr>
			<th>帳號</th>
			<th colspan=3>操作</th>  
		</tr>	
		
		@foreach ($posts as $post)
		<tr>
			<td>{{ $post->subject }}</td>
			<td> <button type="button" onclick="location.href='/post/{{$post->pid}}';" class="btn btn-primary">查看</button></td>  
			<td> <button type="button" onclick="location.href='/post/edit/{{$post->pid}}';" class="btn btn-warning">修改</button></td>  
			<td> <button type="button" onclick="location.href='/post/delete/{{$post->pid}}';" class="btn btn-danger">刪除</button></td>  
		</tr>	
		@endforeach
		
		</table>
@endsection