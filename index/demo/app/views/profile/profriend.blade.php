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
							<div class="main_t"><span>Thông tin tài khoản</span></div>
						<div class="set_warp" style="width:715px; margin:0 auto; padding:20px 0 100px;">
						  
						<script type="text/javascript"> 
						$(function(){ 
						    $("#nickname_input").focus(function(){$(this).css("background","#CBFE9F");$(".R_tt1").show();}).blur(function(){$(this).css("background","#FFF");$(".R_tt1").hide();});
						}); 
						</script>

							
						<input type="hidden" name="FORMHASH" value="2991f90d81087914">
							<table width="100%" border="0">
							  <tbody>
							  <tr>
							    <td width="110" align="right" valign="top"> Tài khoản:</td>
							    <td><input value="<?php echo $data['user']->email; ?>" type="text" class="p1" readonly="" disabled="">
				
								</td>
							  </tr>
							    
							  <tr>
							    <td align="right" valign="top">Tên đệm :</td>
							    <td><input name="firstname" type="text" value="<?php echo $data['user']->user_name; ?>" class="p1" >
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
							    <td><input name="gender" id="gender_1" type="radio" value="1" <?php if($data['user']->gender == 1) echo "checked"; ?> class="radio"><label for="gender_1">Nam</label>
								<input name="gender" id="gender_2" type="radio" value="2" <?php if($data['user']->gender == 2) echo "checked"; ?> class="radio"><label for="gender_2">Nữ</label>
								</td>
							  </tr>

							  <tr>
							    <td align="right" valign="top">Sở thích</td>
							    <td><textarea name="aboutme"><?php echo $data['user']->hobby; ?></textarea><br>(Xem thông tin <a href="#" target="_blank"> của bạn</a>)</td>
							  </tr>
							
							  	 
							  <tr>
							  <td colspan="2">

						
							    </td>
							  </tr>
					
						
							  </tr>
							  <tr>
							    <td align="right" valign="top">Số điện thoại:</td>
							    <td>
							    
						    <input type="text" name="phonenumber" value="<?php echo $data['user']->telephone_number; ?>" class="p1">
							    
						    </td>
							  </tr>
							    <tr>
							    <td align="right" valign="top">Nghề nghiệp</td>
							    <td>
							    
						    <input type="text" name="job" value="<?php echo $data['user']->job; ?>" class="p1">
							    
						    </td>
							  </tr>
							
							</tbody></table>
					
						</div>
						</div>
						</div>

                    </div> 
                </div>


@stop
