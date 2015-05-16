<?php

class ProfileController extends BaseController
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
    |	Route::get('/', 'HomeController@showWelcome');
    |
    */
        
    public function getProuser() {
        if (Session::get('user_id') != null) {
            $new_messages = Message::checkNewMessage(Session::get('user_id'));
            $friend_requests = Friend::getListRequest(Session::get('user_id'));
            $friends_online = Friend::getListFriend(Session::get('user_id'));
            $user = User::where("user_id", "=", Session::get('user_id'))->get();
            $new = Message::checkNewMessage(Session::get('user_id'));
            $user_id = Session::get('user_id');
            $data['user'] = muser::getDataUser($user_id);
            $data['info'] = "1";
            //$user = User::where("user_id", "=", $user_id)->get();
            return View::make('profile/prouser')->with('data', $data)->with('info_user',$user[0])->with('new_messages',$new_messages)->with('friend_requests',$friend_requests)
            ->with('friends_online',$friends_online);
        }else{
            echo "bạn cần đăng nhập để xem profile(Error from ProfileController)";
        }
    }
       public function getProuserface() {
        $data = array();
        $new_messages = Message::checkNewMessage(Session::get('user_id'));
        $friend_requests = Friend::getListRequest(Session::get('user_id'));
        $friends_online = Friend::getListFriend(Session::get('user_id'));
        $user = User::where("user_id", "=", Session::get('user_id'))->get();
        $new = Message::checkNewMessage(Session::get('user_id'));
        if (Session::get('user_id') != null) {
            $user_id = Session::get('user_id');
                 $file_id = muser::getIdAvatar($user_id);
                 $data['face'] = "1";
                if ($file_id != 0) {
                        $data['url_avatar'] = mfile::getGetUrlFile($file_id);

                        return View::make('profile/prouserface')->with('data',$data)->with('data', $data)->with('info_user',$user[0])->with('new_messages',$new_messages)->with('friend_requests',$friend_requests)
            ->with('friends_online',$friends_online);
                }else{
                    $data['url_avatar'] = "";    
                    return View::make('profile/prouserface')->with('data', $data)->with('info_user',$user[0])->with('new_messages',$new_messages)->with('friend_requests',$friend_requests)
            ->with('friends_online',$friends_online);
                }
        }else{
            echo "bạn cần đăng nhập để xem profile(Error from ProfileController)";
        }
    }
       public function getProusersecret() {
        $data = array();
            $new_messages = Message::checkNewMessage(Session::get('user_id'));
            $friend_requests = Friend::getListRequest(Session::get('user_id'));
            $friends_online = Friend::getListFriend(Session::get('user_id'));
            $user = User::where("user_id", "=", Session::get('user_id'))->get();
            $new = Message::checkNewMessage(Session::get('user_id'));
        $data['secret3'] = "1";
        if (Session::get('user_id') != null) {
            $user_id = Session::get('user_id');
            
            return View::make('profile/prousersecret')->with('data', $data)->with('info_user',$user[0])->with('new_messages',$new_messages)->with('friend_requests',$friend_requests)
            ->with('friends_online',$friends_online);
        }else{
            echo "bạn cần đăng nhập để xem profile(Error from ProfileController)";
        }
    }
    public function getProfriend($username) {
        if (true) {
            $user_id = Session::get('user_id');
            $data = "1";
            return View::make('profile/profriend')->with('data', $data);
        }else{
            echo "bạn cần đăng nhập để xem profile(Error from ProfileController)";
        }
    }
    public function postUpdateinfo(){
        if (Session::get('user_id') != null) {
            $user_id = Session::get('user_id');
            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";
            $uname =  $_POST['username'];   
            $addr = $_POST['address'];
            //$gdr = $_POST['gender'];
            $hobb = $_POST['hobby'];
            $phone = $_POST['phonenumber'];
            $job = $_POST['job'];
            DB::table('user')->where('user_id',$user_id)->update(array('user_name'=>$uname,'address'=>$addr,'hobby'=>$hobb,'telephone_number'=>$phone,'job'=>$job));
              //  echo "update1";
            $data['alert_update_info'] = "Cập nhật thành công";
        return Redirect::to('/profile/prouser')->with('$data');
        }else{
            echo "error update info profile in profile controller funtionc post updateinfo";
        }
    }
    public function postUpdateemail(){
           if (Session::get('user_id') != null) {
            $user_id = Session::get('user_id');
            $email = $_POST['email_new'];
            //check email here

            //insert email here
            if (isset($email)) {
                  DB::table('user')->where('user_id',$user_id)->update(array('email'=>$email));
            }
            //su
            $data['alert_update_info'] = "Cập nhật thành công";
            //echo "update email thanh cong";
            return Redirect::to('/profile/prouser')->with('$data');
        }else{
            echo "error update info profile in profile controller funtionc post update_email";
        }
    }
    public function postUpdateface(){
        if (Session::get('user_id') != null) {
            $user_id = Session::get('user_id');
            $current =  round(microtime(true));
                if (isset($_POST['uploadimageclick']))
                {
                    // echo "<pre>";
                    // print_r($_FILES);
                    // echo "</pre>";
                    // N?u ngu?i dùng có ch?n file d? upload
                    if (isset($_FILES['avatar_user']))
                    {
                        // N?u file upload không b? l?i,
                        // T?c là thu?c tính error > 0
                        if ($_FILES['avatar_user']['error'] > 0)
                        {
                            echo 'File Upload bị lỗi';
                        }
                        else{
                            // Upload file
                            $filename = $user_id."_".$current ."_". $_FILES['avatar_user']['name'];
                            $fileContent = file_get_contents($_FILES['avatar_user']['tmp_name']);
                            file_put_contents('uploads/images/'.$filename, $fileContent);
                            //move_uploaded_file($_FILES['avatar_user']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/uploads/images/'.$filename);
                            if(file_exists('uploads/images/'.$filename)){
                                $file_id = muser::getIdAvatar($user_id);
                                    DB::insert('insert into file (user_id,url_file,categories,file_type)
                                         values(?,?,?,?)',array($user_id,$filename,1,1));
                                    $insert_file_id = mpost::last_insert_id();
                                    if ($insert_file_id > 0) {
                                         DB::table('user')->where('user_id',$user_id)->update(array('avatar_file_id'=>$insert_file_id));
                                          $data['alert_update_info'] = "Cập nhật thành công";
                                            //echo "update email thanh cong";
                                            return Redirect::to('/profile/prouserface')->with('$data');

                                    }
                                    else{
                                        echo "upload thất bại ";
                                    }

                            }
                            //update to db
                        }
                    }
                    else{
                        echo 'bạn chưa upload file';
                    }
                }       
        }else{
            echo "error update info profile in profile controller funtionc post update_email";
        }
    }


    public function postUpdatepass(){
        if(Session::get('user_id') != null){
            $data = array();
            $user_id = Session::get('user_id');
            if(isset($_POST['changepass'])){
                $cpold = muser::check_password($_POST['password_old']);
                $cpnew = $_POST['password_new1'];
                if ($cpold > 0) {
                    // echo "<pre>";
                    // print_r($_POST);
                    // echo "</pre>";
                    DB::table('user')->where('user_id',$user_id)->update(array('password'=>$cpnew));
                     $_SESSION['alert_update_info'] = "Cập nhật thành công";
                     return Redirect::to('/profile/prousersecret')->with('data',$data);
                     
                }else{
                    $_SESSION['alert_update_info'] = "Cập nhật thất bại";
                     return Redirect::to('/profile/prousersecret')->with('data',$data);

                }    
            }
        }
    }
    public function getFriend(){
        if (isset($_GET['id_friends'])) {
            $data = array();
               $new_messages = Message::checkNewMessage(Session::get('user_id'));
            $friend_requests = Friend::getListRequest(Session::get('user_id'));
            $friends_online = Friend::getListFriend(Session::get('user_id'));
            $user = User::where("user_id", "=", $_GET['id_friends'])->get();
            $new = Message::checkNewMessage(Session::get('user_id'));
            $user_id = $_GET['id_friends'];
            if ($user_id != NULL) {
                $data['user'] = muser::getDataUser($user_id);
                return View::make('profile/profriend')->with('data',$data)->with('info_user',$user[0])->with('new_messages',$new_messages)->with('friend_requests',$friend_requests)
            ->with('friends_online',$friends_online);   
            }else{
                echo "trang web khong ton tai";
            }
        }
    }
}
?>