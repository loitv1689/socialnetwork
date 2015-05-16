<?php
class mcomment extends Eloquent{
	public $table="comment";
	public static function getCommentPost($post_id){
		$data = DB::select('select * from `comment` where post_id = ? order by register_datetime DESC',
			array($post_id));
				return $data;
	}
}