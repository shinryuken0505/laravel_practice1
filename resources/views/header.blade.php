
<div id=header>
	<h1>@yield('title')</h1>
	<ul class="nav nav-tabs">
	  @if(request()->session()->has('username'))
	  <li class="nav-item">
		<a class="nav-link active" href="#">{{request()->session()->get('username')}}~歡迎登入</a>
	  </li>
	  
	  <li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="post/index" role="button" aria-haspopup="true" aria-expanded="false">文章</a>
		<div class="dropdown-menu">
		  <a class="dropdown-item" href="/post/index">文章列表</a>
		  <a class="dropdown-item" href="/post/add">新增文章</a>
		  
		</div>
	  </li>
	  @endif
	  
	 @if(request()->session()->has('username'))
		
		<li class="nav-item"><a class="nav-link" href='/user/logout'>登出</a></li>
	 @else
		<li class="nav-item"><a class="nav-link" href='{{route("login")}}'>登入</a></li>
		<li class="nav-item"><a class="nav-link" href='/user/add'>註冊</a></li>
	 @endif
	  
	</ul>
</div>
@include('alert')
