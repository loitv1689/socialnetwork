var base_url = "http://localhost/index/demo/public/";
 var callListenerMark = 0;
   $('#input_search').keypress(function(e) {
    if(e.which == 13) {
        //alert('You pressed enter!');
        document.getElementById('searchok').click();
        
    }
  });
   $('.comment_trigger').keypress(function(e) {
    if(e.which == 13) {
      var element = $(this);
      comment_btt_click(element.find('.post_id').val());
    }
  });
  $('#iconImageSearch').click(function(){
       document.getElementById('searchok').click();
  });
function comment_btt_click(postid){
  	
                  	
                  	post_id = $("#comment_post_id_"+postid).val();
                  	content = $("#comment_content_"+postid).html();
                  	$.ajax({
                  		"url":base_url+"comment",
                  		"dataType":"json",
                  		"type":"post",
                  		"data":"post_id="+post_id+"&content="+content,
                  		"async":"false",
                  		beforeSend:function(){

                  		},
                  		success:function(results){
                  			
                  				if(results.value_type == 2 || results.value_type == 3 ||results.value_type == 5) {
                  				 	$("#comment_alert_"+postid).html("<span style='color:red'>Không thể comment.Bạn vui lòng kiểm tra lại kêt nối</span>");
                  				}
                  				else if(results.value_type == 4){
                  					 $("#comment_alert_"+postid).html("<span style='color:red'>Comment không được để trống</span>");	
                  				}else if(results.value_type == 1){	
                  					$("#comment_alert_"+postid).html('');	
                                                $("#comment_content_"+postid).html('');
                  					$("#all_comment_in_post_"+postid).prepend($(results.html).fadeIn('slow'));

                                                
                  				}else{
                  					$("#comment_alert_"+postid).html("<span style='color:red'>Lỗi không xác định</span>");			
                  				}
                  				
                  		}
                  });
				
                    
}

function post_btt_click(){
	page_master = $('#user_id_on_page').val();
	post_content =$('#user_main_post_content').html();
	post_categories = $('#post_categories').val();
 	post_image_id = $('#file_id_image_inpost').val();
   //alert(post_content+"??"+post_categories+"??"+post_image_id);
	$.ajax({
		"url":base_url+"post",
		"dataType":"json",
		"type":"post",
		"data":"page_master="+page_master+"&post_content="+post_content+"&post_categories="+post_categories+"&image_id="+post_image_id,
		beforeSend:function(){

		},
		success:function(results){
			if(results.rid < 5 && results.rid >0){
				$("#alert_error_on_post_form").html("<span style='color:red'>"+results.text_alert+"</span>");
			}else if (results.rid == 5) {
                        $("#alert_error_on_post_form").html('');
                        $("#user_main_post_content").html('');
                        $("#post_status_head").after($(results.html).fadeIn('slow'));
                        $("#image_in_post_content").html('');
                        $("#file_id_image_inpost").val('0');
                  }else{
                       $("#alert_error_on_post_form").html("<span style='color:red'>"+"Bạn vui lòng kiểm tra lại kết nối"+"</span>");       
                  }
		}
	});
}
function img_create(src, alt, title) {
      var img = new Image();
    
    if (img == null) {
            var img=document.createElement('img');  
      }
     
    img.src= src;
    if (alt!=null) img.alt= alt;
    if (title!=null) img.title= title;
    return img;
}
$(document).ready(function(){
///////////////////////start!
      $('#add_photo_on_post').click(function(){
            
            document.getElementById('photo_on_post').click();
            if (callListenerMark === 0) {
              callListener();
              callListenerMark++;
            };
      });

  function callListener(){
      document.getElementById('photo_on_post').addEventListener('change', function(e) {
                    var file = this.files[0];

                    var fd = new FormData();
                    fd.append("photo_on_post", file);
                    // These extra params aren't necessary but show that you can include other data.
                    fd.append("username", "tavanloi");
                    fd.append("accountnum", 1234134);

                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', base_url+'/upload/imageonpost', true);
                    
                    xhr.upload.onprogress = function(e) {
                      if (e.lengthComputable) {
                        var percentComplete = (e.loaded / e.total) * 100;
                        console.log(percentComplete + '% uploaded');
                      }
                    };

                    xhr.onload = function() {
                      if (this.status == 200) {
                        var resp = JSON.parse(this.response);
                        
                        // console.log('Server got:', resp);

                        // var image = document.createElement('img');
                        // image.src = resp.dataUrl;
                        // document.body.appendChild(image);
                        if(resp.value_id == 2){
                          $('#alert_error_on_post_form').html('<span style="color:red">Upload file thất bại</span>');
                        }else if(resp.value_id == 1){

                          $('#image_in_post_content').html('<img width="551px" src="'+resp.url_image+'">');
                          $('#file_id_image_inpost').val(resp.file_id);
                        }
                      };
                    };

                    xhr.send(fd);
                  }, false);       
  }
          $('#upload_avater_image').click(function(){
            
            document.getElementById('upload_avatar_image_input').click();

            

          });          
          function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                       $('#image_avatar_user').attr('width', '580px');
                        $('#image_avatar_user').attr('height', "580px");
                        $('#image_avatar_user').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#upload_avatar_image_input").change(function(){
                readURL(this);
            });
/////////////////////////////////
});

