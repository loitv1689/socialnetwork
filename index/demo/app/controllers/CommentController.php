<?php

class CommentController extends BaseController
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
    public function postComment() {

			//check userid postid content isempty
			if (!Session::get('user_id')){
			    echo json_encode(array("value_type"=>'2'));
			}
			else if(!isset($_POST['post_id']) ) {
				echo json_encode(array("value_type"=>'3'));
			}
			else if( !isset($_POST['content'])){
			 echo json_encode(array("value_type"=>'5'));
			}

			else if (empty($_POST['post_id']) || $_POST['content'] == "") {
			    echo json_encode(array("value_type"=>'4'));
			} 
			else {
			    $user_id = Session::get('user_id');
			    $post_id = $_POST['post_id'];
			    $content = $_POST['content'];
			    $username = Session::get('user_name');
			   // DB::insert('insert into comment (user_id,post_id,content,register_datetime) values(?,?,?,?)', array($user_id, $comment_post_id, $comment_content, (new DateTime())->format('Y-m-d H:i:s')));
			   Post::addComment(Input::get('post_id'), Session::get('user_id'), Session::get('user_name'), Input::get('content'));
			   $avatar = muser::getGetUrlAvatar($user_id);
			    $html = <<<HTML
			             <div class="comment_in_topic">
			             <div class="image_in_comment">
								<div class="avatar">
									<img width="50px" height="50px"src="{$avatar}" >
								</div>                                
						</div>
								<div class="comment_content">   
									<span class="type_user_name_comment"> {$username} </span>
									<div class="comment_content_detail"> {$content}</div>
								</div>
						</div>                               
HTML;
			    echo json_encode(array("value_type"=>'1','html'=>$html));
			}
			 // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    }

}
?>