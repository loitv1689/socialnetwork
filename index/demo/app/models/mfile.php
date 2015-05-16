<?php
class mfile extends Eloquent{
	public $table="file";
	public static function getGetUrlFile($file_id){
		$data = DB::select('select url_file from `file` where file_id = ?',
			array($file_id));
		if(isset($data[0]->url_file)){
				return asset("uploads/images/".$data[0]->url_file);
		}else{
			return asset("image/filenotexist.png");
		}
	}
	/***********************************************************************/
	public static function getGetUrlAvatar($user_id){
		$data = DB::select('select url_file from `file` where file_id = ?',
			array($file_id));
		
		if(isset($data[0]->url_file)){
				return asset("uploads/images/".$data[0]->url_file);
		}else{
			return asset("public/image/noavatar.jpg");
		}
	}

	

}