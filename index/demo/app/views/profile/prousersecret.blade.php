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

					<div style="color:blue !important;" >
					<?php
						if(isset($_SESSION['alert_update_info'])){ 
							echo $_SESSION['alert_update_info']; 
							unset($_SESSION['alert_update_info']);
						}
					?>

					</div>
				<div class="set_warp" style="width:715px; margin:0 auto; padding:20px 0 100px;">
				 


					<form method="POST" action="<?php echo asset('profile/updatepass');?>" >
				<input type="hidden" name="FORMHASH" value="2991f90d81087914">
						<table width="100%" border="0">
						  <tbody><tr>
						<td width="110" align="right" valign="top">Mật khẩu hiện tại:</td>
						<td><input name="password_old" datatype="LimitB" min="3" msg="Sửa đổi cần nhập mật khẩu hiện tại" type="password" class="p1">
						(Yêu cầu)</td>
						  </tr>
						  <tr>
							<td align="right" valign="top">Mật khẩu mới:</td>
							<td><input name="password_new1" require="false" datatype="LimitB" min="5" msg="Mật khẩu mới là quá ngắn, xin vui lòng Thiết lập 5 ký tự" type="password" class="p1">
							(Nếu bạn không sửa đổi, xin vui lòng để trống)</td>
						  </tr>
						
							<td align="right" valign="middle">&nbsp;</td>
							<td>(Sửa đổi các  thông tin trên để đăng nhập)<br><input type="submit" class="save" name="changepass" value="Lưu"></td>
						  </tr>
						</tbody></table>
					</form>
					



				 </div>
				</div>
				</div>
					</div>
				</div>
@stop
