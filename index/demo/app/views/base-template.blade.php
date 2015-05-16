@extends('core-template')

@section('title')
Mạng Xã hội
@stop

@section('name-social-network')
BKSocialNetWork
@stop
@section('link-create-group')
http://mangxahoi.com/creategroup
@stop

@section('link-logout')
{{URL::asset('/logout')}}
@stop

@section('numR')
@if(sizeof($friend_requests))
    <p style="color:red">{{sizeof($friend_requests)}}</p>
@endif
@stop
@section('numM')
@if(sizeof($new_messages))
    <p style="color:red">{{sizeof($new_messages)}}</p>
@endif
@stop
@section('numN')
@if(sizeof($notifications))
    <p style="color:red">{{sizeof($notifications)}}</p>
@endif
@stop
@section('profile-picture')
@if(isset($data['flag']) )
{{muser::getGetUrlAvatar($data['id_friends'])}}
@elseif(isset($_GET['id_friends']))
{{muser::getGetUrlAvatar($_GET['id_friends'])}}
@else
{{muser::getGetUrlAvatar(Session::get('user_id'))}}
@endif
@endsection
@section('profile_link')
    
    @if(isset($data['flag']))
        <a class="list-group-item" href="{{asset('profile/friend')}}?id_friends={{$data['id_friends']}}"><span class="glyphicon glyphicon-user"></span>&nbsp; Profile</a>  
    @else
        <a class="list-group-item" href="{{asset('profile/prouser')}}"><span class="glyphicon glyphicon-user"></span>&nbsp; Profile</a>
    @endif
@endsection
@section('album_link')
    @if(isset($data['flag']))
        <a class="list-group-item" href="{{asset('album/friend')}}?id_friends={{$data['id_friends']}}"><i class="fa fa-photo"></i>&nbsp; Album</a>
    @elseif(isset($_GET['id_friends']))
                <a class="list-group-item" href="{{asset('album/friend')}}?id_friends={{$_GET['id_friends']}}"><i class="fa fa-photo"></i>&nbsp; Album</a>
    @else
        <a class="list-group-item" href="{{asset('album/user')}}"><i class="fa fa-photo"></i>&nbsp; Album</a>
    @endif

@endsection
@section('friend-requests')
<!-- danh sách này sẽ được cho vào vòng lặp kết hợp với thằng DB:: để lấy dữ liệu ra-->
@foreach ($friend_requests as $value)

<li>
    <strong><a href="{{URL::asset("users/".$value['user_id'])}}">{{$value['user_name']}}</a></strong>
    <div class="pull-right">
    <form method="post" action={{Asset("confirm/".$value['user_id'])}} style="float: left">
        <button class="btn btn-primary btn-sm" type="submit">Confirm</button>
    </form>
    <form method="post" action={{Asset("delete/".$value['user_id'])}} style="float: left; margin-left:5px">
        <button class="btn btn-default btn-sm" type="submit">Delete Request</button>
    </form>
    </div>
</li>
<li class="divider"></li>
@endforeach
@stop

@section('messages')
@foreach ($new_messages as $value)

<li><a href="{{URL::asset("messages/".$value['user_id'])}}">
    <div>
        <strong>{{$value['user_name']}}</strong>
        <span class="pull-right text-muted"><em>{{$value['time']}}</em></span>
    </div>
    <!--   <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div> -->
</a></li>
<li class="divider"></li>
@endforeach
@stop

@section('notifications')
@foreach($notifications as $value)
<li><a href="{{URL::asset("notifications/".$value['link'])}}">
    <p><b>{{$value['user_name_1']}}</b> đã đăng trong <b>CNTT & TT - K57 - ĐHBKHN</b></p>
    <p><i class="fa fa-clock-o"></i> {{$value['time']}}</p>
</a></li>
<li class="divider"></li>
@endforeach
@stop

@section('friends-online')
@foreach ($friends_online as $value)

<a class="list-group-item" href="{{URL::asset("messages/".$value['user_id'])}}">
<img src="{{$value['profile_picture']}}" alt="logo" class="img-rounded img-responsive" style="width: 30px; height: 30px; float:left; margin:-5px 5px 0 -8px ">
&nbsp; {{$value['user_name']}}</a>
@endforeach
@stop