<?php 
	/**
	*  
	*/
	class LoginController extends BaseController
	{
		public function getListOnline($user_id){
			
			$check = Login::where("user_id","=",$user_id)->count();
			if($check>0){
				Login::refesh($user_id);
			}else {
				return false;
			}

		}
	}
 ?>