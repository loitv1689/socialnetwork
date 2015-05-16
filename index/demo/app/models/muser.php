<?php
class muser extends Eloquent{
	public static function checkIsFriend($user_id,$friend_id){
		$data = DB::select('select id from friend where user_id1=? and user_id2=? and status=?',array($user_id,$friend_id,1));
		if(isset($data[0])){
			return $data[0]->id;
		}
		return 0;
	}
	public $table="user";
		public static function getDataUser($user_id)
	{
		$result = DB::table('user')->where('user_id', '=', $user_id)->get();
		if(isset($result[0])){
			$result[0]->url_avatar = muser::getGetUrlAvatar($user_id);
			return $result[0];
		}
		return $result;
	}
	public static function getGetUrlAvatar($user_id){
		$path = DB::table('user')->join('file', 'user.avatar_file_id', '=', 'file.file_id')->where('user.user_id', '=', $user_id)->get();
		if(isset($path[0]->url_file)){
			return asset('uploads/images/'.$path[0]->url_file);
		}else{
			return asset("image/noavatar.jpg");
		}
	}

	public static function getIdAvatar($user_id){
		$results = DB::select('SELECT avatar_file_id FROM `user` WHERE user_id =  ? ', array($user_id));
		if(isset($results[0]->avatar_file_id)){
			return $results[0]->avatar_file_id;
		}else{
			return 0;
		}
	}
	public static function getListSearchUser($keysearch){	
		$data  = DB::SELECT("select * from user where user_name COLLATE utf8mb4_unicode_ci like '%$keysearch%' ");
		return $data;
	}
	public static function checkUserRelation($user_id,$friend_id){
		/*
		//Có 4 giá trị quan hệ 
		//1) NULL quan hệ chưa tồn tại trong db
		//2) 0 quan hệ này đã bị hủy 
		//3) 1 quan hệ này đang chờ trả lời 
		//4) 2 quan hệ đã được cả 2 bên chấp nhận
		*/
		$data = DB::select('select relationship from friend where user_id1=? and user_id2=? ',array($user_id,$friend_id));
		if(isset($data[0])){
			return $data[0]->relationship;
		}
		return NULL;	
	}
	//**********************************************OLD FUNCTION***************************************************//

	public static function getIDFromUserName($username){
		$results = DB::select('SELECT user_id FROM `user` WHERE user_name =  ? ', array($username));
		if(isset($results[0]->user_id)){
			return $results[0]->user_id;
		}else{
			return NULL;
		}
	}

	public static function check_password($pass){
		$results = DB::select('SELECT user_id FROM `user` WHERE password =  ? ', array($pass));
		if(isset($results[0]->user_id)){
			return $results[0]->user_id;
		}else{
			return 0;
		}
	}
	
	public static function getUserName($user_id){
		$data =  DB::select('SELECT `user_name` FROM `user` where user_id = ?' ,array($user_id));
		if(isset($data[0])){
			return $data[0]->user_name;
		}else{
			return "NoName";
		}

	}
	public static function getNameUser($user_id){
		$data =  DB::select('SELECT `firstname`,`lastname` FROM `user` where user_id = ?' ,array($user_id));
		if(isset($data[0])){
			return $data[0]->firstname." ".$data[0]->lastname;
		}else{
			return "NoName";
		}

	}
	//lây tên file ảnh của user examp: heelo.png
	public static function getAvatarImageFile($user_id){
		$path = DB::table('user')->join('file', 'user.avatar_photo_id', '=', 'file.file_id')->where('user.user_id', '=', $user_id)->get();
		if(isset($path[0]->url_file)){
			return $path[0]->url_file;
		}else{
			return NULL;
		}
	}
	
		public static function getDataPostForHome($user_id){
		$data=array();
		$friendId = user::getFriendsIdFriends($user_id);
		$data[] = $user_id;
		foreach ($friendId as $value){
		 	$data[] = $value->friend_id;
		} 
		$users = DB::table('post')->whereIn('post_on_user_id',$data)->orderBy('register_datetime','desc')->get();
        if(isset($users)){
        	return $users;
  		}
		 return NULL;

	}
	
	
	public static function getDataPostForHomePage($user_id){
		
		$users = DB::table('post')->whereIn('post_on_user_id',array($user_id))->orderBy('register_datetime','desc')->get();
        if(isset($users)){
        	return $users;
  		}
		 return NULL;

	}
	public static function getListAlbum($user_id){
		$list_image =array();
		$list_id = DB::SELECT('select image_file_id from `post` where user_id =? and is_have_image = ? order by register_datetime DESC limit 10',array($user_id,1));
		if(isset($list_id[0])){
			foreach ($list_id as $value) {
		
				$list_image[] = DB::table('file')->where('file_id',$value->image_file_id)->pluck('url_file');
			}
		}
		
		return $list_image;

	}
		
}