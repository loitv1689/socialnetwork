<?php
if (Session::get('user_id')) {
    $user_id = Session::get('user_id');
}else{
    echo "bạn chưa đăng nhập";
    die();
}
 
?>
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

        @section('search')
    <div class="middle">
                    <div class="content"> 
		<?php
		 	// echo "<pre>";
		 	// print_r($data);
		 	// echo "</pre>";
            //die();
		?>
		<?php
		if (isset($data['keysearchempty'])) {
			echo "<span style='color:blue;  font-size: 20px;display:block;width:826px;height:60px;background-color:#FFF9D7;line-height:40px;padding:10px;'>Vui lòng nhập một truy vấn vào hộp tìm kiếm.</span>";
		}
		else{
            
			if(count($data['listuser'])>0){
				foreach ($data['listuser'] as  $value) {
                    // print_r($value);
                    // echo "string";
		?>

                   <div class="contentListUser">
                        <div class="contentImage">
                            <a href="<?php echo asset('users/'.$value->user_id);?>"><img  src="<?php echo muser::getGetUrlAvatar($value->user_id);?>"></a>
                        </div>
                        <div class="contentIntroduce">
                            <a href="<?php echo asset('users/'.$value->user_id);?>"><span class="contentIntroduceName">  {{$value->user_name}} </span></a>
                            <span class="contentIntroduceJob"> Đang làm việc {{$value->job}} </span>
                            <span class="contentIntroduceAddress">Sống tại  {{$value->address}}</span>
                            
                        </div>
                    <?php   
                        $relationship = muser::checkUserRelation($user_id,$value->user_id);
                        $nameButton = "";
                        if ($relationship ==1) {
                            $nameButton = 'Đang chờ kết bạn';
                        }else if ($relationship == 2) {
                            $nameButton = "Hủy Kết Bạn";
                        }else if ($relationship == 0) {
                            $nameButton = 'Kết Bạn';
                        }
                        //$isFriend = muser::checkIsFriend($user_id,$value->user_id);
                        if( $relationship === NULL){
                    ?>
                        <form action="<?php echo asset('user/addfriend');?>" method="POST">
                            <input name="idFriend" value="<?php echo $value->user_id;?>" hidden>
                            <input class="FriendButton" name="addfriend" type="submit" value="Kết Bạn">
                        </form>
                    <?php    
                        }else {
                    ?>
                        <form action="<?php if($relationship == 1) echo 'javascript:void(0)';else echo asset('user/updatefriend');?>" method="POST">
                            <input name="idFriend" value="<?php echo $value->user_id;?>" hidden>
                            <input name="statusRelation" value="<?php echo $relationship;?>" hidden>
                            <input class="DFriendButton" name="addfriend" type="submit" value="<?php echo $nameButton;?>">
                        </form>
                    <?php
                        }
                    ?>  
                        <div class="space_free"></div>
                    </div>
             
                

        <?php
        	}
          	}
    	}
        ?>
        	</div>
                </div>
@endsection