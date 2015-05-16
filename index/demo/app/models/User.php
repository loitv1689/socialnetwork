<?php
class User extends Eloquent{
	public $table = "user";
	public static function check_login($email, $password){
		$check = User::where("email","=",$email)->where("password","=",$password)->count();
		if($check>0)
			return true;
		else return false;
	}
	public static function check_email($email, $password){
		$check = User::where("email","=",$email)->where("password","=",$password)->count();
		if($check>0)
			return true;
		else return false;
	}
	public static function get_info($email){
		$user = User::where("email", "=", $email)->get();
		return $user;
	}
	public static function getName($user_id){
		$user = User::where("user_id","=",$user_id)->get();
		foreach ($user as $user) {
			$user_name = $user->user_name;
		return $user_name;
		}
		
	}
}
?>

