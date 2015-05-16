@extends('base-template')

<?php

$notifications = array( array('link'=>'12345', 'user_name_1'=>'Đặng Văn Đại', 'atc'=>'đã đăng vào nhóm', 'user_name_2'=>'CNTT&TT k57', 'time'=>'một giờ trước'),
    array('link'=>'12345', 'user_name_1'=>'Dương Văn Lực', 'atc'=>'đã like hình ảnh', 'user_name_2'=>'Đặng Văn Đại', 'time'=>'một giờ trước'),
    array('link'=>'12345', 'user_name_1'=>'Phùng thế Hoàng', 'atc'=>'đã đăng vào nhóm', 'user_name_2'=>'CNTT&TT k57', 'time'=>'một giờ trước'),
    array('link'=>'12345', 'user_name_1'=>'Trần Đức Sang', 'atc'=>'đã đăng vào nhóm', 'user_name_2'=>'CNTT&TT k57', 'time'=>'một giờ trước'));

    ?>
    @section('user-name')
    {{$info_user->user_name}}
    @stop
  
    @section('brithday')
    {{$info_user->brithday}}
    @endsection
    @section('address')
    {{$info_user->address}}
    @endsection
    @section('job')
    {{$info_user->job}}
    @endsection

    @section('personal')
    <img src="{{URL::asset('images/venice.jpg')}}" alt="logo" class="img-rounded img-responsive"><br><div role="tabpanel">
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
    </ul><br>
    <div class="tab-content">

        <div role="tabpanel" class="tab-pane active" id="home">
         
        <div class="panel panel-default" id="post_status_head">
            <div class="panel-heading">
                <a href=""><i class="fa fa-pencil-square"></i> Cập nhật trạng thái</a> &nbsp;&nbsp;&nbsp;
                <a id="add_photo_on_post" href="javascript:void(0)"><i class="fa fa-picture-o"></i> Thêm ảnh/video</a> &nbsp;&nbsp;&nbsp;
                <a href=""><i class="fa fa-picture-o"></i> Tạo album ảnh</a>
            </div>
            <form action="javascript:void(0)">
                <div class="panel-body">
                    <input type="hidden" id="post_categories" name="categories" value="1">
                                    <input type="hidden" id="user_id_on_page" name="user_id_on_page" value="{{$data['id_friends']}}">
                                     <div class="form-group" >
                                     <div class="text_area_in_post form-control">
                                      <div id="user_main_post_content" contentEditable="true" data-text="Viết bình luận..." name="statuscontent"></div>
                                       <div id="image_in_post">
                                            <input type="file" style="display:none" id="photo_on_post" name="add_photo_on_post_input">
                                           <input type="hidden" id="file_id_image_inpost" value="0">
                                           <div id="image_in_post_content"></div>
                                       </div>
                                   </div>
                                    </div>
                                    <div id="alert_error_on_post_form"></div>  
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <button class="btn btn-primary btn-sm" onclick="post_btt_click()" id="post_on_page">Post status</button>
                    </div>
                </div>
            </form> 
        </div>
    
            @if(sizeof($list_post) > 0)
            @foreach($list_post as $post)
        <div class="panel panel-default">
            <div class="panel-heading">
                <b>
                <img src="{{muser::getGetUrlAvatar($post->user_id)}}" alt="logo" class="img-rounded img-responsive" style="width: 30px; height: 30px; float:left; margin:-5px 5px 0 -8px ">
                <a href="{{URL::asset("users/".$post->user_id)}}">{{$post->user_name}}</a></b>
                <span class="pull-right"><i class="fa fa-clock-o"></i> {{$post->updated_at}}</span>
            </div>
                    
                     <div class="panel-body">
                         <div id="post_content">{{$post->content}}</div>
                          
                          <div id="value_post_image_content"><?php if ($post->is_have_image == 1) {
                                        $url_image_file = mfile::getGetUrlFile($post->image_file_id);
                                        echo '<img width="551px"  src="'.$url_image_file.'"">';
                                    }?></div>
                     </div>


                     <div class="panel-footer">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href=""><i class="fa fa-thumbs-up"></i> {{sizeof($post->list_like)}} Thích</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="" onclick="document.getElementById('{{$post->post_id}}').focus(); return false;" ><i class="fa fa-pencil"></i> {{sizeof($post->comment)}} Bình luận</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href=""><i class="fa fa-share"></i> Chia sẻ</a>
                                <a href="#" class="pull-right">Xem thêm bình luận</a>
                            </li>

                             <div class="list-group-item topic_comment topic_comment_{{$post->post_id}}">
                                        <div id="comment_alert_{{$post->post_id}}"></div>
                                         <form action="javascript:void(0)">
                                        <div class="post_comment post_comment_{{$post->post_id}}" >
                                            <input type="hidden" id="categories" value="2">
                                            <input type="hidden" id="user_id_comment_{{$post->post_id}}" value="<?php  if(isset($_SESSION->user_id)) echo $_SESSION->user_id; ?>">
                                            <input type="hidden" id="comment_post_id_{{$post->post_id}}" value="{{$post->post_id}}">
                                              <div class="comment_trigger">
                                            <input name="post_id" class="post_id" value="{{$post->post_id}}" hidden>
                                            <div id="comment_content_{{$post->post_id}}" contentEditable="true" data-text="Viết bình luận..." class="text_area_in_post form-control input-sm"  ></div>
                                            </div>
                                            
                                            
                                        </div>
                                        </form>
                                      <div id="all_comment_in_post_{{$post->post_id}}">
                                        @if(sizeof($post->comment) > 0)
                                        @foreach($post->comment as $value)
                                            <div class="comment_in_topic">
                                            <div class="image_in_comment">
                                                <div class="avatar">
                                                <img width="50px" height="50px"src="{{muser::getGetUrlAvatar($value->user_id)}}">
                                                </div>                                
                                            </div>
                                            <div class="comment_content">   
                                            <span class="type_user_name_comment">{{User::select('user_name')->where('user_id', '=',$value->user_id)->get()[0]->user_name}}</span>
                                            <div class="comment_content_detail">   {{$value->content}}</div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                        </div>
                                    </div>
                    </ul>
                </div>

</div>

                @endforeach
                @endif
            </div>
            <div role="tabpanel" class="tab-pane" id="profile">
                <table class="table table-bordered table-striped"><tbody>
                    <tr>
                        <td>Họ và tên</td>
                        <td>{{$info_user->user_name}}</td>
                        @if($isMe == 1)
                        <td><button class="btn btn-primary" type="button" data-toggle="modal" data-target=".name">Chỉnh sửa</button></td>
                        @endif
                    </tr>
                    <tr>
                        <td>Ngày Sinh</td>
                        <td>{{$info_user->brithday}}</td>
                        @if($isMe == 1)
                        <td><button class="btn btn-primary" type="button" data-toggle="modal" data-target=".brithday">Chỉnh sửa</button></td>
                        @endif
                    </tr>
                    <tr>
                        <td>Nơi ở hiện nay</td>
                        <td>{{$info_user->address}}</td>
                        @if($isMe == 1)
                        <td><button class="btn btn-primary" type="button" data-toggle="modal" data-target=".add">Chỉnh sửa</button></td>
                        @endif
                    </tr>
                    <tr>
                     <td>Công việc</td>
                     <td>{{$info_user->job}}</td>
                     @if($isMe == 1)
                     <td><button class="btn btn-primary" type="button" data-toggle="modal" data-target=".job">Chỉnh sửa</button></td>
                     @endif
                 </tr>
             </tbody></table>
             <div class="modal fade name" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm"><div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Chỉnh sửa họ tên</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-inline" method="post" action = {{Asset('save_user_name')}}>
                            <div class="form-group">
                                <input type="text" class="form-control" name="name-txt" id="name-txt" placeholder="">
                            </div>
                            <div class="form-group">
                                <input id="name-btn" name="name-btn" type="submit" class="btn btn-primary" value="Sửa">
                            </div>
                        </form>
                    </div>
                </div></div>
            </div>
            <div class="modal fade brithday" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm"><div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Chỉnh sửa ngày sinh</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-inline" method="post" action={{Asset('save_brithday')}}>
                            <div class="form-group">
                                <input type="date" class="form-control" name="brithday-txt" id="brithday-txt" placeholder="">
                            </div>
                            <div class="form-group">
                                <input id="brithday-btn" name="brithday-btn" type="submit" class="btn btn-primary" value="Sửa">
                            </div>
                        </form>
                    </div>
                </div></div>
            </div>
            <div class="modal fade add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm"><div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Chỉnh sửa quê quán</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-inline" method="post" action={{Asset('save_address')}}>
                            <div class="form-group">
                                <input type="text" class="form-control" name="address-txt" id="address-txt" placeholder="">
                            </div>
                            <div class="form-group">
                                <input id="add-btn" name="add-btn" type="submit" class="btn btn-primary" value="Sửa">
                            </div>
                        </form>
                    </div>
                </div></div>
            </div>
            <div class="modal fade job" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm"><div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Chỉnh sửa công việc</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-inline" method="post" action={{Asset('save_job')}}>
                            <div class="form-group">
                                <input type="text" class="form-control" name="job-txt" id="job-txt" placeholder="">
                            </div>
                            <div class="form-group">
                                <input id="job-btn" name="job-btn" type="submit" class="btn btn-primary" value="Sửa">
                            </div>
                        </form>
                    </div>
                </div></div>
            </div>
        </div>
        @if($isMe == 0)
        <form method="post" action={{Asset("add_friend")}}>
            <input name = "user_id_addfriend" value = "{{$user_id_addfriend}}" class="sr-only">
            <input type="submit" class="btn btn-primary" value="Add friends" style="position: absolute; right: 15px; top: 280px;">
        </form>
        @endif
        
    </div>
</div>
@stop