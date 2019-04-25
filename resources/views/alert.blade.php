@if(isset($alertmsg))
<div class="alert alert-danger">
    <div class="alert-title">{{$alertmsg}}</div>
</div>
@endif

@if(session('alertmsg'))
<div class="alert alert-danger">
    <div class="alert-title">{{session('alertmsg')}}</div>
</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if(session('message'))
<div class="alert alert-info">
    <div class="alert-title">{{session('message')}}</div>
</div>
@endif
