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

@section('brithday')
{{$info_user['brithday']}}
@endsection
@section('address')
{{$info_user['address']}}
@endsection
@section('job')
{{$info_user['job']}}
@endsection

        @section('album')   
       <div class="middle">
                    
                    <div class="content"> 
						<?php
							 // 	echo"<pre>";
								// print_r($data);
								// echo"</pre>";
							if (isset($data['post'])) {
								foreach ($data['post'] as $value) {
						?>								
								<div class="lyteboximage"><a href="<?php echo $value->url_image; ?>" class="lytebox" data-lyte-options="group:vacation" data-title="<?php echo $value->title;?>"><img src="<?php echo $value->url_image; ?>"/></a><span class="clear_fix_both"></span></div>
						<?php								
								}
							}
						?>
                    </div> 
                </div>

@stop
