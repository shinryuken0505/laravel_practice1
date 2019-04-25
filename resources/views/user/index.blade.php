@extends('layouts.app')
@section('title', '帳號清單')


@section('content')
		<table class="table">
		<tr>
			<th>帳號</th>
			<th colspan=3>操作</th>  
		</tr>	
		
		@foreach ($users as $user)
		<tr>
			<td>{{ $user->username }}</td>
			<td> <button type="button" onclick="location.href='/user/{{$user->uid}}';" class="btn btn-primary">查看</button></td>  
			<td> <button type="button" onclick="location.href='/user/edit/{{$user->uid}}';" class="btn btn-warning">修改</button></td>  
			<td> <button type="button" onclick="location.href='/user/delete/{{$user->uid}}';" class="btn btn-danger">刪除</button></td>  
		</tr>	
		@endforeach
		
		</table>
@endsection