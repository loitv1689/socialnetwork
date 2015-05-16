<?php
class AlbumController extends BaseController
{
    
    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |   Route::get('/', 'HomeController@showWelcome');
    |
    */
    public function getUser(){

    	if (Session::get('user_id') != NULL) {
    		$data = array();
    		$user_id = Session::get('user_id');
            $new_messages = Message::checkNewMessage(Session::get('user_id'));
            $friend_requests = Friend::getListRequest(Session::get('user_id'));
            $friends_online = Friend::getListFriend(Session::get('user_id'));
            $user = User::where("user_id", "=", Session::get('user_id'))->get();
            $new = Message::checkNewMessage(Session::get('user_id'));
    		$data['post'] = mpost::getUserPostImage($user_id);
            if (isset($data['post'])) {
                foreach ($data['post'] as $key => $value) {
                    $data['post'][$key]->url_image = mfile::getGetUrlFile($value->image_file_id);
                }
            }
            return View::make('album/albumuser')->with('data',$data)->with('info_user',$user[0])->with('new_messages',$new_messages)->with('friend_requests',$friend_requests)
            ->with('friends_online',$friends_online);
    	}	
    }
    public function getFriend(){
    	$data = array();
        $new_messages = Message::checkNewMessage(Session::get('user_id'));
            $friend_requests = Friend::getListRequest(Session::get('user_id'));
            $friends_online = Friend::getListFriend(Session::get('user_id'));
            $user = User::where("user_id", "=", Session::get('user_id'))->get();
            $new = Message::checkNewMessage(Session::get('user_id'));
    	if($_GET['id_friends'] != null){
    		//get id $user_id 
    		$user_id =$_GET['id_friends'];
    		//if have user name
    		if($user_id != NULL){
	    		$data['post'] = mpost::getUserPostImage($user_id);
	            if (isset($data['post'])) {
	                foreach ($data['post'] as $key => $value) {
	                    $data['post'][$key]->url_image = mfile::getGetUrlFile($value->image_file_id);
	                }
	            }
	            return View::make('album/albumuser')->with('data',$data)->with('info_user',$user[0])->with('new_messages',$new_messages)->with('friend_requests',$friend_requests)
            ->with('friends_online',$friends_online);
    		}else{
    			echo "album của $user_id  ".$user_id ."này không tồn tại";
    		}
    	}

    }
    
}
?>