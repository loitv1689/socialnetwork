<?php
session_start();
$_SESSION['user_id'] = 27;
$_SESSION['user_name'] = "tavanloi";
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

///////// ROUTE LOGIN

Route::filter('checkLogin', function(){
 if(!Session::has('user_name')){
  $noti = "";
   return View::make('login', array('noti'=>$noti));
 } else{

 }
});
Route::get('viewuser',function(){
  $data = muser::getDataUser(Session::get('user_id'));
  echo "<pre>";
  print_r($data);
  echo "</pre>";
   
});
Route::post('login', function(){
  if(User::check_login(Input::get("email"),Input::get("password"))) {
    Session::start();
    $user = User::get_info(Input::get('email'));
    Session::put("user_id", $user[0]->user_id);
    Session::put("user_name",$user[0]->user_name);
  //Session::regenerate();
    return Redirect::to('');
  } else {
      $noti = "Không thể đăng nhập. Vui lòng kiểm tra lại !";
      return View::make('login', array('noti'=>$noti));
  };

});

Route::post('register', function(){
  $email = User::select('email')->where('email','=',Input::get("email"))->get();
  foreach ($email as $key) {
    if($key->email == Input::get("email")){
      $noti = "Đăng ký không thành công. Email đã tồn tại";
      return View::make('login', array('noti'=>$noti));
    }}
  
      $user = new User();
      $user->user_name=Input::get("username");
       $user->password=Input::get("password");
       $user->email=Input::get("email");
       $user->save();
       $noti = "Đăng ký thành công. Vui lòng đăng nhập!";
       return View::make('login', array('noti'=>$noti));
 
});

////////////////////////// Nhóm tất cả những đường link cần check qua đã login chưa
////////////////////////// 

Route::group(array('before' => 'checkLogin'), function(){
   Route::get('messages/{user_id}', array('uses'=>'MessagesController@getMessages'));
 
   Route::get('', function()
    {
      $new_messages = Message::checkNewMessage(Session::get('user_id'));
      $friend_requests = Friend::getListRequest(Session::get('user_id'));
       $friends_online = Friend::getListFriend(Session::get('user_id'));
      $posts = Post::getPostTotal(Session::get('user_id'));
      $user = User::where("user_id", "=", Session::get('user_id'))->get();
      $new = Message::checkNewMessage(Session::get('user_id'));
      return View::make('home', array('info_user'=>$user[0], 'list_post'=>$posts, 'new_messages'=>$new_messages, 'friend_requests' =>$friend_requests, 'friends_online'=>$friends_online));
    });

   //tạm thời đổi thành get logout để nhấn vào đăng xuất thì nó thoát
    Route::get('logout', function(){
      Session::flush();
      return Redirect::to('');
    });

    Route::get('/users/{user_id}', function($user_id){
        $data = array();
        $new_messages = Message::checkNewMessage(Session::get('user_id'));
        $friend_requests = Friend::getListRequest(Session::get('user_id'));
        $friends_online = Friend::getListFriend(Session::get('user_id'));
        $user = User::where("user_id", "=", $user_id)->get();
        $posts = Post::getPost($user_id);
        //ta
         $data['id_friends'] = $user_id;

        if ($user_id == Session::get('user_id')) {
            return View::make('personal', array('info_user'=>$user[0], 'list_post'=>$posts,'isMe'=>'1', 'user_id_addfriend'=>$user_id,
                                                 'new_messages'=>$new_messages, 'friend_requests' =>$friend_requests, 'friends_online'=>$friends_online,'data'=>$data));
        }else{
          $data['flag'] = "1";
          
            return View::make('personal', array('info_user'=>$user[0], 'list_post'=>$posts, 'isMe'=>'0', 'user_id_addfriend'=>$user_id,
                                                 'new_messages'=>$new_messages, 'friend_requests' =>$friend_requests,'friends_online'=>$friends_online,'data'=>$data));
        }

    });


});



////////////////// LỰC GỬI

//post bai. luu vao Post
Route::get('search/results',['uses'=>'SearchController@getUser']);
Route::controller('profile','ProfileController');
Route::controller('upload','UploadController');
Route::post('comment', ['uses'=>'CommentController@postComment']);
Route::post('post', ['uses'=>'PostController@postPost']);
Route::controller('album','AlbumController');
//Route::post('post',); //function(){
  // $post = new Post();
  // $post->user_id = Session::get('user_id');//lấy theo session
  // $post->content = Input::get("post_stt");
  // $post->created_at = (new DateTime())->format('Y-m-d H:i:s');
  // $post->updated_at = (new DateTime())->format('Y-m-d H:i:s'); 
  // $post->save();
  // $id_insert = Post::last_insert_id();
  // echo 1;
  //return Redirect::to('');
// });

//comment vào trang cá nhân
// Route::post('comment', function(){
//   // làm gì đáy
//   // nhần biến ẩn gồm post_id và user_id comment, nội dung thì nhận từ form là ok.
  // $user_id  = Input::get('user_id');
  // Post::addComment(Input::get('post_id'), Session::get('user_id'), Session::get('user_name'), Input::get('content'));
  // return Redirect::to("users/$user_id");

// });
// // // coment lên trang chủ
// Route::post('comment-home', function(){
  // làm gì đáy
  // nhần biến ẩn gồm post_id và user_id comment, nội dung thì nhận từ form là ok.
  //  $user_id  = Input::get('user_id');
  //  Post::addComment(Input::get('post_id'), Session::get('user_id'), Session::get('user_name'), Input::get('content'));
  // return Redirect::to("");
// 
// });


//chinh sua thong tin
Route::post('save_user_name', function(){
  $update = array("user_name"=>Input::get("name-txt"));
  $user_id = Session::get('user_id');
  DB::table("user")->where("user_id","=",$user_id)->update($update);
  return Redirect::to("users/$user_id");
});
Route::post('save_brithday', function(){
  $update = array("brithday"=>Input::get("brithday-txt"));
  $user_id = Session::get('user_id');
  DB::table("user")->where("user_id","=",$user_id)->update($update);
  return Redirect::to("users/$user_id");
});

Route::post('save_address', function(){
  echo Input::get("address-txt");
  $update = array("address"=>Input::get("address-txt"));
  $user_id = Session::get('user_id');
  DB::table("user")->where("user_id","=",$user_id)->update($update);
  return Redirect::to("users/$user_id");
});

Route::post('save_job', function(){
  echo Input::get("job-txt");
  $update = array("job"=>Input::get("job-txt"));
  $user_id = Session::get('user_id');
  DB::table("user")->where("user_id","=",$user_id)->update($update);
  return Redirect::to("users/$user_id");
});


//gửi tin nhắn
Route::post('sent_message', function(){
  Message::addMessage(Session::get('user_id'), Input::get('user_id'),Input::get("message"));
  $id =  Input::get('user_id');
  return Redirect::to("messages/$id");
});

//kết bạn
Route::post('add_friend', function(){
  $user_id_addfriend = Input::get('user_id_addfriend');
  Friend::addFriend(Session::get('user_id'),$user_id_addfriend);
  return Redirect::to("users/$user_id_addfriend");
});

Route::post('confirm/{user_id}', function($user_id){
  Friend::acceptFriend(Session::get('user_id'), $user_id);
  return Redirect::to("users/$user_id");
});
Route::post('delete/{user_id}', function($user_id){
  Friend::deleteFriend(Session::get('user_id'), $user_id);
  return Redirect::to("");;
});








Route::get('/uploadfile', function(){
    return View::make('form');
});

Route::post('handle-form', function()
{
 $name = Input::file('book')->getClientOriginalName();
 Input::file('book')->move('/directory', $name);
 return $name;
});



Route::get('abc', function(){
  $get_post = Post::getNewPost("2015-05-10 15:16:18");
  echo "<pre>";
  print_r($get_post);
  echo "</pre>";
});


/*

// kiểm tra biến truyền vào trên link và đặt tên cho route
Route::get('/{ho}/{ten}',function($ho, $ten){
    
   echo "{$ho} và {$ten}";
})->where(['ho' => '[a-z]+', 'ten' =>'[a-z]+']);

// gọi hàm trong controller
Route::get('/daikk', 'HomeController@showWelcome');

// đặt tên route
Route::get('/chi-tiet-san-pham-{tenSP}', ['as' => 'tenroute', 'uses' => 'SanPham@view']);

//sử dụng route đã đặt tên:

Route::get('/use-name-route', function(){
    $ten= "Dưa muối";
   $url = URL::route('tenroute', $ten);
   echo " <a href='$url'>Chi tiet san pham {$ten}</a>"; 
});


//form đăng nhập

Route::get('/login', function(){
   echo "đăng nhập ở đây"; 
});



// filter truyền thêm tham số
Route::filter('checkLogin2', function($route,$request,$value){
    if($value == 'đại'){
        echo "chào Đại đẹp trai";
    }else{
        echo "chào bạn hiền";
    }
});

//link trang chủ check đăng nhập
Route::get('/trangchu', array('before' => 'checkLogin2:đại', 'uses' => 'HomeController@showWelcome'));


// filter không tham số
Route::filter('checkLogin', function(){
   if(1!=2){
     //return  "checkLogin";
    return Redirect::to('/login');
   } 
});

//tạo route có checkLogin
Route::get('/profile', array('before'=>'checkLogin', 'uses'=>'ProfileController@view'));

// nhóm các route cùng xử lý 1 filter như nhau vào 1 nhóm

Route::group(array('before' => 'checkLogin'), function(){
    Route::get('/link1', array('uses'=>'Class1@view')); 
    Route::get('/link2', array('uses'=>'Class2@view'));
});


// filter check Login Admin chưa để chuyern với link có thểm /admin
Route::filter('checkLoginAdmin', function(){
   if(1==2){
        // bắt đăng nahapj thêm tại khoản khác là admin, hủy tại khoản hiện tại chẳng hạn
        //return "vào checkLoginAdmin";
        return Redirect::to('/login');
   } 
});



//nhóm thêm tiền tố, đỡ phải viết 1 link dài.
Route::group(array("prefix"=>"thich viet them link cho dai vao day"), function(){
    Route::get('/prefix1', function(){
       return "Đặng Văn Đại đang thử thằng prefix trogn laravel"; 
    });
});

// thêm nhóm tiền tố kết hợp với kiểm tra tính đăng nhập => giới hạn đăng nhập chỉ là admin chẳng hạn.
Route::group(array("prefix"=>"thich viet them link cho dai vao day", "before"=>"checkLoginAdmin"), function(){
    Route::get('/prefix1', function(){
       return "Đặng Văn Đại đang thử thằng prefix trogn laravel, <b>Nếu đã đăng nhập quyền admin thì cho nó vào đây!!</b>"; 
    });
});



///////////////////////////////////////////////////
//SANG PHẦN CONTROLLER

// không tham số;
Route::get('/controller', 'HocphpController@test');
Route::get('user-controller', 'UserController@login');

// có tham số
Route::get('/controller-{name}-{mssv}', 'HocphpController@test2');

// sử dụng controller cho nhiều hàm thay bằng đường link  => biến 1 phương thức thành đường link
Route::controller('implicit-controller', 'ImplicitController');


// resful controller tương tự prefix và nó chính là implicit-controller
Route::controller('resful-controller', 'ResfulController');

/////////////////////////////////////////////////////
//SANG PHẦN VIEW
Route::get('phim', function(){
    $data = array('ten_phim'=>'xxx', 'time'=>20);
    return View::make('film', $data);
     // cách 2: return View::make('film')->with('ten_phim', 'phim gì cũng được mà')->with('time', 20);
    //   cách 3: return View::make('film', array('ten_phim'=>'xxx', 'time'=>'20'));
});

*/