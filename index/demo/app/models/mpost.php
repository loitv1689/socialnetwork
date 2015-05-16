<?php
class mpost extends Eloquent{
	public $table="post";
	public static function getUserPostImage($user_id){
		$data = DB::select('select * from `post` where 	user_id=? and is_have_image= ? order by created_at DESC',
			array($user_id,'1'));
			return $data;
	}
	/*********************************************OLDER******************************************************/
	public static function getPostUser($user_id){
		$data = DB::select('select * from `post` where 	post_on_user_id=? and categories=? order by created_at DESC',
			array($user_id,'1'));
			return $data;

	}
	
	public static function last_insert_id(){
		$id = DB::getPdo()->lastInsertId();
		return $id;
	}
}