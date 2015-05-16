<?php

class UploadController extends BaseController
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
    public function postImageonpost() {
    	if (Session::get('user_id')) {	
    	$user_id  = Session::get('user_id');
    	$current =  round(microtime(true));
    	$fileName = $user_id."_".$current."_".$_FILES['photo_on_post']['name'];
		$fileType = $_FILES['photo_on_post']['type'];
		$fileContent = file_get_contents($_FILES['photo_on_post']['tmp_name']);
		//$dataUrl = 'data:' . $fileType . ';base64,' . base64_encode($fileContent);

		// $json = json_encode(array(
		//   'name' => $fileName,
		//   'type' => $fileType,
		//   'dataUrl' => $dataUrl,
		//   'username' => $_REQUEST['username'],
		//   'accountnum' => $_REQUEST['accountnum']
		// ));

		//echo $json;
		// $img = $dataUrl; // Your data 'data:image/png;base64,AAAFBfj42Pj4';
		// echo $img;
		// $img = str_replace('data:image/png;base64,', '', $img);
		// $img = str_replace(' ', '+', $img);
		// $data = base64_decode($img);
		file_put_contents('uploads/images/'.$fileName, $fileContent);
		if(file_exists('uploads/images/'.$fileName)){
			//insert user_id url_file tbl categories file_type	
			DB::insert('insert into file (user_id,url_file,categories,file_type)
				values(?,?,?,?)',array($user_id,$fileName,1,1));
			$insert_file_id = mpost::last_insert_id();
			$url_image_file_return = asset('uploads/images/'.$fileName);
			if($insert_file_id > 0){
				echo json_encode( array('value_id' => "1","url_image"=>$url_image_file_return,"file_id"=>
					$insert_file_id));
			}else{
				echo json_encode( array('value_id' => 2 ));
			}
		}
		
		// foreach ($_FILES['photo_on_post'] as $key => $value) {
		// 	echo '"'.$key.'":'.$value;
		// 	echo "<br>";
		// }
		}
    }
}
?>