<?php

class PostController extends BaseController
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
    public function postPost() {
    	if(isset($_POST['page_master']) && isset($_POST['post_content']) && isset($_POST['post_categories'])){
    		$page_master = $_POST['page_master'];
    		$user_id = Session::get('user_id');
        $post_content = $_POST['post_content'];
    		//$post_categories = $_POST['post_categories'];
            $post_file_id = (int)$_POST['image_id'];
	           if(empty($post_content)){
	          	echo json_encode(array('rid'=>'3','text_alert'=>'Nội dung không được để trống'));
	          }// }else if (empty($page_master) || empty($post_categories)) {
	          // 	echo json_encode(array('rid'=>'4','text_alert'=>'Không tồn tại page_master hoặc post categories'));
	          // }	
	          else {
	          //inset here
                  // $post = new Post();
                $post = new Post();
                 $date_create = (new DateTime())->format('Y-m-d H:i:s');
                 $img_file="";
                if ($post_file_id >0) {
                  $url_image_file = mfile::getGetUrlFile($post_file_id);
                  $img_file = '<img width="551px"  src="'.$url_image_file.'">';
                  $post->user_id = Session::get('user_id');//lấy theo session
                  $post->content = Input::get("post_content");
                  $post->created_at = $date_create;
                  $post->updated_at = $date_create;
                  $post->image_file_id =  $post_file_id;
                  $post->post_on_user_id = $page_master;
                  $post->is_have_image = '1';
                  $post->save();
                }else{
                  $post->user_id = Session::get('user_id');//lấy theo session
                  $post->content = Input::get("post_content");
                  $post->created_at = $date_create;
                  $post->updated_at = $date_create;
                  $post->post_on_user_id = $page_master;
                  $post->save(); 
                }
                $insert_id = mpost::last_insert_id();
                $post_id =$insert_id ;  
                $userinfo = muser::getDataUser(Session::get('user_id'));
               
                $html = <<<HTML
                <div class="panel panel-default">
            <div class="panel-heading">
                <b>
                <img src="{$userinfo->url_avatar}" alt="logo" class="img-rounded img-responsive" style="width: 30px; height: 30px; float:left; margin:-5px 5px 0 -8px ">
                <a href="http://localhost/index/demo/public/users/{$userinfo->user_id}">{$userinfo->user_name}</a></b>
                <span class="pull-right"><i class="fa fa-clock-o"></i> $date_create</span>
            </div>
                      <div class="panel-body">
                         <div id="post_content">{$post_content}</div>
                          
                          <div id="value_post_image_content">{$img_file}</div>
                     </div>


                     <div class="panel-footer">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href=""><i class="fa fa-thumbs-up"></i> 0 Thích</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="" onclick="document.getElementById({$insert_id}).focus(); return false;"><i class="fa fa-pencil"></i> 0 Bình luận</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href=""><i class="fa fa-share"></i> Chia sẻ</a>
                                <a href="#" class="pull-right">Xem thêm bình luận</a>
                            </li>

                                                        <li class="list-group-item">
                                
                             <div class="list-group-item topic_comment topic_comment_{$post_id}">
                                        <div id="comment_alert_{$post_id}"></div>
                                         <form action="javascript:void(0)">
                                        <div class="post_comment post_comment_{$post_id}" >
                                            <input type="hidden" id="categories" value="2">
                                            <input type="hidden" id="user_id_comment_{$post_id}" value="<?php  {$user_id} ?>">
                                            <input type="hidden" id="comment_post_id_{$post_id}" value="{$post_id}">
                                              <div class="comment_trigger_{$post_id}">
                                            <input name="post_id" class="post_id" value="{$post_id}" hidden>
                                            <div id="comment_content_{$post_id}" contentEditable="true" data-text="Viết bình luận..." class="text_area_in_post form-control input-sm"  ></div>
                                            </div>
                                        </div>
                                        </form>
                                      <div id="all_comment_in_post_{$post_id}">
                                   
                                        </div>
                                    </div>
                        </li>
                    </ul>
                </div>
            </div>
            <script>
              $('.comment_trigger_{$post_id}').keypress(function(e) {
              if(e.which == 13) {
                var element = $(this);
                comment_btt_click(element.find('.post_id').val());
              }
            });    
            </script>                              
HTML;
				    echo json_encode(array('rid'=>'5','html'=>$html));
			        //end	
	        	}
         }else{
                echo json_encode(array('rid'=>'3','text_alert'=>'error on postcontroller'));
         }
     }
}

?>








