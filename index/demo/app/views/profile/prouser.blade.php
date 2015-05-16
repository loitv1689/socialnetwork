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
						$(function(){ 
						    $("#nickname_input").focus(function(){$(this).css("background","#CBFE9F");$(".R_tt1").show();}).blur(function(){$(this).css("background","#FFF");$(".R_tt1").hide();});
						}); 
						</script>

							<form method="POST" name="profile_base" action="<?php echo asset('profile/updateinfo');?>" onsubmit="return Validator.Validate(this,3);">
						<input type="hidden" name="FORMHASH" value="2991f90d81087914">
							<table width="100%" border="0">
							  <tbody>
							  <tr>
							    <td width="110" align="right" valign="top"> Tài khoản:</td>
							    <td><input value="<?php echo $data['user']->email; ?>" type="text" class="p1" readonly="" disabled="">
							
								</td>
							  </tr>
							    
							  <tr>
							    <td align="right" valign="top">Họ và tên:</td>
							    <td><input name="username" type="text" value="<?php echo $data['user']->user_name; ?>" class="p1" >
								</td>
							  </tr>

							    <td align="right" valign="top">Email :</td>
							    <td><input name="email" type="text" value="<?php echo $data['user']->email; ?>" class="p1" readonly="" disabled="">
							
								</td>
							  </tr>

							  <tr>
							    <td align="right" valign="top"><span class="fontRed">*</span> Địa  chỉ:</td>
							    <td><textarea name="address"><?php echo $data['user']->address; ?></textarea></td>
							</td>
							  </tr>
							  <tr><td align="right" valign="top"><span class="fontRed"></span> Giới tính:</td>
							    <td><input name="gender" id="gender_1" type="radio" value="1"  class="radio"><label  <?php if($data['user']->gender == 1) echo "checked"; ?>>Nam</label>
								<input name="gender" id="gender_2" type="radio" value="2"  class="radio"><label <?php if($data['user']->gender == 2) echo "checked"; ?>>Nữ</label>
								
								</td>
							  </tr>

							  <tr>
							    <td align="right" valign="top">Sở thích</td>
							    <td><textarea name="hobby"><?php echo $data['user']->hobby; ?></textarea><br>(Xem thông tin <a href="index.php?mod=mrloixz" target="_blank"> của bạn</a>)</td>
							  </tr>
							
							  	 
							  <tr>
							  <td colspan="2">

							 <div class="tagg2">Những thông tin sau đây sẽ được sử dụng  để đảm bảo tính xác thực 
							    
							    ,Xin vui lòng điền vào
							    
						</div>
							    </td>
							  </tr>
					
						
							  </tr>
							  <tr>
							    <td align="right" valign="top">Số điện thoại:</td>
							    <td>
							    
						    <input type="text" name="phonenumber" value="<?php echo $data['user']->telephone_number; ?>" class="p1">(Lưu)
							    
						    </td>
							  </tr>
							    <tr>
							    <td align="right" valign="top">Nghề nghiệp</td>
							    <td>
							    
							    <input type="text" name="job" value="<?php echo $data['user']->job; ?>" class="p1">
								    
							    </td>
								  </tr>
								  <tr>
								    <td align="right" valign="top">&nbsp;</td>
								    <td><input type="submit" class="save" value="Lưu"></td>
								  </tr>
								</tbody></table>
							</form>

						<a id="modify_email_area"></a>
						<br>
						<form method="POST" action="<?php echo asset('profile/updateemail');?>" onsubmit="return Validator.Validate(this,3);">
						<input type="hidden" name="FORMHASH" value="2991f90d81087914">
								<table width="100%" border="0">
						        <tbody><tr>
						    	  <td colspan="2">
						    	   <div class="tagg2"><b style="font-size:14px">Sửa đổi hộp thư email</b></div>
						    	  </td>
						    	</tr>

								  <tr>
									<td align="right" valign="top">Email:</td>
									<td><input name="email_new" datatype="Email" msg="Email chuẩn" type="text" value="<?php echo $data['user']->email; ?>" class="p1"></td>
								  </tr>
								  <tr>
									<td align="right" valign="middle">&nbsp;</td>
									<td>(Hộp thư cần chính xác để có thể dùng đăng nhập)<br><br><input type="submit" class="save" value="Lưu"></td>
								  </tr>
								</tbody></table>
							</form>
						    
						</div>
						</div>
						</div>

                    </div> 
                </div>

@stop
