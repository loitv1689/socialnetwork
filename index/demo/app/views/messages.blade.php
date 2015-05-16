@extends('base-template')
<?php
$notifications = array( array('link'=>'12345', 'user_name_1'=>'Đặng Văn Đại', 'atc'=>'đã đăng vào nhóm', 'user_name_2'=>'CNTT&TT k57', 'time'=>'một giờ trước'),
    array('link'=>'12345', 'user_name_1'=>'Dương Văn Lực', 'atc'=>'đã like hình ảnh', 'user_name_2'=>'Đặng Văn Đại', 'time'=>'một giờ trước'),
    array('link'=>'12345', 'user_name_1'=>'Phùng thế Hoàng', 'atc'=>'đã đăng vào nhóm', 'user_name_2'=>'CNTT&TT k57', 'time'=>'một giờ trước'),
    array('link'=>'12345', 'user_name_1'=>'Trần Đức Sang', 'atc'=>'đã đăng vào nhóm', 'user_name_2'=>'CNTT&TT k57', 'time'=>'một giờ trước'));

    ?>
    @section('user-name')
    {{$info_user['user_name']}}
    @stop
    @section('profile-picture')
    {{$info_user['profile_picture']}}
    @endsection
    @section('brithday')
    {{$info_user['brithday']}}
    @endsection
    @section('address')
    {{$info_user['address']}}
    @endsection
    @section('job')
    {{$info_user['job']}}
    @endsection

    @section('messages-personal')

    <div class="panel panel-default">
        <div class="panel-heading">
            <b class="panel-title">
               <img src="{{User::select('profile_picture')->where('user_id', '=',$user_id)->get()[0]->profile_picture}}" alt="logo" class="img-rounded img-responsive" style="width: 30px; height: 30px; float:left; margin:-5px 5px 0 -8px ">
               <a href="{{$user_id}}">{{$user_name}}</a></b>
               <span class="pull-right"><a href="#">Xem thêm tin nhắn</a></span>
           </div>
           <div class="panel-body">
            <ul class="list-group">
                @for($i =0; $i < sizeof($messages) ; $i++)
                <li class="list-group-item">
                    <img src="{{User::select('profile_picture')->where('user_id', '=',$messages[$i]['user_id'])->get()[0]->profile_picture}}" alt="logo" class="img-rounded img-responsive" style="width: 30px; height: 30px; float:left; margin:-5px 5px 0 -8px ">
                    <a href="{{URL::asset("users/".$messages[$i]['user_id'])}}"><b>{{$messages[$i]['user_name']}}</b></a><br/>
                    @foreach ($messages[$i]['content'] as $value)
                    {{$value}}<br/>
                    @endforeach
                </li>
                <br/>
                @endfor

            </ul>
        </div>
        <div class="panel-footer">
            <form method="post" action={{Asset('sent_message')}}>
                <div class="input-group">
                    <input type="text" name = "user_id" class="sr-only" value = "{{$user_id }}">
                    <input type="text" name = "message" class="form-control input-sm" placeholder="Type your message here...">
                    <span class="input-group-btn">
                        <button class="btn btn-default btn-sm" id="btn-send">Send</button>
                    </span>
                </div>
            </form>
        </div>
    </div>

    @stop