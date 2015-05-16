<?php

class SearchController extends BaseController
{
    
    public function getUser(){
    	$data = array();
         $new_messages = Message::checkNewMessage(Session::get('user_id'));
            $friend_requests = Friend::getListRequest(Session::get('user_id'));
            $friends_online = Friend::getListFriend(Session::get('user_id'));
            $user = User::where("user_id", "=", Session::get('user_id'))->get();
            $new = Message::checkNewMessage(Session::get('user_id'));

    	if(isset($_GET['searchkey'])){
    		$keysearch = $_GET['searchkey'];
    		if(!empty($keysearch)){
	    		$data['listuser'] = muser::getListSearchUser($keysearch);
	    	}else{
	    		$data['keysearchempty'] = "empty";
	    	}
    	}
            //     echo "<pre>";
            // print_r($data);
            // echo "</pre>";
    	return View::make('search/search')->with('data',$data)->with('info_user',$user[0])->with('new_messages',$new_messages)->with('friend_requests',$friend_requests)
            ->with('friends_online',$friends_online);
    }
}
?>