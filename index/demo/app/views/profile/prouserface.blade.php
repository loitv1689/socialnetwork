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


        @section('profile')

        <div class="middle">
             <div class="content"> 
			<div class="main ">


		<div class="t_col_main_si ">
		<div class="t_col_main_fl">
			<div id="topic_index_left_ajax_list">
		</div>
		</div>
		</div>



		<div class="main_2b">
			<div class="main_t"><span>Thiết lập tài khoản</span></div>

			
			<div class="Menubox2">
			<ul>
						<li><div class="<?php if(isset($data['info'])) echo 'tago'; else echo 'tagn';?>"><a href="<?php echo asset('profile/prouser'); ?>"><span>Hồ sơ của tôi</span></a></div></li>
							 
						 
							 
						<li><div class="<?php if(isset($data['face'])) echo 'tago'; else echo 'tagn';?>"><a href="<?php echo asset('profile/prouserface'); ?>"><span>Ảnh đại diện</span></a></div></li>
							 
						 
							 
						<li><div class="<?php if(isset($data['secret3'])) echo 'tago'; else echo 'tagn';?>"><a href="<?php echo asset('profile/prousersecret'); ?>"><span>Đổi mật khẩu</span></a></div></li>
		</ul>
			</div>
			<div >	<?php
						if(isset($_SESSION['alert_update_info'])){ 
							echo $_SESSION['alert_update_info']; 
							unset($_SESSION['alert_update_info']);
						}
					?></div>

		<div class="set_warp" style="width:715px; margin:0 auto; padding:20px 0 100px;">
		  
		 	<script type="text/javascript">
				function updateavatar() {
					window.location.reload();
				}
			</script>
			<div style="padding:10px 0;">
				<span class="fontRed"> Ảnh đại diện này sẽ hiện trên kênh chính, trang của bạn...</span><br>
			</div>
			<img id="image_avatar_user" src="<?php if(isset( $data['url_avatar'])) echo $data['url_avatar'];?>" onerror="javascript:faceError(this);">
			<h2>Thiết lập ảnh đại diện</h2>
			<p>Tải ảnh lên và chĩnh sửa để có ảnh đại diện ưng ý nhất</p>
			<form method="POST" action="<?php echo asset('profile/updateface');?> " enctype="multipart/form-data">
			 <div style="float:left;" id="upload_avater_image" style="font-weight:bold;color:blue;"><i class="glyphicon glyphicon-upload"><input type="file" style="display:none" id="upload_avatar_image_input" name="avatar_user"></i>Add photo</div>
			 <input type="submit" name="uploadimageclick" value="Lưu" class="save">
			 </form>
		</div>
		</div>
		</div>
		
                    </div> 
                </div>


@stop
