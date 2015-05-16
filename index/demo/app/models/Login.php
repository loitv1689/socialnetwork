<?php
// thằng login này có 2 nhiềm vụ chính
// 1: thay đổi thời gian họ tương tác với hệ thống hoặc là thêm mới cái user_id vừa đăng nhập
// 2: lấy ra danh sách các user
class Login extends Eloquent
{
	public $table = "login";

	public static function addUser($session_id, $user_id){
		$login = new Login;
		$login->session_id = $session_id;
		$login->user_id = $user_id;
		$login->save();

	}

	public static function refresh($user_id){
		$affectedRows = Login::where('user_id', '=', $user_id)->update(array());
		return $affectedRows;
	}
	// truyền vào 1 user_id và lấy ra danh sách các user_id bạn bè đang online
	public static function listOnline($user_id)
	{
		// $time_login =date('h:i:s d-m-y');
		$result = array();
		$query_login = Login::select('user_id')->get(); // lay danh sach user online qua user_id
		$query_friend1 = Friend::select('user_id2')->where('user_id1', '=', $user_id)->get();
		$query_friend2 = Friend::select('user_id1')->where('user_id2', '=', $user_id)->get();
		// $result = array_merge($query_friend1->toArray(), $query_friend2->toArray()); chả cần gộp luôn vì sẽ lỗi ở user_id1-> "1" và user_id2->"2" thuộc mảng này khó xử lý
		//$query_friend = array_unique($result); không cần thiết vì khi nhét vào đã đảm bảo ngược lại không c

		foreach ($query_login as $login) {
			foreach ($query_friend1 as  $friend1) {
				if($friend1['user_id2'] == $login['user_id']){
					$result[] = $friend1['user_id2'];
				}
			}
			foreach ($query_friend2 as  $friend2) {
				if($friend2['user_id1'] == $login['user_id']){
					$result[] = $friend2['user_id1'];
				}
			}
		}
		return $result; // tra ve danh sach online ?? chua ro la mang hay la object 
	}

	public static function logout($user_id){
		$query = Login::where("user_id","=",$user_id)->delete();
		return $query; // true or false
	}

}

