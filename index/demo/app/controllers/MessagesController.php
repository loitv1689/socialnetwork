<?php 
	/**
	*  
	*/
	class MessagesController extends BaseController
	{
		public function getMessages($user_id){
			// LẤY DỮ TIỆU TIN NHẮN BẰNG CÁCH TRUYỀN VÀO USER_ID_SENT VÀ USER_ID_RECIEVE , gọi model thôi
			Message::removeNewMessage(Session::get('user_id'), $user_id);

			$array = Message::getChatConversation(Session::get('user_id'), $user_id);
			 $friends_online = Friend::getListFriend(Session::get('user_id'));
			$new_messages = Message::checkNewMessage(Session::get('user_id'));
     		$friend_requests = Friend::getListRequest(Session::get('user_id'));
			$user_name = User::select('user_name')->where('user_id', '=', $user_id)->get();
			$user_name = $user_name[0];
			$user = User::where("user_id", "=", Session::get('user_id'))->get(); // lấy thông tin người dùng hiện tại
			$new = array('info_user'=>$user[0],
						 'messages'=>$array,
						 'user_id'=>$user_id,
						 'user_name'=>$user_name->user_name,
						 'new_messages'=>$new_messages,
						 'friend_requests'=>$friend_requests,
						 'friends_online'=>$friends_online);
			for($i = 0 ; $i < sizeof($new['messages']); $i++) {
				if($new['messages'][$i]['user_id'] == $user_id){
					$new['messages'][$i]['user_name'] = $user_name->user_name;
				}else{
					$new['messages'][$i]['user_name']= Session::get('user_name');
				}
			}
			return View::make('messages', $new);
		}
	}
	?>